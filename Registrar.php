<?php
include_once "./Config/Config.php";
include_once "./classes/Usuario.php";

if($_SERVER['REQUEST_METHOD']==='POST'){
    $Usuario = new Usuario($db);
    $Nome = $_POST['Name'];
    $Sexo = $_POST['Sexo'];
    $Fone = $_POST['Fone'];
    $Email = $_POST['Email'];
    $Senha = $_POST['Senha'];
    $Usuario -> registrar($Nome, $Sexo, $Fone, $Email, $Senha);
    header('location:index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastro Usuario</h1>
    <form method ="POST">
        <input type = "text" name = "Name"placeholder= "nome"required>
        <br><laber>Masculino</laber>
        <input type = "radio" name = "Sexo" value = "M"required>
        <label>Feminino</label>
        <input type = "radio" name = "Sexo" value = "F"required>
        <br>
        <input type = "text" name = "Fone"placeholder= "Fone"required>
        <br>
        <input type = "text" name = "Email"placeholder= "E-mail"required>
        <br>
        <input type = "Password" name = "Senha"placeholder= "Senha"required>
        <br>
        <input type = "submit" value="Salvar">


    </form>
</body>
</html>