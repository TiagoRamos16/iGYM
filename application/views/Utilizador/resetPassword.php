<?php
if($this->session->flashdata('sucessoResetPassword')!=null):?>
    <div class="alert alert-success text-center msn-contacto" id="mensagem">
        <i class="fas fa-check-circle  text-success"></i>
        <strong>Sucesso!</strong> 
        <?= $this->session->flashdata('sucessoResetPassword')?>
        <button type="button" class="close" aria-label="Close" id="close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <script>
        document.getElementById("close").addEventListener("click", function(){
            document.getElementById("mensagem").style.display = "none";
        });
    </script>
<?php endif?>

<section class="section-resetPass">
    <div class="container containerResetPass">
        <?php echo form_open('utilizador/resetPassword'); ?>
            <input type="hidden" value="<?= base_url()?>" id="url">
            <div class="form-login">
            <h2 class="form-signin-heading text-center">Recuperar Password</h2><br>
            <div class="form-group">
                <label for="inputEmail" class="">Endereço de email:</label>
                <input type="email" id="email" class="form-control" placeholder="Email address" required name="email"
                value="<?php if($this->session->flashdata('email')) echo $this->session->flashdata('email')?>" >
                <small class="text-muted"><p>As instrução de reset de password serão enviadas para o email</p>
            </div>
                
                <?php if($this->session->flashdata('erroResetPassword')) echo "<p class='text-center text-danger'>".$this->session->flashdata('erroResetPassword')."</p>"; ?>
                <p id="erroEmail" class="text-center text-danger"></p>
                <input class="btn btn-lg btn-primary btn-block" type="submit" id="formRegisto" name="formRegisto" value="Recuperar">
            </div>
        </form> 
    </div>
</section>





