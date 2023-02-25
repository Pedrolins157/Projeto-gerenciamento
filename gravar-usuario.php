<?php
include_once "autenticacao.php";
include_once "utils.php";
 

$nome = $_POST["nome"];
$email = $_POST["email"];
$dtnasc = dataBanco($_POST["dtnasc"]);
$cpf = $_POST["cpf"];
$foto = $_FILES["foto"];
$login = $_POST["login"];
$senha = md5($_POST["senha"]);
$perfil = $_POST["perfil"];
$fotoNull = "perfill.png";

if($foto["name"] != NULL){
//separa o nome do arquivo em arrais (exp; foto.ele.jpg)
$ext = explode(".",$foto["name"]);// [foto][ele][jpg]
$ext = array_reverse($ext);//[jpg][ele][foto]
$ext = $ext[0];//[jpg = 0][ele = 1][foto = 2]
$nomeFoto = $login.date("Ymdhis").".".$ext;
move_uploaded_file($foto["tmp_name"],"img/".$nomeFoto);

}else{
    $nomeFoto = $fotoNull;
}
//resgate dos dados do endereço 
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];

include_once "conexao.php";

$con->beginTransaction();
$stmt = $con->prepare("INSERT INTO usuario VALUE (null,?,?,?,?,?,?,?,?)");

$stmt->bindParam(1, $nome);
$stmt->bindParam(2, $email);
$stmt->bindParam(3, $dtnasc);
$stmt->bindParam(4, $cpf);
$stmt->bindParam(5, $nomeFoto);
$stmt->bindParam(6, $login);
$stmt->bindParam(7, $senha);
$stmt->bindParam(8, $perfil);
if ($stmt->execute()) {

    //MOVE A IMAGEM DO LOCAL TEMPORARIO  PARA O DISTINO FINAL
   
    move_uploaded_file($foto["tmp_name"],"img/".$nomeFoto);

    //PEGA O ID GERADO NA ULTIMA INSERÇÃO
    $codUsu = $con->lastInsertId();

    //gravação do endreço 
    $stmt = $con->prepare("INSERT INTO endereco VALUE (null,?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1,$logradouro);
    $stmt->bindParam(2,$numero);
    $stmt->bindParam(3,$complemento);
    $stmt->bindParam(4,$cep);
    $stmt->bindParam(5,$bairro);
    $stmt->bindParam(6,$cidade);
    $stmt->bindParam(7,$uf);
    $stmt->bindParam(8,$codUsu);
    if($stmt->execute()){
        $con->commit(); //confirma a transação ! 
        echo "Gravado com sucesso!";
    }else{
        $con->rollBack();//desfaz a transação toda ou até encontrar um commit
        echo "Erro no endereço";
    }


} else {
    echo "não foi possivel cadastrar usuário, tente novamente!";
}
?>
