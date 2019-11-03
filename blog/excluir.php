<?php
require './conexao.php';
if(!empty($_GET['usuario'])){
    $id = addslashes($_GET['usuario']);
    $sql = "DELETE FROM usuarios WHERE id= $id";
    $pdo->query($sql);
    header("Location: index.php");
}else{
    header("Location: index.php");
}
