<?php

session_start();
if(!isset($_SESSION['Usuario_id'])){
    header('Location: index.php');
    exit();
}
include_once './Config/config.php';
include_once './classes/Usuario.php';

$Usuario = new Usuario($db);
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $Usuario->deletar($id);
    header('Location: portal.php');
    exit();
}

?>