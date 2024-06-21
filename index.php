<?php
session_start();
include_once './Config/Config.php';
include_once './classes/Usuario.php';

$Usuario = new Usuario($db);
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['login'])){
        $Email = $_POST['$Email'];
        $Senha = $_POST('$Senha');

        if($dados_Usuario = $Usuario->login($Senha, $Senha)){
                $_SESSION["Usuario_id"] = $dados_Usuario["id"];
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
    <title>Autenticação</title>
</head>
<body>
    <div class="container">
    <h1>Acesso</h1>
    <form method = "post">

    <input type = "email" name = "email" placeholder="insira o email" required>
    <input type = "Password" name=" senha"placeholder="Insira sua senha"required>
    <input type="submit" value = "entrar">
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
</body>
</html>