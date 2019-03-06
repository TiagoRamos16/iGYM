<div id="page-wrapper ">
    <div class="container-fluid ">
        <!-- Page Heading -->
        <div class="row " id="main-admin">


            <!-- Mensagens de sucesso ou de erro -->
            <?php if($this->session->flashdata('sucessoAdicionarExercicio')!=null):?>
            <div class="alert alert-success text-center msn-contacto" id="message">
                <i class="fas fa-check-circle  text-success"></i>
                <strong>Sucesso!</strong>
                <?= $this->session->flashdata('sucessoAdicionarExercicio')?>
                <button type="button" class="close" aria-label="Close" id="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <script>
                document.getElementById("close").addEventListener("click", function () {
                    document.getElementById("message").style.display = "none";
                });
            </script>
            <?php endif?>

            <div class="row">
                <h1 class="title text-center"> Adicionar Plano de treino </h1>
            </div>



            <div class="col-md-12 ">



                <div class="col-md-8 col-md-offset-2 btns-lista-exercicios">
                    <?php if ($this->uri->segment(4)==false): ?>
                    <div class="col-md-6">
                        <a class="btn btn-primary btn-block active" href="<?=base_url('personalTrainer/adicionarPlanoTreinoPasso2/').$id?>">Meus
                            Exercicios</a>
                    </div>
                    <div class="col-md-6 ">
                        <a class="btn btn-primary btn-block" href="<?=base_url('personalTrainer/adicionarPlanoTreinoPasso2/').$id."/1"?>">Todos
                            os exercicios</a> 
                    </div> <?php else: ?>
                            <div class="col-md-6">
                                <a class="btn btn-primary btn-block " href="<?=base_url('personalTrainer/adicionarPlanoTreinoPasso2/').$id?>">Meus
                                    Exercicios</a>
                            </div>
                            <div class="col-md-6 ">
                                <a class="btn btn-primary btn-block active" href="<?=base_url('personalTrainer/adicionarPlanoTreinoPasso2/').$id."/1"?>">Todos
                                    os exercicios</a> 
                            </div> <?php endif ?>

                </div>
                            



                            <div class="plano-treino-divs">
                                <div class="col-md-6">
                                    <a class="btn btn-default" href="<?= base_url(" personalTrainer/adicionarPlanoTreino")?>">
                                            <i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                                <div class="col-md-6">
                                    <?= form_open("personalTrainer/adicionarPlanoTreinoPasso2/".$id)?>
                                        <input type="submit" class="btn btn-success pull-right" name="confPT" value="Confirmar Plano de treino">
                                    <?= form_close()?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2>Passo 2</h2>
                                        <h4>Lista de Exercicios</h4>
                                    </div>
                                </div>

                                <?php 
                $count = 0;
                foreach($exercicios as $exercicio): 
                    $count++;
                
                    if($count%4==0) echo "<div class='row'>";
            ?>

                                <div class="col-lg-3">
                                    <div class="exercioPlanoTreino ">
                                        <img class="img-responsive" src="<?=base_url('assets/img/exercicios/').$exercicio['foto']?>"
                                            alt="">

                                        <h3 class="text-center">
                                            <?=$exercicio['nome']?>
                                        </h3>
                                        <span class="label label-primary label-nivel">
                                            <?=$exercicio['dificuldade']?></span>
                                        
                                        <?php if ($this->uri->segment(4)==false): ?>
                                        <?php echo form_open('personalTrainer/adicionarPlanoTreinoPasso2/'.$id,'id=formLE' ) ;?>
                                        <?php else:?>
                                        <?php echo form_open('personalTrainer/adicionarPlanoTreinoPasso2/'.$id."/1",'id=formLE' ) ;?>
                                        <?php endif?>
                                        <input type="hidden" name="idPlanoAdicionar" value="<?=$id?>">
                                        <input type="hidden" name="idExercicioAdicionar" value="<?=$exercicio['id']?>">
                                        <button class="btn btn-success btn-exercioPlanoTreino btn-block <?="
                                            divLE".$exercicio['id']?>"
                                            id="btnAdicionar" name="btnAdicionar" type="submit" value="Submit"><i class="fas fa-check-circle"></i>
                                            Adicionar</button>
                                        <?= form_close();?>

                                    </div>

                                </div>
                                <?php 
               if($count%4==0) echo "</div>"; 
                endforeach; echo '</div>'?>










                            <div class="plano-treino-divs">
                                <h2 class="title text-center"> Lista de exercicios selecionados </h2>


                                <?php foreach($exerciciosAssoc as $exercicioAssoc): ?>
                                <div class="col-lg-4">
                                    <div class="exercioPlanoTreino">
                                        <img class="img-responsive" src="<?=base_url('assets/img/exercicios/').$exercicioAssoc['foto']?>"
                                            alt="">

                                        <h3 class="text-center">
                                            <?=$exercicioAssoc['nome']?>
                                        </h3>
                                        <span class="label label-primary label-nivel">
                                            <?=$exercicioAssoc['dificuldade']?></span>
                                        <?php if($this->uri->segment(4)==false): ?>
                                        <a href="<?=base_url('personalTrainer/eliminarExercicoPlanoTreinoPass2/').$id."/".$exercicioAssoc['id']?>">
                                            <i class="fas fa-times-circle icon-del text-danger fa-2x"></i>
                                        </a>
                                        <?php else: ?>
                                        <a href="<?=base_url('personalTrainer/eliminarExercicoPlanoTreinoPass2/').$id."/".$exercicioAssoc['id']."/1"?>">
                                            <i class="fas fa-times-circle icon-del text-danger fa-2x"></i>
                                        </a>
                                        <?php endif?>
                                        <a class="btn btn-primary btn-block btn-exercioPlanoTreino" href="#edit<?php echo $exercicioAssoc['id'];?>"
                                            data-title="Edit" data-toggle="modal">Ver</a>
                                    </div>

                                </div>

                                <!--Modal -->

                                <div class="modal fade myModal" id="edit<?php echo $exercicioAssoc['id'];?>" tabindex="-1"
                                    role="dialog" aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header" id="titulo-exercicios">
                                                <button type="button" id="fechar-modal" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">
                                                    <?php echo $exercicioAssoc['nome'] ?>
                                                </h4>
                                            </div>
                                            <div class="modal-body">


                                                <div class="form-group">
                                                    <img class="img-exercicio" src="<?php echo base_url(" assets/img/exercicios/".$exercicioAssoc['foto'])
                                                        ?>" alt="">
                                                </div>
                                                <div class="form-group">

                                                    <label for="descricao-exercicio">Descrição</label>
                                                    <p>
                                                        <?php echo $exercicioAssoc['descricao'] ?>
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="descricao-exercicio">Tipo de Exercício:</label>
                                                    <?php echo ' '.$exercicioAssoc['tipo_exercicio'] ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="descricao-exercicio">Dificuldade:</label>
                                                    <?php echo ' '.$exercicioAssoc['dificuldade'] ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="descricao-exercicio">Duração:</label>
                                                    <?php echo ' '.$exercicioAssoc['duracao'].' '.$exercicioAssoc['tipo_duracao'] ?>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>



                                <?php endforeach ?>
                            </div>




                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div><!-- /#wrapper -->


        <script>




            $.ajax({
                url: "<?= base_url('personalTrainer/listaExercicios/') ?>",
                type: "post",
                dataType: "json",
                data: {
                    "idPlano": <?= $id ?> 
   },
                success: function (data, status) {

                    for (var i = 0; i < data.length; i++) {
                        $('.divLE' + data[i].exercicio_id).css("background-color", "gray");
                        $('.divLE' + data[i].exercicio_id).css("border", "1px solid gray");
                        $('.divLE' + data[i].exercicio_id).html("Já Selecionado");
                        $('.divLE' + data[i].exercicio_id).attr("disabled", true);
                    }
                }
            });




        </script>