<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="row">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header col-md-2">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img class="nav-img" src="<?=base_url('assets/img/logo2.png')?>" alt="LOGO">
            </a>
        </div>
        <div class="col-md-3">
            <h2 class="text-success">Administrador</h2>
        </div>
        <div class="col-md-3">
            <form class="navbar-form navbar-left pesquisa-nav" role="search">
                <div class="form-group ">
                    <input type="text" class="form-control input-sm " placeholder="Search">
                </div>
                <button type="submit" class="btn btn-sm btn-default ">Submit</button>
            </form>
        </div>
        <!-- Top Menu Items -->
        <div class="col-md-4">
            <ul class="nav navbar-right top-nav ">
                <li><a href="../index.php" class=""><i class="far fa-envelope"></i></i> Mensagens</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fas fa-user"></i> Perfil <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Ver Perfil</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Logout</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>

</nav>