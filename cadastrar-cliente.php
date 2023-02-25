<?php include_once "autenticacao.php"?>
<!DOCTYPE html>
<html lang="pt-br">

<?php
 include "layout/read.php";
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
                <h1 class="h2 mb-4 text-gray-800">Cadastro de Cliente</h1>

                <p class="h5 mb-4 text-gray-800">Preencha os dados abaixo!</p>

                <!-- Dados do Form:Nome,E-mail,Cpf,Estado Civil -->
                <form action="gravar-cliente.php" autocomplete="off" class="w-50 mb-2 " method="post">

                    <input type="text" require Placeholder="escreva seu Nome aqui" name="nome" class="mb-2 form-control">
                    <input type="email" require Placeholder="escreva seu E-mail" name="email" class="mb-2 form-control">
                    <input type="text" require maxlength="11" Placeholder="escreva seu Cpf" name="cpf" class="mb-2 form-control">

                    <select name="estadocivil" required class="form-control w-25 mb-3 ">
                        <option value="" disabled selected>Estado civil</option>
                        <option value="solteiro">Solteiro</option>
                        <option value="casado">Casado</option>
                        <option value="viuvo">Viúvo</option>
                        <option value="divorciado">Divorciado</option>
                    </select>
                    <Button class="btn btn-secondary w-50">Criar</Button>
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