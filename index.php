<?php
session_start();
include_once './Config/Config.php';
include_once './classes/Noticias.php';
$noticias = new Noticias($db);

if (isset($_GET['deletar'])) {
    $id = $_GET['deletar'];
    $usuario->deletar($id);
    header('Location: login.php');
    exit();
}

$dados = $noticias->ler();
?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultório</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>

        <h1>Portal de Notícias</h1><br>

        <navigation>
            <a class="botao" href="login.php">Login</a>
        </navigation>

    </header>

    


        <?php while ($row = $dados->fetch(PDO::FETCH_ASSOC)) : ?>
            <div class="container">
                <h2> <?php echo $row['titulo']; ?> </h2>
                <h3><?php echo $row['noticia']; ?></h3>
                <h4> Data: <?php echo $row['data']; ?></h4>


            </div>
        <?php endwhile; ?>
    
    

    <div class="footer">

        <h1>criador abner || junho de 2024</h1>
    </div>

</body>

</html>