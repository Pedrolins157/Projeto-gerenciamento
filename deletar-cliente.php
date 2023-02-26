<?php

//1- resgatar os dados.
$cod = base64_decode($_GET["cod"]);


//2- Conectar o PHP ao mysql com PDO 

include_once "conexao.php";

//3- Preparar a instrução de gravação
//stmt -> statement 
$stmt = $con->prepare("DELETE FROM cliente WHERE cod = ? ");
$stmt->bindParam(1, $cod);
//4- Executar a instrução
if($stmt->execute()){
   ?>
    <script> 
    alert("Cliente deletado com sucesso!");
    window.location.href = "consultar-cliente.php";
    </script>
   <?php 

}else{
    $msn = "não foi possivel deletar o cliente, tente novamente!";
}

?>
