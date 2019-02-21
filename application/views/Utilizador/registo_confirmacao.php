<section class="section-login">
    <div class="container">
        <div class="align-self-center div-registo">
            <header class="align-self-center">
                <div class="row">

                    <div class="progress progress-striped linha-progresso">
                        <div class="progress-bar progress-bar-info" style="width: 80%"></div>
                    </div>

                    <div class="stepwizard">
                        <div class="row botao-progresso">

                            <div class="col-xs-1 text-center progresso1">
                                <a href="#" type="button" class="btn btn-info btn-circle" disabled="disabled">1</a>
                            </div>
                            <div class="col-xs-1 col-xs-offset-2 text-center progresso2">
                                <a href="#" type="button" class="btn btn-info btn-circle" disabled="disabled">2</a>
                            </div>
                            <div class="col-xs-1 col-xs-offset-2 text-center progresso3">
                                <a href="#" type="button" class="btn btn-info btn-circle" disabled="disabled">3</a>
                            </div>
                            <div class="col-xs-1 col-xs-offset-2 text-center progresso4">
                                <a href="#step-4" type="button" class="btn btn-info btn-circle">4</a>
                            </div>

                        </div> <!-- row botao-progresso -->
                    </div> <!-- stepwizard -->


                    <img class="img-registo_confirmacao" src="<?php echo base_url("assets/img/payment-conclusion.jpeg") ?>" alt="">

                    <div class="form-group col-md-12 texto-registo_confirmacao">
                        <h2 class="titulo-registo_confirmacao">Obrigado por se ter inscrito no ginásio iGYM! <i class="far fa-thumbs-up"></i></h2>
                        <p>Desejamos que consiga atingir os seus objectivos e que conte com o nosso apoio para que isso seja possível.</p>
                    
                    <?php 
                    // verifica se foi escolhido pagamento por transferencia bancaria
                    if($estado_pagamento == 0){ ?>

                        <p>Os seus dados foram  registados com sucesso, após a confirmação do seu pagamento irá receber um email com acesso à aplicação.</p>
                    </div> <!-- form-group end.// -->

                    <div class="form-group col-md-6 col-md-offset-3 botao-pagamento">
                        <a class="form-control btn btn-info btn-login btn-block" href="<?= base_url('home')?>">Voltar à página inicial</a>
                    </div> <!-- form-group// -->


                    <?php
                    // verifica se foi escolhido pagamento por transferencia bancaria    
                    }elseif($estado_pagamento == 1){ ?>

                        <p>Os seus dados foram  registados com sucesso, pode agora fazer login e começar a planear os seus treinos.</p>
                    </div> <!-- form-group end.// -->

                    <div class="form-group col-md-3 col-md-offset-3 botao-pagamento">
                        <a class="form-control btn btn-info btn-login btn-block" href="<?= base_url('home')?>">Voltar à página inicial</a>
                    </div> <!-- form-group// -->

                    <div class="form-group col-md-3 botao-pagamento">
                        <a class="form-control btn btn-info btn-login btn-block" href="<?= base_url('utilizador/login')?>">Login</a>
                    </div> <!-- form-group// -->

                    <?php } ?>

                </div> <!-- row -->
            </header>

        </div> <!-- div-registo.// -->
    </div> <!-- container.// -->
</section> <!-- .// -->