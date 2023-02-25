<?php

//1- resgatar os dados.

$nome = $_POST["nome"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$estadocivil = $_POST["estadocivil"];

//2- Conectar o PHP ao mysql com PDO 

include_once "conexao.php";

//3- Preparar a instrução de gravação
//stmt -> statement 
$stmt = $con->prepare("INSERT INTO cliente VALUE (NULL,?,?,?,?)");
$stmt->bindParam(1, $nome);
$stmt->bindParam(2, $email);
$stmt->bindParam(3, $cpf);
$stmt->bindParam(4, $estadocivil);

//4- Executar a instrução
if($stmt->execute()){
    $msg = "Cliente cadastrado com sucesso!";
}else{
    $msn = "não foi possivel cadastrar, tente novamente!";
}

?>

<Script>
    alert("<?php echo $msg; ?>"); //exibe mensagem via javaScript
    location.href='painel.php'; //redireciona a pagina via javaScript
</Script>