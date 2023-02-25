<?php
session_start();
if(isset($_SESSION["nome"])){
    header("location:painel.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Gerenciamento</title>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>



<body class="bg-danger">

<div class="container mt-5">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 w-100 p-3 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row align-items-center mx-auto "  style="height: 70vh;">
                        <div class="col-6 d-none  d-lg-block">
                            <img src="img/index0.png" alt="" style="border-right:gray 2px solid;">
                            <p class="form-check "></p>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class=" text-gray-900 mb-4">Login </h1>
                                    <H5>Seja Bem-Vindo(a)!</H5>
                                </div>


                                <form action="verificar-login.php" method="post" autocomplete="off">

                                    <div class="form-group">
                                        <input type="text" required name="login" class="form-control form-control-user"
                                               id="login" aria-describedby="emailHelp"
                                               placeholder="Digite seu login">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" required name="senha" class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Digite sua senha">
                                    </div>

                                    <button class="btn btn-google btn-user btn-block">
                                        Entrar
                                    </button>

                                </form>

                                <hr>

                                <?php

                                if(isset($_GET["msg"])){

                                    echo "<div class='alert alert-danger'>".$_GET['msg']."</div>";

                                }


                                ?>




                                <div class="text-center">
                                    <a class="small" href="recuperar-senha.php">Esqueceu a senha ?</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<script>

</script>
<!-- Bootstrap core JavaScript-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="js/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>