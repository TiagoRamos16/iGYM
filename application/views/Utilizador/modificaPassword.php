<section class="sectionLogin">
    <div class="container">
        <?php echo form_open('utilizador/validaToken','id="formRegisto"'); ?>
            <div class="form-login">
            <h2 class="form-signin-heading">Modificar Password</h2><br>
            <div class="form-group">
                    <label for="passwordRegisto">Password: <span class="text-danger"> *</span></label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fas fa-lock"></i></div>
                        <input class="form-control checkLogin" type="password" placeholder="Password" 
                         name="passwordConf" id="passwordRegisto">
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmPasswordRegisto">Confirm Password: <span class="text-danger"> *</span></label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fas fa-lock"></i></div>
                        <input class="form-control checkLogin" type="password" placeholder="Password" 
                         name="confirmPasswordRegisto" id="confirmPasswordRegisto">
                    </div>
                    <p id="confirmPw" class="text-danger text-center"></p>
                </div>
                
                <input type="hidden" name="tokenValue" value="<?= $token['value']?>">
                <input type="hidden" name="userId" value="<?= $token['id_utilizador']?>">
                <input type="hidden" id="url" value="<?= base_url()?>">
                <input class="btn btn-primary btn-lg btn-block" name="submitModPassword" type="submit" value="Modificar Password" id="submit">
            </div>
        </form> 
    </div>
</section>


<script src="<?=base_url("assets/js/js_users_registo.js")?>"></script>

