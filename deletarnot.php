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
if(isset($_GET['idnot'])){
    $idnot = $_GET['idnot'];
    $noticias->deletar($idnot);
    header('Location: portal.php');
    exit();
}

