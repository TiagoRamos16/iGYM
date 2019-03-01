<div id="page-wrapper ">
    <div class="container-fluid ">
        <!-- Page Heading -->
        <div class="row " id="main-admin">

            <h1 class="title text-center"> Plano de treino</h1>

            <p><a class="btn-back-geral btn btn-primary" href="<?= base_url('personalTrainer/verTodosPlanos')?>"> <i class="fas fa-arrow-left"></i> Back</a>   </p>
            
            <div class="col-lg-6">

                <div class="plano-treino-divs">
                    <div class="row">
                        <div>
                            <h3>Infomação do Plano</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4"><b>Nome:</b></div>
                        <div class="col-lg-8">
                            <?=$plano['pt_nome']?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4"><b>Criado por:</b></div>
                        <div class="col-lg-6">
                            <?=$plano['f_nome']?>
                        </div>
                        <div class="col-lg-2">
                            <a class="btn btn-primary btn-sm" href="<?=base_url('utilizador/outroPerfil/'.$plano['funcionario_admin_id'])?>">
                                <i class="fas fa-eye"></i> Ver</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4"><b>Data:</b></div>
                        <div class="col-lg-8">
                            <?=$plano['pt_data']?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4"><b>Estado:</b></div>
                        <div class="col-lg-8">
                            <?php 
                                        if($plano['pt_estado']=="1"){
                                        echo '<i class="fas fa-circle text-success"></i> Activo';     
                                        }else{
                                            echo '<i class="fas fa-circle text-danger"></i> Inactivo';
                                        }
                                    ?>
                        </div>
                    </div>

                </div>

                
            </div>

            <div class="col-lg-6">
                <div class="plano-treino-divs">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Exercicios do Plano</h3>
                        </div>
                        
                    </div>

                    <?php foreach($exercicios as $exercicio): ?>
                    <div class="col-lg-6">
                        <div class="exercioPlanoTreino">
                            <img class="img-responsive" src="<?=base_url('assets/img/exercicios/').$exercicio['foto']?>"
                                alt="">

                            <h3 class="text-center">
                                <?=$exercicio['nome']?>
                            </h3>
                            <span class="label label-primary label-nivel">
                                <?=$exercicio['dificuldade']?></span>
                            <a class="btn btn-primary btn-block btn-exercioPlanoTreino" href="#edit<?php echo $exercicio['id'];?>"
                                data-title="Edit" data-toggle="modal">Ver</a>
                        </div>

                    </div>

                    <!--Modal -->

                    <div class="modal fade myModal" id="edit<?php echo $exercicio['id'];?>" tabindex="-1" role="dialog"
                        aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header" id="titulo-exercicios">
                                    <button type="button" id="fechar-modal" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">
                                        <?php echo $exercicio['nome'] ?>
                                    </h4>
                                </div>
                                <div class="modal-body">


                                    <div class="form-group">
                                        <img class="img-exercicio" src="<?php echo base_url("assets/img/exercicios/".$exercicio['foto'])
                                            ?>" alt="">
                                    </div>
                                    <div class="form-group">

                                        <label for="descricao-exercicio">Descrição</label>
                                        <p>
                                            <?php echo $exercicio['descricao'] ?>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label for="descricao-exercicio">Tipo de Exercício:</label>
                                        <?php echo ' '.$exercicio['tipo_exercicio'] ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="descricao-exercicio">Dificuldade:</label>
                                        <?php echo ' '.$exercicio['dificuldade'] ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="descricao-exercicio">Duração:</label>
                                        <?php echo ' '.$exercicio['duracao'].' '.$exercicio['tipo_duracao'] ?>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>



                    <?php endforeach ?>
                </div>

            </div>



        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->


