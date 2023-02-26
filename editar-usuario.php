<?php
include_once "autenticacao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
include_once "layout/read.php";
?>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php
    include "layout/sidebar.php";
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php
            include "layout/topbar.php";
            ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h2 mb-4 text-gray-800">Alteração de Usuário</h1>

                <p class="h5 mb-4 text-gray-800">Preencha os dados abaixo!</p>

                <?php

                $cod = base64_decode($_GET["cod"]);
                include_once "conexao.php";
                $stmt = $con->prepare("SELECT * FROM cliente WHERE cod = ?");
                $stmt->bindParam(1,$cod);
                $stmt->execute();

                $row = $stmt->fetch();



                ?>


                <!-- Dados do Form:Nome,E-mail,Cpf,Estado Civil -->
                <form action="atualizar-cliente.php" autocomplete="off" class="w-50 mb-2" method="post">

                    Nome:  <input type="text" value="<?php echo $row['nome']?>" require Placeholder="escreva seu Nome aqui" name="nome" class="mb-2 form-control">
                    E-mail:  <input type="email" value="<?php echo $row['email']?>" require Placeholder="escreva seu E-mail" name="email" class="mb-2 form-control">
                    Cpf:  <input type="text" value="<?php echo $row['cpf']?>" require maxlength="11" Placeholder="escreva seu Cpf" name="cpf" class="mb-2 form-control">

                    Estado Civil:  <select name="estadocivil" required class="form-control w-25 mb-5 form-inline ">
                        <option value="" disabled >Estado civil</option>
                        <option value="solteiro" <?php if($row["estadocivil"] =='solteiro'){echo 'selected';}?>>Solteiro</option>
                        <option value="casado" <?php if($row["estadocivil"] =='casado'){echo 'selected';}?>>Casado</option>
                        <option value="viuvo" <?php if($row["estadocivil"] =='viuva'){echo 'selected';}?>>Viúvo</option>
                        <option value="divorciado" <?php if($row["estadocivil"] =='divorciado'){echo 'selected';}?>>Divorciado</option>
                    </select>
                    <Button class="btn btn-primary w-50">Atualizar cadastro</Button>
                </form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php
        include "layout/footer.php"
        ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->

<?php
include "layout/modal.php";
?>

<!-- Bootstrap core JavaScript-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>



</body>
</html>