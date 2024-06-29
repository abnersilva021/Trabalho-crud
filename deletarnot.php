<?php

session_start();
if(!isset($_SESSION['usuario_id'])){
    header('Location: index.php');
    exit();
}
include_once './Config/Config.php';
include_once './classes/Usuario.php';
include_once './classes/Noticias.php';


$noticias = new Noticias($db);
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $noticias->deletar($id);
    header('Location: cad_noticia.php');
    exit();
}

?>