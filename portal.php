<?php
session_start();
include_once './config/config.php';
include_once './classes/Usuario.php';


// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}
$usuario = new Usuario($db);


// Processar exclusão de usuário
if (isset($_GET['deletar'])) {
    $id = $_GET['deletar'];
    $usuario->deletar($id);
    header('Location: portal.php');
    exit();
}
// Obter dados do usuário logado
$dados_usuario = $usuario->lerPorId($_SESSION['usuario_id']);
$nome_usuario = $dados_usuario['nome'];
$idusu = $dados_usuario['id'];
// Obter dados dos usuários
//$dados = $usuario->ler();
$search = isset($_GET['search']) ? $_GET['search'] : '';
$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : '';

// Obter dados dos usuários com filtros
$dados = $usuario->lerPorId($idusu);


// Função para determinar a saudação
function saudacao() {
    $hora = date('H');
    if ($hora >= 6 && $hora < 12) {
        return "Bom dia";
    } elseif ($hora >= 12 && $hora < 18) {
        return "Boa tarde";
    } else {
        return "Boa noite";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header >
        <h1>Portal de Notícias</h1>
    </header>

    <div class="container-box">
    <h1><?php echo saudacao() . ", " . $nome_usuario; ?>!</h1>
    <a class="button" role="button" href="Registrar.php" >Adicionar Usuário</a>
    <a href="login.php" class="button" role="button">Login</a>
<br>
<br>

<form method="GET">
            <input type="text" name="search" placeholder="Pesquisar por nome ou email" value="<?php echo htmlspecialchars($search); ?>">
            <label>
                <br>
                <input type="radio" name="order_by" value="" <?php if ($order_by == '') echo 'checked'; ?>> Normal
            </label>
            <br>
            <label>
                <input type="radio" name="order_by" value="nome" <?php if ($order_by == 'nome') echo 'checked'; ?>> Ordem Alfabética
            </label>
            <br>
            <label>
                <input type="radio" name="order_by" value="sexo" <?php if ($order_by == 'sexo') echo 'checked'; ?>> Sexo
            </label>
            <br>
            <button type="submit">Pesquisar</button>
            <br>
            <br>
            <a href="cad_noticia.php" class="button" role="button">Cadastrar Notícias</a>
            
            
            <a href="noticias.php" class="button" role="button">Notícias</a>
           
        </form>
 <br>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Fone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        
            <tr>
                <td><?php echo $dados['id']; ?></td>
                <td><?php echo $dados['nome']; ?></td>
                <td><?php echo ($dados['sexo'] === 'M') ? 'Masculino' : 'Feminino'; ?></td>
                <td><?php echo $dados['fone']; ?></td>
                <td><?php echo $dados['email']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $dados['id']; ?>">Editar</a>
                    <br>
                    
                    <a href="deletar.php?id=<?php echo $dados['id']; ?>">Deletar</a>
                </td>
            </tr>

    </table>

</div></div></div>

<footer>

<h1>criador abner  ||  junho de 2024</h1>
 </footer>

</body> </html>
