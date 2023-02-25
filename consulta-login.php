<?php

    $login = $_POST["login"];

    include_once("conexao.php");

    $stmt = $con->prepare("SELECT login FROM usuario WHERE login = ?");
    $stmt->bindParam(1,$login);
    $stmt->execute();
    if($stmt->rowCount() == 1){
        echo "login já cadastrado!";
    }


?>