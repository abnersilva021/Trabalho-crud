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
    header("Location: index.php");
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
   
<header >
        <h1>Portal de Notícias</h1>
    </header>

    <main class="container-star">
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
        <!-- <input type = "submit" value="Salvar"> -->
        <button class="button">Salvar</button>
    </form>
</main>
</div>
<footer>

<h1>criador abner  ||  junho de 2024</h1>
 </footer>
</body>
</html>