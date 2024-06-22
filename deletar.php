<?php

session_start();
if(!isset($_SESSION['usuario_id'])){
    header('Location: index.php');
    exit();
}
include_once './Config/Config.php';
include_once './classes/Usuario.php';

$Usuario = new Usuario($db);
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $Usuario->deletar($id);
    header('Location: portal.php');
    exit();
}

?>