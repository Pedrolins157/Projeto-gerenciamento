<?php

//1- resgatar os dados.
$cod = base64_decode($_POST["cod"]);
$nome = $_POST["nome"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$estadocivil = $_POST["estadocivil"];

//2- Conectar o PHP ao mysql com PDO 

include_once "conexao.php";

//3- Preparar a instrução de gravação
//stmt -> statement 
$stmt = $con->prepare("UPDATE cliente SET nome= ?, cpf = ?,  email = ?, estadocivil = ? WHERE cod= ?");
$stmt->bindParam(1, $nome);
$stmt->bindParam(2, $cpf);
$stmt->bindParam(3, $email);
$stmt->bindParam(4, $estadocivil);
$stmt->bindParam(5, $cod);


//4- Executar a instrução
if($stmt->execute()){
    
}else{
    $msn = "não foi possivel atualizar o cadastro, tente novamente!";
}

?>
