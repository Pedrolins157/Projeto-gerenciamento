<?php
session_start();

if(!isset($_SESSION["nome"]) ){
    session_destroy();

    $msg = "Faça seu login!";
    Header("location:index.php?msg=".$msg);
}elseif($_SESSION["tempo"] + 1500 < time() ){
    session_destroy();
 ?>
<script>
    alert ("sua Sessão expirou!");
    location.href="index.php";
</script>
<?php
 }else{

    $_SESSION["tempo"] = time();

} ?>

