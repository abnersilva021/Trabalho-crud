<?php
session_start();
include_once './Config/Config.php';
include_once './classes/Usuario.php';

$Usuario = new Usuario($db);
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if($dados_Usuario = $Usuario->login($email, $senha)){
                $_SESSION["usuario_id"] = $dados_Usuario["id"];
                header("Location: portal.php");
                exit();
            }else{
                $mensagem_erro = "Credenciais então inválidas!";
            }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Autenticação</title>
</head>
<body>
    <div class="banner">
    <video autoplay muted loop>
        <source src="https://cdn.pixabay.com/video/2022/10/10/134308-759254371_large.mp4" type="video/mp4">
    </video>

    <div class="container">
    <h1>Acesso</h1>
    <form method = "post">

    <input type = "email" name = "email" placeholder="insira o email" required>
    <input type = "password" name="senha"placeholder="Insira sua senha"required>
    <input type="submit" value = "login">
    <p>não tem conta?<a href="./Registrar.php"> aqui </a>  </p>

    </form>
    <div classe="mensagem">
        <?php
        if(isset($mensagem_erro)){
            echo'<p>' .$mensagem_erro.'</p>';
        }
        ?>

    </div>
</div>
</div>

    
</body>
</html>