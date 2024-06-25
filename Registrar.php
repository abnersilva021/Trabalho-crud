<?php
include_once "./Config/Config.php";
include_once "./classes/Usuario.php";

if($_SERVER['REQUEST_METHOD']==='POST'){
    $usuario = new Usuario($db);
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $fone = $_POST['fone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario->registrar($nome, $sexo, $fone, $email, $senha);
    header("Location: portal.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="banner">
    <video autoplay muted loop>
        <source src="https://videos.pexels.com/video-files/4980049/4980049-uhd_2560_1440_30fps.mp4" type="video/mp4">
    </video>
    <main class="container">
    <h1>Adicionar Usuario</h1>
    <form method ="POST">
        <input type = "text" name = "nome" placeholder= "nome" required>
        <br>
        <br><laber>Masculino</laber>
        <input type = "radio" name = "sexo" value = "M" required>
        <label>Feminino</label>
        <input type = "radio" name = "sexo" value = "F" required>
        <br>
        <br>
        <input type = "text" name = "fone" placeholder= "fone" required>
        <br>
        <br>
        <input type = "text" name = "email" placeholder= "email" required>
        <br>
        <br>
        <input type = "Password" name = "senha" placeholder= "senha" required>
        <br>
        <br>
        <input type = "submit" value="Salvar">

</main>
</div>
    </form>
</body>
</html>