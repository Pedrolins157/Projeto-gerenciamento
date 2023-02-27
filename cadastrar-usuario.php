<?php
include_once "autenticacao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include_once "layout/read.php" ?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include_once "layout/sidebar.php";
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


                    <p class="h5 mb-2 mt-3 text-gray-800 ml-1  w-75 mx-auto ">Dados do Usuário</p>

                    <!-- enctype="multipart/form-data habilita o form a enviar arquivo -->
                    <form action="gravar-usuario.php" class="w-75 mx-auto" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        <div class="row">
                            <!-- Nome & e-mail -->
                            <div class="col-md-6">
                                <input type="text" name="nome" placeholder="Nome" class="form-control mb-2 required">
                            </div>

                            <div class="col-md-6">
                                <input type="text" name="email" placeholder="E-mail" class="form-control mb-2">
                            </div>
                            <!--data nascimento & cpf & foto -->
                            <div class="col-md-4">
                                <input type="text" name="dtnasc" id="data" placeholder="Data de Nascimento"
                                    class="form-control mb-2">
                            </div>

                            <div class="col-md-4">
                                <input type="text" name="cpf" placeholder="Cpf" id="cpf" class="form-control mb-2">
                                <spam id="errocpf"></spam>
                            </div>
                            <!-- -->
                            <div class="col-md-4">
                                <input type="file" name="foto" placeholder="foto perfil"
                                    class="form-control-file mb-2 mt-1" accept="png,jpg,jpeg">
                            </div>

                            <div class="col-md-4">
                                <input name="login" id="login" placeholder="login" class="form-control mb-2">
                                <spam id="errologin"></spam>
                            </div>

                            <div class="col-md-4">
                                <input type="password" placeholder="Senha" class="form-control" name="senha">
                            </div>

                            <div class="col-md-4">
                                <select name="perfil" id="" class="form-control ">
                                    <option value="" disabled selected>Perfil</option>
                                    <option value="user">Usuário</option>
                                    <option value="adm">Administrador</option>
                                </select>
                            </div>
                            <p class="h5 mb-2 mt-3 text-gray-800 ml-3">Endereço do Usuário</p>
                            <div class="col-md-12">
                                <input type="text" class="form-control mb-2" placeholder="Cep" id="cep" name="cep">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control mb-2" id="logradouro" placeholder="Logradouro"
                                    name="logradouro">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control mb-2" id="numero" placeholder="Numero"
                                    name="numero">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control mb-2" placeholder="Complemento"
                                    name="complemento">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control mb-2" id="bairro" placeholder="Bairro"
                                    name="bairro">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control mb-2" id="cidade" placeholder="Cidade"
                                    name="cidade">
                            </div>
                            <div class="col-md-1">
                                <input type="text" class="form-control mb-2" id="uf" placeholder="Uf" name="uf">
                            </div>
                        </div>
                        <div class="row">
                            <button id="btn-cadastrar-usuario" class="form-control btn-secondary col-md-4 ml-3 mt-2  w-75 mx-auto">Realizar
                                Cadastro
                            </button>
                        </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="js/cpf-databr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <!-- var seria declaração de variavel -->
    <!-- let proteção ao scopro -->
    <!--  const torna o valor da variavel inalterável-->
    <script>
        // selecionando um elemento do html e tornando variavel
        const cep = document.querySelector('#cep');

        //console.log();
        // post = envia, get consulta, put = atualiza, delete = deleta;

        //ele adiciona um evento atraves do monitoramento, usando a "addEventListener",
        cep.addEventListener('keyup', function () {


            let cepDigitado = cep.value;

            if (cepDigitado.length == 9) {

                axios.get(`https://viacep.com.br/ws/${cepDigitado}/json/`)
                    .then(
                        resposta => {

                            if (!resposta.data.erro) {
                                //console.log(resposta.data);
                                document.querySelector('#logradouro').value = resposta.data.logradouro;
                                document.querySelector('#bairro').value = resposta.data.bairro;
                                document.querySelector('#cidade').value = resposta.data.localidade;
                                document.querySelector('#uf').value = resposta.data.uf;
                                document.querySelector('#numero').focus();
                            }
                        }
                    )
                    .catch(
                        erro => {
                            console.log(erro.message)
                        }
                    )

            }
        })


    </script>


    <!-- Jquery -->
    <script>

        //jquery abaixo identifica todos os jquery interpretados na predefinição "document".
        $(document).ready(function () {


            //mascaras do formulario usando mask
            $("#data").mask("00/00/0000");
            $("#cpf").mask("000.000.000-00");
            $("#cep").mask("00000-000");
            $("#cpf").keyup(function(){
                let = cpfDigitado = $("#cpf").val();
                $.post("consulta-cpf.php",
                {cpf:cpfDigitado},
                function (resposta){
                    if(resposta != ''){
                        $("#errocpf").html(resposta);
                    $("#btn-cadastrar-usuario").attr("disabled",true);
                    }else{
                        $("#cpf").html('');
                    $("#btn-cadastrar-usuario").attr("disabled",false);
                    }

                });
            });



            $("#login").blur(function(){
                let = loginDigitado = $("#login").val();
                //alert(loginDigitado);
            
               $.post("consulta-login.php",
               {login:loginDigitado},
               function (resposta) {
                if(resposta != ''){
                    $("#errologin").html(resposta);
                    $("#btn-cadastrar-usuario").attr("disabled",true);
                    
                }else{
                    $("#errologin").html('');
                    $("#btn-cadastrar-usuario").attr("disabled",false);
                }
               });
            
            });

            $("form").validate({
                rules: {
                    nome: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    dtnasc: {
                        required: true,
                        dateBR: true
                    },
                    cpf: {
                        required: true,
                        cpf: true
                    },
                    login: {
                        required: true,
                    },
                    senha: {
                        required: true,
                    },
                    perfil: {
                        required: true,
                    },
                    numero: {
                        required: true,
                    }
                },
                messages: {
                    nome: {
                        required: "Preencha o campo nome!",
                    },
                    email: {
                        required: "Preencha o campo E-mail!",
                        email: "E-mail inválido!"
                    },
                    dtnasc: {
                        required: "preencha o campo Data",
                        dateBR: "Data Inválida!"
                    },
                    cpf: {
                        required: "Preencha o campo CPF!",
                        cpf: "Cpf Inválido"
                    },
                    login: {
                        required: "Preencha o campo Login!",

                    },
                    senha: {
                        required: "Preencha o campo senha!",

                    },
                    perfil: {
                        required: "Preencha o campo perfil!",

                    },
                    numero: {
                        required: "Preencha o campo numero!",

                    }
                }
            });


        })
    </script>

</body>

</html>