<?php

session_start();
include_once './Config/config.php';
include_once './classes/Usuario.php';

if(!isset($_SESSION['usuario_id'])){
    header('Location: index.php');
    exit();
}
$usuario = new Usuario($db);

if(isset($_GET['deletar'])){
    $id = $_GET['deletar'];
    $usuario->deletar($id);
    header('Location: portal.php');
    exit();

}

$dados_Usuario = $usuario->lerPorId($_SESSION['usuario_id']);
$nome_usuario = $dados_Usuario['nome'];

$dados = $usuario->ler();

function saudacao(){
    $hora = date('H');
    if($hora>=6&&$hora<12){
        return "Bom dia";

    }elseif($hora>=12&&$hora<18){
        return "Boa tarde";

    }else{
        return "Boa noite";
    }
}
    // var_dump($usuario->lerPorId($_SESSION['usuario_id']));
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <br>
    <br>
    <h1 class="letra">Portal de Notícias</h1>
    <br>
    <br>
    <!-- <div class="banner">
    <video autoplay muted loop>
        <source src="https://videos.pexels.com/video-files/4980049/4980049-uhd_2560_1440_30fps.mp4" type="video/mp4">
    </video> -->
    <main class="container">
    <h1> <?php echo saudacao(). "," . $nome_usuario;?> ! </h1>
    <a href="logout.php">Logout</a>
    <a href="Registrar.php"> | Cadastrar</a>
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
        <?php while($row = $dados->fetch(PDO::FETCH_ASSOC)) :?>
            
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['nome'];?></td>
                <td><?php echo ($row['sexo'] === 'M')? 'Masculino' : 'Feminino' ;?></td>
                <td><?php echo $row['fone'];?></td>
                <td><?php echo $row['email'];?></td>
                <td>

            <a href="editar.php?id=<?php echo $row['id'];?>">Editar</a>
            <a href="deletar.php?id=<?php echo $row['id'];?>">Deletar</a>

                </td>
                <?php endwhile; ?>
            </tr>
            <br>
            <br>
    </table>
   </main>
</div>
</body>
</html>