<?php if($this->session->flashdata('sucessoModPass')!=null):?>
    <div class="alert alert-success text-center msn-contacto" id="message">
        <i class="fas fa-check-circle  text-success"></i>
        <strong>Sucesso!</strong> 
        <?= $this->session->flashdata('sucessoModPass')?>
        <button type="button" class="close" aria-label="Close" id="close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
    <script>
        document.getElementById("close").addEventListener("click", function(){
            document.getElementById("message").style.display = "none";
        });
    </script>
<?php endif?>




<section class="section-login">
    <!-- <img class="img-login" src="https://i0.wp.com/www.africom.co.zw/wp-content/uploads/2017/03/login-page.jpg?ssl=1" alt=""> -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 container-login ">
                <a class="back-login" href="<?=base_url('home');?>"><i class="fas fa-arrow-left "></i> Voltar</a>
                <h2 class="text-center login-title text-white">Login</h2>
                <?php echo form_open('utilizador/login','class="form form-login"'); ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                        value='<?php if($this->session->flashdata('erroEmail')) echo $this->session->flashdata('erroEmail')?>'>
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
                            <a href="<?= base_url('utilizador/resetPassword')?> " class=""> Esqueceu-se da palavra pass?</a>
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-info btn-login btn-block" name="submitLogin" id="submitLogin" value="Efectuar Login">
                    </div>
             
                        <?php 

                            if($this->session->flashdata('erroLogin')!=null){
                                echo "<p class='text-center text-danger erro-form-login'>".$this->session->flashdata('erroLogin')."</p>";
                            }
                        ?>
              
                </form>
                <label class="pull-right">Ainda nao tem conta? <a href="<?= base_url('utilizador/registo')?>">Efetuar Registo</a></label>

            </div>

   
        </div>
    </div>
</section>