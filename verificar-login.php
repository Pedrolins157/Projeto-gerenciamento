<?php

session_start();

$login = $_POST['login'];
$senha = md5($_POST['senha']);
include_once 'conexao.php';

$stmt = $con->prepare("SELECT * from usuario WHERE login = ? AND senha = ? ");
$stmt->bindParam(1 , $login);
$stmt->bindParam(2,$senha);
$stmt->execute();

if ($stmt->rowCount() ==1){
   $row = $stmt->fetch();

   $_SESSION["nome"] = $row["nome"];
   $_SESSION["foto"] = $row["foto"];
   $_SESSION["perfil"] = $row["perfil"];
   $_SESSION["tempo"] = time();
  
    header("location:painel.php");


}else {
    header('location:index.php');
}

?>