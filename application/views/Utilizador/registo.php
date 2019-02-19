
<section class="section-login">
    <div class="container">
        <div class="align-self-center div-registo">
            <header class="align-self-center">
                <!-- <h4 class="titulo-registo">Novo Registo</h4> -->
                <div class="row">

                    <!-- <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-info" style="width: 50%"></div>
                    </div> -->

                    <div class="col-md-offset-2 col-md-2 col-xs-3 text-center">
                        <i class="far fa-check-circle fa-3x text-success"></i>
                        <br>
                        <label>Pacote</label>
                    </div>
                    <div class="col-md-2 col-xs-3 text-center">
                        <i class="far fa-check-circle fa-3x text-warning"></i>
                        <br>
                        <label>Conta</label>
                    </div>
                    <div class="col-md-2 col-xs-3 text-center">
                        <i class="far fa-dot-circle fa-3x"></i>
                        <br>
                        <label>Pagamento</label>
                    </div>
                    <div class="col-md-2 col-xs-3 text-center">
                        <i class="far fa-dot-circle fa-3x"></i>
                        <br>
                        <label>Confirmação</label>
                    </div>
                </div>
            </header>

             <?php echo form_open('utilizador/registo','class="form form-registo"'); ?>
             <input type="hidden" value="<?= base_url('')?>" id="url">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Nome Completo<span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="" required>
                    </div> <!-- form-group end.// -->
                </div>
                

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Morada<span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="" required>
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-3">
                        <label>Localidade<span class="required">*</span></label>
                        <select class="form-control" name="localidade" required>
                            <option selected="true" disabled="disabled" value="">Localidade</option>
                            <?php 
                                        // foreach($fabricante as $row)
                                        // { 
                                        // echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                                        // }
                                    ?>
                        </select>
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-3">
                        <label>Código Postal<span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder=" " required>
                    </div> <!-- form-group end.// -->
                </div>
                
                <div class="row">                      
                    <div class="form-group col-md-4">
                        <label>Nacionalidade<span class="required">*</span></label>
                        <select class="form-control" name="nacionalidade" required>
                            <option selected="true" disabled="disabled" value="">Nacionalidade</option>
                            <?php 
                                        // foreach($fabricante as $row)
                                        // { 
                                        // echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                                        // }
                                    ?>
                        </select>
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-4">
                        <label>Cartão de Cidadão<span class="required">*</span></label>
                        <input type="number" class="form-control" placeholder=" " required name="cc" id="cc">
                        <p class="text-danger" id="erroCC"></p>
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-4">
                        <label>Número de Contribuinte<span class="required">*</span></label>
                        <input type="number" class="form-control" placeholder=" " required name="nif" id="nif">
                    </div> <!-- form-group end.// -->
                </div>  
                <div class="row">                           
                    <div class="form-group col-md-4">
                        <label>Género<span class="required">*</span></label>
                        <br>
                        <select class="form-control" name="genero" required>
                            <option selected="true" disabled="disabled" value="">Genero</option>
                            <option value="m">Masculino</option>
                            <option value="f">Feminino</option>
                        </select>
                        <!-- <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="option1">
                            <span class="form-check-label"> Male </span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="option2">
                            <span class="form-check-label"> Female</span>
                        </label> -->
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-4">
                        <label>Data de Nascimento<span class="required">*</span></label>
                        <input type="date" class="form-control" placeholder=" " required>
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-4">
                        <label>Telefone<span class="required">*</span></label>
                        <input type="number" class="form-control" placeholder=" " required>
                    </div> <!-- form-group end.// -->
                </div> 
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Username<span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder=" " required name="username" id="username">
                        <p class="text-danger" id="erroUsername"></p>
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-6">
                        <label>Email<span class="required">*</span></label>
                        <input type="email" class="form-control" placeholder=" " required name="email" id="email">
                        <p class="text-danger" id="erroEmail"></p>
                    </div> <!-- form-group end.// -->
                </div>                        
                
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Password<span class="required">*</span></label>
                        <input type="password" class="form-control" placeholder=" " required id="passwordRegisto" name="passwordRegisto">
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-6">
                        <label>Confirmação Password<span class="required">*</span></label>
                        <input type="password" class="form-control" placeholder=" " required name="confirmPasswordRegisto" id="confirmPasswordRegisto" >
                        <p class="text-danger" id="confirmPw"></p>
                    </div> <!-- form-group end.// -->
                <div>                        
                <div align="center" class="row">
                    <div class="form-group col-md-12 ">
                        <input type="checkbox" class="" id="reg_agree" name="reg_agree" value="1" required>
                        <label for="reg_agree">Aceite os <a href="#">termos e condições</a></label>
                    </div>                            
                    <div class="form-group col-md-12 ">
                        <div class="g-recaptcha" data-sitekey="6LdOt5AUAAAAAK20_UC56v2G2kHoWU8QU3zvSHx9"></div>
                    </div><!-- captcha google -->
                </div>
            
                <div class="form-group col-md-12 ">
                    <input type="submit" class="btn btn-info btn-block" value="Formulário de registo" name="formRegisto" id="formRegisto"> 
                </div> <!-- form-group// -->

            </form>
            <div class="border-top card-body text-center">Have an account? <a href="<?= base_url('utilizador/login')?>">Log In</a></div>
        </div> <!-- col.//-->
    </div> <!-- container.//-->

</section>

<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="<?=base_url("assets/js/js_users_registo.js")?>"></script>