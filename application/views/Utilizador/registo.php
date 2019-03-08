
<section class="section-login">
    <div class="container">
        <div class="align-self-center div-registo">
            <header class="align-self-center">
                <!-- <h4 class="titulo-registo">Novo Registo</h4> -->

                <div class="row">

                    <!-- <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-info" style="width: 50%"></div>
                    </div>

                    <div class="col-md-offset-2 col-md-2 col-xs-3 text-center">
                        <a class="back-login" href="<?=base_url('utilizador/registo_plano');?>"><i class="far fa-check-circle fa-2x text-success"></i></a>
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
                    </div> -->


                    <div class="progress progress-striped linha-progresso">
                        <div class="progress-bar progress-bar-info" style="width: 30%"></div>
                    </div>


                    <div class="stepwizard">
                        <div class="row botao-progresso">
                        
                            <div class="col-xs-1 text-center progresso1">
                                <a href="<?=base_url('utilizador/registo_plano');?>" type="button" class="btn btn-info btn-circle">1</a>
                            </div>
                            <div class="col-xs-1 col-xs-offset-2 text-center progresso2">
                                <a href="#step-2" type="button" class="btn btn-info btn-circle">2</a>

                            </div>
                            <div class="col-xs-1 col-xs-offset-2 text-center progresso3">
                                <a href="#step-3" type="button" class="btn btn-info btn-circle" disabled="disabled">3</a>
                            </div>
                            <div class="col-xs-1 col-xs-offset-2 text-center progresso4">
                                <a href="#step-4" type="button" class="btn btn-info btn-circle" disabled="disabled">4</a>
                            </div>

                        </div> <!-- row botao-progresso -->
                    </div> <!-- stepwizard -->

                </div>
            </header>

             <?php echo form_open("utilizador/registo",'class="form form-registo"'); ?>
             <input type="hidden" value="<?= base_url('')?>" id="url">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Nome Completo<span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder=""  name="nome" required
                        value="<?php 
                        if($this->session->userdata('clienteRegisto')!= null){
                            echo $this->session->userdata('clienteRegisto')['nome'];
                            }else{
                                echo set_value('nome');
                            } ?>">


                    </div> <!-- form-group end.// -->
                </div>
                

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Morada<span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder=""  name="morada" required
                        value="<?php 
                        if($this->session->userdata('clienteRegisto')!= null){
                            echo $this->session->userdata('clienteRegisto')['morada'];
                            }else{
                                echo set_value('morada');
                            } ?>">


                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-3">
                        <label>Localidade<span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="" name="localidade" required
                        value="<?php 
                        if($this->session->userdata('clienteRegisto')!= null){
                            echo $this->session->userdata('clienteRegisto')['localidade'];
                            }else{
                                echo set_value('localidade');
                            } ?>">
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-3">
                        <label>Código Postal<span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="0000-000" pattern="[0-9]{4}-[0-9]{3}" name="codigoPostal" required
                        value="<?php 
                        if($this->session->userdata('clienteRegisto')!= null){
                            echo $this->session->userdata('clienteRegisto')['codigo_postal'];
                            }else{
                                echo set_value('codigo_postal');
                            } ?>">
                        
                    </div> <!-- form-group end.// -->
                </div>
                
                <div class="row">                      
                    <div class="form-group col-md-4">
                        <label>Nacionalidade<span class="required">*</span></label>
                        <select class="form-control" name="nacionalidade"  name="nacionalidade"  required
                        value="<?php 
                        if($this->session->userdata('clienteRegisto')!= null){
                            echo $this->session->userdata('clienteRegisto')['nacionalidade'];
                            }else{
                                echo set_value('nacionalidade');
                            } ?>">

                            <option selected="true" disabled="disabled" value="">Nacionalidade</option>
                            <!-- <option value="1"
                            <?php 
                                if($this->session->userdata('clienteRegisto')!= null){
                                    if($this->session->userdata('clienteRegisto')['nacionalidade']=='1'){
                                        echo 'selected="selected"'; 
                                    }
                                } 
                            ?> 
                            >Portuguesa</option> -->
                            
                            <?php 
                                foreach($listaPaises as $pais)
                                { 
                                echo '<option value="'.$pais['paisId'].'">'.$pais['paisNome'].'</option>';
                                }
                            ?>
                        </select>
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-4">
                        <label>Cartão de Cidadão<span class="required">*</span></label>
                        <input type="number" class="form-control" placeholder=" " required name="cc" id="cc"
                        value="<?php 
                        if($this->session->userdata('clienteRegisto')!= null){
                            echo $this->session->userdata('clienteRegisto')['cc'];
                            }else{
                                echo set_value('cc');
                            } ?>">

                        <p class="text-danger" id="erroCC"></p>
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-4">
                        <label>Número de Contribuinte<span class="required">*</span></label>
                        <input type="number" class="form-control" placeholder=" " required name="nif" id="nif"
                        value="<?php 
                        if($this->session->userdata('clienteRegisto')!= null){
                            echo $this->session->userdata('clienteRegisto')['nif'];
                            }else{
                                echo set_value('nif');
                            } ?>">

                        <p class="text-danger" id="erroNif"></p>
                    </div> <!-- form-group end.// -->
                </div>  
                <div class="row">                           
                    <div class="form-group col-md-4">
                        <label>Género<span class="required">*</span></label>
                        <br>
                        <select class="form-control" name="genero" required>
                            <option selected="true" disabled="disabled" value="" name="genero">Genero</option>
                            <option value="m" 
                            <?php 
                                if($this->session->userdata('clienteRegisto')!= null){
                                    if($this->session->userdata('clienteRegisto')['genero']=='m'){
                                        echo 'selected="selected"'; 
                                    }
                                }
                            ?> 
                            >Masculino</option>
                            <option value="f"
                            <?php 
                                if($this->session->userdata('clienteRegisto')!= null){
                                    if($this->session->userdata('clienteRegisto')['genero']=='f'){
                                        echo 'selected="selected"'; 
                                    }
                                } 
                            ?> 
                            >Feminino</option>
                        </select>
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-4">
                        <label>Data de Nascimento<span class="required">*</span></label>
                        <input type="date" class="form-control" placeholder=" " required name="dataNascimento" 
                        value="<?php 
                        if($this->session->userdata('clienteRegisto')!= null){
                            echo $this->session->userdata('clienteRegisto')['data_nascimento'];
                            }else{
                                echo set_value('data_nascimento');
                            } ?>">
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-4">
                        <label>Telefone<span class="required">*</span></label>
                        <input type="number" class="form-control" placeholder=" " required name="telefone" 
                        value="<?php 
                        if($this->session->userdata('clienteRegisto')!= null){
                            echo $this->session->userdata('clienteRegisto')['telefone'];
                            }else{
                                echo set_value('telefone');
                            } ?>">
                    </div> <!-- form-group end.// -->
                </div> 
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Username<span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder=" " required name="username" id="username"
                        value="<?php 
                        if($this->session->userdata('adminRegisto')!= null){
                            echo $this->session->userdata('adminRegisto')['username'];
                            }else{
                                echo set_value('username');
                            } ?>">
                        <p class="text-danger" id="erroUsername"></p>
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-6">
                        <label>Email<span class="required">*</span></label>
                        <input type="email" class="form-control" placeholder=" " required name="email" id="email"
                        value="<?php 
                        if($this->session->userdata('adminRegisto')!= null){
                            echo $this->session->userdata('adminRegisto')['email'];
                            }else{
                                echo set_value('email');
                            } ?>">
                        <p class="text-danger" id="erroEmail"></p>
                    </div> <!-- form-group end.// -->
                </div>                        
                
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Password<span class="required">*</span></label>
                        <input type="password" class="form-control" placeholder=" " required id="passwordRegisto" name="passwordRegisto" 
                        value="<?php echo set_value('passwordRegisto'); ?>">
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-6">
                        <label>Confirmação Password<span class="required">*</span></label>
                        <input type="password" class="form-control" placeholder=" " required name="confirmPasswordRegisto" id="confirmPasswordRegisto"
                        value="<?php echo set_value('confirmPasswordRegisto'); ?>">
                        <p class="text-danger" id="confirmPw"></p>
                    </div> <!-- form-group end.// -->
                <div>                        
                <div align="center" class="row">
                    <div class="form-group col-md-12 ">
                        <input type="checkbox" class="" id="reg_agree" name="reg_agree" required>
                        <label for="reg_agree">Aceite os <a href="#">termos e condições</a></label>
                    </div>

                    <?php  /*   se o check nao for preenchido mostra erro  */
                        if($this->session->flashdata('errocheck')!=null){
                            echo "<p class='text-center text-danger erro-form-login'>".$this->session->flashdata('errocheck')."</p>";
                        }
                    ?>

                    <div class="form-group col-md-12 ">
                        <div class="g-recaptcha" id="recaptcha" data-sitekey="6LdOt5AUAAAAAK20_UC56v2G2kHoWU8QU3zvSHx9"></div>
                        <span class="msg-error error" style="margin-left:100px;color:red"></span>

                        <?php       /*   se o captcha nao for preenchido mostra erro  */
                            if($this->session->flashdata('erroCaptcha')!=null){
                                echo "<p class='text-center text-danger erro-form-login'>".$this->session->flashdata('erroCaptcha')."</p>";
                            }
                        ?>

                    </div><!-- captcha google -->
                </div>
            
                <div class="form-group col-md-12 ">
                    <input type="submit" class="btn btn-info btn-block" value="Avançar para Pagamento" name="formRegisto" id="formRegisto"> 
                </div> <!-- form-group// -->
                <p class="text-danger" id="erroSubmit"></p>                                    
            </form>
            <div class="row">
                <div class="form-group col-md-4">
                    <a class="back-login" href="<?=base_url('utilizador/registo_plano');?>"><i class="fas fa-arrow-left "></i> Voltar</a>
                </div> <!-- form-group// -->

                <div class="form-group col-md-4">
                    <div class="border-top card-body text-center">Já possui conta? <a href="<?= base_url('utilizador/login')?>">Log In</a></div>
                    <div class="text-danger"><?php echo validation_errors(); ?></div>
                </div> <!-- form-group// -->
            </div> <!-- row.// -->

        </div> <!-- col.//-->
    </div> <!-- container.//-->

</section>

<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="<?=base_url("assets/js/js_users_registo.js")?>"></script>

<script>
$( '#formRegisto' ).click(function(e){
  var $captcha = $( '#recaptcha' ),
      response = grecaptcha.getResponse();
  
  if (response.length === 0) {
    $( '.msg-error').text( "Tem de preencher o reCAPTCHA!" );
    if( !$captcha.hasClass( "error" ) ){
      $captcha.addClass( "error" );
      e.preventDefault(); // cancela o evento do submit
    }
  }
})
</script>