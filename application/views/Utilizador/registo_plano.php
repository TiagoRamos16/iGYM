<!-- details card section starts from here -->
<section class="section-login">
    <div class="container">
        <div class="align-self-center div-registo">
            <header class="align-self-center">
                <!-- <h4 class="titulo-registo">Novo Registo</h4> -->
                <div class="row">

                    <!-- <div class="col-md-offset-2 col-md-2 col-xs-3 text-center">
                        <i class="far fa-check-circle fa-3x text-warning"></i>
                        <br>
                        <label>Pacote</label>
                    </div>
                    <div class="col-md-2 col-xs-3 text-center">
                    <i class="far fa-dot-circle fa-3x"></i>
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
                        <div class="progress-bar progress-bar-info" style="width: 0%"></div>
                    </div>


                    <div class="stepwizard">
                        <div class="row botao-progresso">
                        
                            <div class="col-xs-1 text-center progresso1">
                                <a href="#step-1" type="button" class="btn btn-info btn-circle">1</a>
                            </div>
                            <div class="col-xs-1 col-xs-offset-2 text-center progresso2">
                                <a href="#step-2" type="button" class="btn btn-info btn-circle" disabled="disabled">2</a>

                            </div>
                            <div class="col-xs-1 col-xs-offset-2 text-center progresso3">
                                <a href="#step-3" type="button" class="btn btn-info btn-circle" disabled="disabled">3</a>
                            </div>
                            <div class="col-xs-1 col-xs-offset-2 text-center progresso4">
                                <a href="#step-4" type="button" class="btn btn-info btn-circle" disabled="disabled">4</a>
                            </div>

                        </div> <!-- row botao-progresso -->
                    </div> <!-- stepwizard -->

                </div> <!-- row -->
            </header>

            <br>
            <br>

            <div class="row">

            <?php            
                foreach($plano as $row){
            ?>

                <div class="col-md-4">
                    <div class="prices div-plano">
                        <ul class="lista-plano">
                            <li class="titulo-plano"> <b><?php echo $row['nome'] ?></b> </li>
                            <li class="preco-plano"> <?php echo $row['preco'].".00€*" ?> </li>
                    <!-- verifica quantos dias por semana -->
                    <?php            
                        if ($row['periodicidade'] == 7){?>
                            <li class="option-available">Segunda a Domingo</li>
                    <?php }
                        elseif($row['periodicidade'] == 2){?>
                            <li class="option-available">2x por semana (Seg. a Dom.)</li>
                    <?php }
                    ?>
                    <!-- verifica se tem incluido cardiofit e musculação -->
                    <?php            
                        if ($row['cardiofit_musculacao'] == 1){?>
                            <li class="option-available"><i class="far fa-check-circle fa-1.5x text-success"></i>Cardiofit &amp; musculação</li>
                    <?php }
                        else{?>
                            <li class="option-unavailable"><i class="far fa-times-circle fa-1.5x text-danger"></i>Cardiofit &amp; musculação</li>
                    <?php }
                    ?>
                    <!-- verifica se tem incluido aulas de grupo -->
                    <?php            
                        if ($row['aulas_grupo'] == 1){?>
                            <li class="option-available"><i class="far fa-check-circle fa-1.5x text-success"></i>Aulas de Grupo</li>
                    <?php }
                        else{?>
                            <li class="option-unavailable"><i class="far fa-times-circle fa-1.5x text-danger"></i>Aulas de Grupo</li>
                    <?php }
                    ?>
                    <!-- verifica se tem incluido consulta de nutricao -->
                    <?php            
                        if ($row['consulta_nutricao'] == 1){?>
                            <li class="option-available"><i class="far fa-check-circle fa-1.5x text-success"></i>Consulta de Nutrição</li>
                    <?php }
                        else{?>
                            <li class="option-unavailable"><i class="far fa-times-circle fa-1.5x text-danger"></i>Consulta de Nutrição</li>
                    <?php }
                    ?>
                    <!-- verifica se tem incluido avaliação física -->
                    <?php            
                        if ($row['avaliacao_fisica'] == 1){?>
                            <li class="option-available"><i class="far fa-check-circle fa-1.5x text-success"></i>Avaliação Física</li>
                    <?php }
                        else{?>
                            <li class="option-unavailable"><i class="far fa-times-circle fa-1.5x text-danger"></i>Avaliação Física</li>
                    <?php }
                    ?>
                            <li><strong>*valor para contrato de <?php echo $row['tempo_fidelizacao'] ?> meses.</strong></li>
                            <li>Débito direto:<strong> <?php echo $row['preco']*0.9 ?>0€</strong></li>
                        
                            <div class="form-group ">
                                <a class="form-control btn btn-info btn-login btn-block" href="<?= base_url('utilizador/registo/').$row['id']?>">Escolher Plano</a>
                            </div>
                        </ul>

                    </div>
                </div>

            <?php            
                } // fecha foreach
            ?>

            </div> <!-- row -->

            <div class="row">
                <div class="form-group col-md-4">
                    <a class="back-login" href="<?=base_url('home');?>"><i class="fas fa-arrow-left "></i> Voltar</a>
                </div> <!-- form-group// -->

                <div class="form-group col-md-4">
                    <div class="border-top card-body text-center">Já possui conta? <a href="<?= base_url('utilizador/login')?>">Log In</a></div>
                    <div class="text-danger"><?php echo validation_errors(); ?></div>
                </div> <!-- form-group// -->
            </div> <!-- row.// -->
            
        </div> <!-- div-registo -->
    </div> <!-- container -->
</section>

