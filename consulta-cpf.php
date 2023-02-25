<?php 

$cpf = $_POST["cpf"];

include_once ("conexao.php");

$stmt = $con->prepare("SELECT cpf FROM usuario WHERE cpf = ? ");
$stmt->bindParam(1,$cpf);
$stmt->execute();
if($stmt->rowCount() ==1){
    echo"Cpf Já Cadastrado!";
}


?>