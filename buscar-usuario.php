<?php
$nome = $_POST["nome"];
if(!empty($nome)){

include_once "conexao.php";

$stmt = $con->prepare("SELECT * FROM usuario INNER JOIN endereco ON usuario.cod = endereco.cod WHERE nome LIKE ? '%' ");
$stmt->bindParam(1, $nome);

$stmt->execute();

if ($stmt->rowCount() > 0) {
    ?>
    <table class="table">
    <tr class="text-center">
    <td>Foto</td>
    <td>Nome</td>
    <td>Email</td>
    <td>Login</td>
    <td>Perfil</td>
</tr>
    <?php
    while ($row = $stmt->fetch()) {
        ?>
        <div data-toggle="collapse" data-target="#teste" >
           
                <tr class="text-center">
                    <td class="ml-5"><img src="img/<?php echo $row["foto"]; ?>" style="width:30px ;height: 30px; border-radius: 50%;"></td>
                    <td ><?php  echo $row["nome"]?></td>
                    <td ><?php echo $row["email"]?></td>
                    <td ><?php echo $row["login"]?></td>
                    <td><?php echo $row["perfil"]?></td>
                </tr>
            
        </div>
        <div class="collapse" id="teste">
        
        </div>
        <?php
    }?></table><?php
} else {
    echo "usuário não encontrado!";
}
}
?>