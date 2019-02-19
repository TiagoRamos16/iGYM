<section class="section-login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 container-login">
                <a class="back-login" href="<?=base_url('home');?>"><i class="fas fa-arrow-left "></i> Voltar</a>
                <h2 class="text-center login-title text-white">Login</h2>
                <form role="form form-login">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
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
                        <input type="submit" class="form-control btn btn-info col-md-3 btn-login btn-block" name="submitLogin" id="submitLogin" value="Efectuar Login">
                        
                       

                    </div>
                    
                </form>
                <label class="pull-right">Ainda nao tem conta? <a href="<?= base_url('utilizador/registo')?>">Efetuar Registo</a></label>

            </div>

        </div>
    </div>
</section>