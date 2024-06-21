<?php

session_start();
include_once './Config/config.php';
include_once './classes/Usuario.php';

if(!isset($_SESSION['Usuario_id'])){
    header('Location: index.php');
    exit();
}
$Usuario = new Usuario($bd);

if(isset($_GET['deletar'])){
    $id = $_GET['deletar'];
    $Usuario->deletar($id);
    header('Location: portal.php');
    exit();

}

$dados_Usuario = $Usuario->lerPorId($_SESSION['Usuario_id']);
$nome_usuario = $dados_Usuario['Nome'];

$dados = $Usuario->ler();

function saudacao(){
    $hora = date('H');
    if($hora>=6&&$hora<12){
        return "Bom dia";

    }elseif($hora>=12&&$hora<18){
        return "Boa tarde";

    }else{
        return "Boa noite";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal</title>
</head>
<body>
    <h1> <?php echo saudacao(). "," . $nome_usuario;?> ! </h1>
    <a href="logout.php">Logout</a>
    <br>
    <table border="1">
        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Fone</th>
        <th>Email</th>
        <th>Ações</th>
        </tr>
        <?php while($row = $dados->fetch(PDO::FETCH_ASSOC)) :?>
            <tr>
                <d><?php echo $row['id'];?></td>
                <d><?php echo $row['nome'];?></td>
                <d><?php echo ($row['sexo'] === 'M')? 'Masculino' : 'Feminino' ;?></td>
                <d><?php echo $row['fone'];?></td>
                <d><?php echo $row['email'];?></td>
                <td>

            <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
            <a href="deletar.php?id=<?php echo $row['id']; ?>">Deletar</a>

                </td>
                <?php endwhile; ?>
            </tr>
    </table>
</body>
</html>