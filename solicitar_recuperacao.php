<?php
include_once './Config/Config.php';
include_once './classes/Usuario.php';
$mensagem = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$email = $_POST['email'];
$usuario = new Usuario($db);
$codigo = $usuario->gerarCodigoVerificacao($email);
if ($codigo) {
$mensagem = "Seu código de verificação é: $codigo. Por favor,
anote o código e <a href='redefinir_senha.php'>clique aqui</a> para
redefinir sua senha.";
} else {
$mensagem = 'E-mail não encontrado.';
}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    
   
<head>
    <link rel="stylesheet" href="style.css">
<meta charset="UTF-8">
</main>
<title>Recuperar Senha</title>
</head>
<body>
<div class="banner">
    <video autoplay muted loop>
        <source src="https://videos.pexels.com/video-files/4980049/4980049-uhd_2560_1440_30fps.mp4" type="video/mp4">
    </video>
    <div class="container">
<h1>Recuperar Senha</h1>
<form method="POST">
<label for="email">Email:</label>
<input type="email" name="email" required><br><br>
<input type="submit" value="Enviar">
</form>
<p><?php echo $mensagem; ?></p>
<a href="index.php">Voltar</a>
</div>
</div>
</body>
</html>