<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img class="nav-img" src="<?=base_url('assets/img/logo2.png')?>" alt="LOGO">
            </a>
        </div>


        <div id="navbar" class="navbar-collapse collapse in" aria-expanded="true" style="">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Home</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#conceito">Conceito</a></li>
                <li><a href="#servicos">Serviços</a></li>
                <li><a href="#contactos">Contactos</a></li>
                <?php 
                if($this->session->userdata('sessao_utilizador')) : ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fas fa-user"></i> <?=$this->session->userdata('sessao_utilizador')['username']?><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Ver Perfil</a></li>
                            <li class="divider"></li>
                            <li><a href="<?= base_url('utilizador/logout')?>">Logout</a></li>
                        </ul>
                    </li>          
                <?php else:?> 
                    <li><a href="<?= base_url('utilizador/login')?>">Login</a></li>
                <?php endif?>    
            </ul>
        </div>
    </div>
    

</nav>