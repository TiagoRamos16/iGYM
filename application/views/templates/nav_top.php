
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url('home')?>">
                <img class="nav-img" src="<?=base_url('assets/img/logo2.png')?>" alt="LOGO">
            </a>
        </div>

        <!--  These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse ">
             
             <!-- Top Menu Items -->

        <ul class="nav navbar-right top-nav ">
            <li><a href="<?= base_url('utilizador/mensagens') ?>" class=""><i class="far fa-envelope"></i></i> Mensagens 
                <span class="badge"><?= $countMensagens ?></span></a>
                
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fas fa-user"></i> <?=$this->session->userdata('sessao_utilizador')['username']?> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?= base_url('utilizador/paginaPerfil') ?>">Ver Perfil</a></li>
                    <li class="divider"></li>
                    <li><a href="<?= base_url('utilizador/logout')?>">Logout</a></li>

                </ul>
            </li>
        </ul>
        