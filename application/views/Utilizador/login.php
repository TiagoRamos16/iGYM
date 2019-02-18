<section class="section-login">
    <img class="img-login" src="https://i0.wp.com/www.africom.co.zw/wp-content/uploads/2017/03/login-page.jpg?ssl=1" alt="">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 container-login ">
                <h2 class="text-center login-title text-white">Login</h2>
                <form role="form form-login">
                    <div class="form-group">
                        <label for="inputUsernameEmail">Username ou email</label>
                        <input type="text" class="form-control" id="inputUsernameEmail">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">
                            Remember me </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <a href="# " class=""> Esqueceu-se da palavra pass?</a>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-info col-md-3 btn-login btn-block">
                            Log In
                        </button>

                    </div>
                    
                </form>
                <label class="pull-right">Ainda nao tem conta? <a href="<?= base_url('utilizador/registo')?>">Efetuar Registo</a></label>

            </div>

        </div>
    </div>
</section>