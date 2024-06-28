<?php
include_once './Config/Config.php';
include_once './classes/Usuario.php';
$mensagem = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$codigo = $_POST['codigo'];
$nova_senha = $_POST['nova_senha'];
$usuario = new Usuario($db);
if ($usuario->redefinirSenha($codigo, $nova_senha)) {
$mensagem = 'Senha redefinida com sucesso. Você pode <a
href="index.php">entrar</a> agora.';
} else {
$mensagem = 'Código de verificação inválido.';
}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">


<title>Redefinir Senha</title>
</head>
<body>
<header >
        <h1>Portal de Notícias</h1>
    </header>
    <div class="container">
<h1>Redefinir Senha</h1>
<form method="POST">
<label for="codigo">Código de Verificação:</label>
<input type="text" name="codigo"  value="Seu código aqui"
required><br><br>
<label for="nova_senha">Nova Senha:</label>
<input type="password" name="nova_senha" required><br><br>
<input type="submit" value="Redefinir Senha">
</form>
<p><?php echo $mensagem; ?></p>
</div>
</div>
<footer>

<h1>criador abner  ||  junho de 2024</h1>
 </footer>
</body>
</html>