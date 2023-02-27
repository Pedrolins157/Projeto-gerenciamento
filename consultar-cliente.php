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
                <h1 class="h2 mb-4 text-gray-800">Consulta de cliente</h1>
                <p class="h5 mb-4 text-gray-800">digite para pesquisar</p>
                <form action="consultar-cliente.php" class="form-inline" method="get" auto-complete="off">
                    <input type="text" class="form-control w-25 mr-4 " name="busca" Placeholder="Nome, email ou cpf">
                    <button class="form-control btn btn-secondary"><i class="fas fa-search mr-1"></i>Pesquisar</button>
                </form>
                <?php
                //Resgatando o dado que veio pelo.
                //isset() -> verificar se a variavel existe e é diferente de null.
                if (isset($_GET["busca"])) {

                    $busca = $_GET["busca"];

                    include_once "conexao.php";
                    $stmt = $con->prepare("SELECT * FROM cliente WHERE nome LIKE ? '%' OR email = ? OR cpf = ?  ORDER  BY nome");
                    $stmt->bindParam(1, $busca);
                    $stmt->bindParam(2, $busca);
                    $stmt->bindParam(3, $busca);
                    //Execute a busca
                    $stmt->execute();

                    //verifica se a busca retornou algum registro
                    if ($stmt->rowCount() > 0) {
                        ?>

                        <table class="text-center table mt-3">
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Cpf</th>
                                <th class="text-center">Estado Civil</th>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Excluir</th>
                            </tr>

                            <?php
                            while ($row = $stmt->fetch()) {

                                ?>
                                <tr>
                                    <td><?php echo $row["nome"] ?></td>
                                    <td><?php echo $row["email"] ?></td>
                                    <td><?php echo $row["cpf"] ?></td>
                                    <td><?php echo $row["estadocivil"] ?></td>
                                    <td class="text-center" ><a class="href" href="#" onclick="editarCliente('<?php echo base64_encode($row['cod']) ?>')" ><i class="fas fa-edit text-primary"></i></a></a></td>
                                                <td class="text-center"><a href="#" onclick="confirmarExclusao('<?php echo base64_encode($row['cod'])?>') "><i class="fas fa-trash-alt text-danger"></i></a></td>
                            <?php } ?>
                        </table>
                        <?php
                    } else {
                        echo "Nenhum cliente encontrado!";
                    } 

                }


                ?>

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
<script src="js/sweetalert.js"></script>

<script>
                //função editar cliente
                function editarCliente(cod){
                  
                    location.href = "editar-cliente.php?cod="+cod;
                }
                //função excluir cliente
        function confirmarExclusao(cod) {
            Swal.fire({
  title: 'Deseja realmente deletar cliente?',
  text: "",
  icon: 'warning',
  iconColor:'#dc3545',
  showCancelButton: true,
  confirmButtonColor: '#dc3545',
  cancelButtonColor: '#6c757d',
  cancelButtonText:'Cancelar',
  confirmButtonText: 'Confirmar'
}).then((result) => {
    if (result.isConfirmed) {
      
        location.href = "deletar-cliente.php?cod="+cod;

}
});
        }
    </script>
</body>
</html>


