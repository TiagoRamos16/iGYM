<div class="container">
    <div class="align-self-center">
        <header class="align-self-center">
            <h4>Novo Registo</h4>
        </header>
            <form>
                <div class="form-group col-md-12">
                    <label>Nome Completo </label>   
                    <input type="text" class="form-control" placeholder="">
                </div> <!-- form-group end.// -->

                <div class="form-group col-md-6">
                    <label>Morada </label>   
                    <input type="text" class="form-control" placeholder="">
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-3">
                    <label>Localidade</label>
                    <select class="form-control" name="localidade" >
                        <option selected="true" disabled="disabled">Localidade</option>
                                <?php 
                                    // foreach($fabricante as $row)
                                    // { 
                                    // echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                                    // }
                                ?>  
                    </select>
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-3">
                    <label>Código Postal</label>
                    <input type="text" class="form-control" placeholder=" ">
                </div> <!-- form-group end.// -->

                <div class="form-group col-md-4">
                    <label>Nacionalidade</label>
                    <select class="form-control" name="nacionalidade" >
                        <option selected="true" disabled="disabled">Nacionalidade</option>
                                <?php 
                                    // foreach($fabricante as $row)
                                    // { 
                                    // echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                                    // }
                                ?>  
                    </select>
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-4">
                    <label>Cartão de Cidadão</label>
                    <input type="number" class="form-control" placeholder=" ">
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-4">
                    <label>Número de Contribuinte</label>
                    <input type="number" class="form-control" placeholder=" ">
                </div> <!-- form-group end.// -->

                <div class="form-group col-md-4">
                    <label>Género</label>
                    <br>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="option1">
                        <span class="form-check-label"> Male </span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="option2">
                        <span class="form-check-label"> Female</span>
                    </label>
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-4">
                    <label>Data de Nascimento</label>
                    <input type="date" class="form-control" placeholder=" ">
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-4">
                    <label>Telefone</label>
                    <input type="number" class="form-control" placeholder=" ">
                </div> <!-- form-group end.// -->

                <div class="form-group col-md-6">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder=" ">
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder=" ">
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder=" ">
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-6">
                    <label>Confirmação Password</label>
                    <input type="password" class="form-control" placeholder=" ">
                </div> <!-- form-group end.// -->

                <div class="form login-group-checkbox align-self-center">
                    <input type="checkbox" class="" id="reg_agree" name="reg_agree" value="1" required>
                    <label for="reg_agree">Aceite os  <a href="#">termos e condições</a></label>
                    <div class="g-recaptcha" data-sitekey="6LdOt5AUAAAAAK20_UC56v2G2kHoWU8QU3zvSHx9"></div> <!-- captcha google -->
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Registo  </button>
                </div> <!-- form-group// -->                                              
            </form>
        <div class="border-top card-body text-center">Have an account? <a href="">Log In</a></div>
    </div> <!-- col.//-->
</div> <!-- container.//-->


<script src='https://www.google.com/recaptcha/api.js'></script>