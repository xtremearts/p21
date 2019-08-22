<header id="topnav" >
    <div class="topbar-main">
        <div class="container-fluid">
            <div class="logo">
                <a href="<?= base_url() ?>index.php/torcedores" class="logo">
                    <img src="<?= base_url() ?>assets/imagens/logo.png" alt="" height="40" class="logo-small">
                    <img src="<?= base_url() ?>assets/imagens/logo.png" alt="" height="30" class="logo-large">
                </a>

            </div>

            <div class="menu-extras topbar-custom">

            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <div class="navbar-custom" style="background-color: black">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="<?= base_url() ?>index.php/torcedores"><i class="icon-speedometer"></i>Página Inicial</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="icon-layers"></i>Cadastro</a>
                        <ul class="submenu">
                            <li><a href="<?php echo base_url()?>index.php/torcedores/cadastrarTorcedor">Torcedor</a></li>
                            <li><a href="<?php echo base_url()?>index.php/CidadesEBairros/listarCadastroUf">UF</a></li>
                            <li><a href="<?php echo base_url()?>index.php/CidadesEBairros/listarCadastroCidade">Cidade</a></li>
                            <li><a href="<?php echo base_url()?>index.php/CidadesEBairros/listarCadastroBairro">Bairro</a></li>
                        </ul>
                    </li>
                         
                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>