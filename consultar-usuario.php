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
                    <h1 class="h2 mb-4 text-gray-800">Consulta de Usuário</h1>
                    <p class="h5 mb-4 text-gray-800">digite para pesquisar</p>
                    <input type="text" id="nome" autocomplete="off" class="form-control w-25 mr-4 " name="buscar"
                        Placeholder="Nome, email ou cpf">

                    <div id="resultado" class="mt-3">

                    </div>


                    <?php
                    if (isset($_GET["buscar"])) {

                        $busca = $_GET["buscar"];

                        include_once "conexao.php";
                        $stmt = $con->prepare("SELECT * FROM usuario WHERE nome LIKE ? '%' OR email = ? OR cpf = ?  ORDER  BY nome");
                        $stmt->bindParam(1, $busca);
                        $stmt->bindParam(2, $busca);
                        $stmt->bindParam(3, $busca);
                        $stmt->execute();
                        if ($stmt->rowCount() > 0) { ?>

                            <table class="text-center table mt-3">
                                <tr>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">E-mail</th>
                                    <th class="text-center">Cpf</th>
                                    <th class="text-center">Perfil</th>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Excluir</th>
                                </tr>

                                <?php
                                while ($row = $stmt->fetch()) {

                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row["nome"]?>
                                        </td>
                                        <td>
                                            <?php echo $row["email"]?>
                                        </td>
                                        <td>
                                            <?php echo $row["cpf"]?>
                                        </td>
                                        <td>
                                            <?php echo $row["perfil"]?>
                                        </td>
                                        <td class="text-center"><a
                                                href="editar-cliente.php?cod=<?php echo base64_encode($row['cod']) ?>"
                                                class="href"><i class="fas fa-edit text-primary"></i></a></a></td>
                                        <td class="text-center"><a href="#" class="href"><i
                                                    class="fas fa-trash-alt text-danger"></i></a></td>

                                    </tr>

                                <?php } ?>

                            </table>
                        <?php
                        } else {
                            echo "Nenhum usuário encontrado!";
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
    <script src="js/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#nome").keyup(function () {
                var nomeDigitado = $("#nome").val();

                $.post("buscar-usuario.php", 
                {nome: nomeDigitado},
                 function (resposta) {
                    $("#resultado").html(resposta);
                })
            })
        })
    </script>

</body>

</html>