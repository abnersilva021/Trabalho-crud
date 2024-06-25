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
    <title>Login</title>
</head>
<body>
    <!-- <div class="banner">
    <video autoplay muted loop>
        <source src="https://videos.pexels.com/video-files/4980049/4980049-uhd_2560_1440_30fps.mp4" type="video/mp4">
    </video> -->
    <br>
    <br>
    <br>
    <h1 class="letra">Portal de Notícias</h1>
    <div class="container">
    <h1 class="letra">Acesso</h1>
    <form method = "post">

    <input type = "email" name = "email" placeholder="insira o email" required>
    <br>
    <br>
    <input type = "password" name="senha"placeholder="Insira sua senha"required>
    <br>
    <br>
    <input type="submit" value = "login">
    <p>NÃO TEM CONTA?<a href="./Registrar.php"> REGISTRE-SE AQUI </a>  </p>
    <p>ESQUECEU A SENHA?<a href="./solicitar_recuperacao.php"> RECUPERE AQUI </a>  </p>

    <br>
    <br>
    <br>
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