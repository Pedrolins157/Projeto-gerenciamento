<?php include_once "autenticacao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
//head --
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
            <div class="container-fluid ">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800 text-black-50">Seja bem-vindo <?php echo $_SESSION["nome"] ?> !</h1>

               <a href="#" class="forward"> <p class="text-gray-800">Acesse o menu para começar >></p></a>

            </div>
            <!-- /.container-fluid -->
            <div>
                <img src="img/index1.png" class="rounded mx-auto d-block" alt="...">
                <p class="form-check "></p>
            </div>
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


</body>
</html>