<nav class="navbar navbar-expand navbar-light bg-dark text-white topbar mb-4 static-top shadow navbar-height">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-4 ">
        <li class="nav-item dropdown no-arrow ml-2  navbar-efect">

            <a class="nav-link efeito dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="fas fa-chart-area fa-2x mr-2"></i> Gráficos
            </a>
        </li>
        <li class="nav-item  dropdown no-arrow ml-5 navbar-efect">

            <a class="nav-link efeito dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="fas fa-dollar-sign fa-2x mr-2"></i>Financeiro
            </a>
            
        </li>
        <li class="nav-item dropdown no-arrow ml-5 navbar-efect">

            <a class="nav-link efeito dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"> <i class="fas fa-hotdog fa-2x mr-2"></i>Produtos
            </a>
            <ul class="dropdown-menu bg-dark">
                <li class="nav-item bg-dark "><a class="nav-link dropdown-toggle" href="#">Estoque</a></li>
                <li class="nav-item bg-dark "><a class="nav-link dropdown-toggle" href="#">Histórico</a></li>
            </ul>

        </li>
        <li class="nav-item dropdown no-arrow ml-5 navbar-efect">

            <a class="nav-link efeito dropdown-toggle " id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="fas fa-trophy fa-2x mr-2"></i>Mais vendidos</a>
        </li>
        <li class="nav-item dropdown no-arrow ml-5 mr-5 navbar-efect">

            <a class="nav-link efeito dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="fas fa-mobile-alt fa-2x mr-2"></i>Aplicativo</a>
        </li>
        <li class="ml-5"></li>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow ml-5 topbar-left-icon-user">
            <a class="nav-link efeito dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none text-white d-lg-inline text-gray-800 small">Olá,
                    <?php echo $_SESSION["nome"] ?>
                </span>
                <img class="img-profile rounded-circle" src="img/<?php echo $_SESSION["foto"]; ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="sair.php">
                    <i class="fas fa-user-cog mr-2 text-gray-400"></i>
                    Alterar usuário
                </a>

                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Sair
                </a>


            </div>
        </li>

    </ul>

</nav>