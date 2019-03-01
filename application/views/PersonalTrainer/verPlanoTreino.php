<div id="page-wrapper ">
    <div class="container-fluid ">
        <!-- Page Heading -->
        <div class="row " id="main-admin">


            <!-- Mensagens de sucesso ou de erro -->
            <?php if($this->session->flashdata('sucessoEliminarExercicio')!=null):?>
            <div class="alert alert-success text-center msn-contacto" id="message">
                <i class="fas fa-check-circle  text-success"></i>
                <strong>Sucesso!</strong>
                <?= $this->session->flashdata('sucessoEliminarExercicio')?>
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

            <h1 class="title text-center"> Plano de treino</h1>

            <p><a class="btn-back-geral btn btn-primary" href="<?= base_url('personalTrainer/meusPlanos')?>"> <i class="fas fa-arrow-left"></i> Back</a>   </p>
            
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
                        <div class="col-lg-8">
                            <?=$plano['f_nome']?>
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

                <div>
                    <div class="plano-treino-divs">
                        <div class="row">
                            <div>
                                <h3>Clientes </h3>
                            </div>
                        </div>
                        <ul class="list-group listaClientes-verPlano">
                            <?php foreach($clientes as $cliente):?>
                            <li class="list-group-item listaClientes-li-verPlano">

                                <img src="<?=base_url('uploads/').$cliente['foto']?>" height="50px" width="50px" alt="">
                                <span class="verPT-nomeCliente">
                                    <?=$cliente['nome']?></span>
                                <a href="<?= base_url('Utilizador/outroPerfil/'.$cliente['admin_id'])?>"><i class="fas fa-arrow-circle-right fa-3x pull-right"></i></a>
                            </li>
                            <?php endforeach?>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="plano-treino-divs">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Exercicios do Plano</h3>
                        </div>
                        <div class="col-md-6">
                            <a href="<?=base_url('personalTrainer/listaExercicios/'.$id)?>" class="btn btn-primary pull-right btn-adicionar-exercicio"> 
                                <i class="fas fa-plus-circle"></i> Adicionar Exercicio
                            </a>
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
                            <a href="<?=base_url('personalTrainer/eliminarExercicoPlanoTreino/').$id."/".$exercicio['id']?>">
                                <i class="fas fa-times-circle icon-del text-danger fa-2x"></i>
                            </a>
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


<div class="modal" id="modalRemoverPLano">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close closeModal" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center ">Remover Plano de Treino</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('personalTrainer/meusPlanos'); ?>
                <div class="form-group">
                    <p for="email" class="alert alert-danger">Tem certeza que pretende remover o plano de treino?</p>
                    <input type="hidden" id="url" value="<?=base_url()?>">
                    <input type="hidden" class="form-control idPlano" id="idPlano" name="idPlano" value="">
                </div>
            </div>
            <div class="modal-footer">
                <p class="text-muted">O plano será apagado do sistema, se apenas quiser desabilita-lo deve entao editar
                    o estado para inactivo</p>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" name="submitRemovePlano" class="btn btn-primary" value="Confirmar">
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="modalEditarPlano">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close closeModal" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center ">Editar Plano de Treino</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('personalTrainer/meusPlanos'); ?>
                <input type="hidden" id="url" value="<?=base_url()?>">
                <input type="hidden" class="form-control idPlano" id="idPlano" name="idPlano" value="">
                <div class="form-group">
                    <label for="">Novo nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Novo Nome">
                    <p class="text-muted"><small>Se deixar o campo em branco este nao sofre alterações</small></p>
                </div>
                <div class="form-group">
                    <label for="">Estado do plano de treino:</label>
                    <div class="radio">
                        <label class="">
                            <input class="" type="radio" name="estado" id="estado" value="1" checked="">
                            Activo
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="estado" id="estado" value="2">
                            Inactivo
                        </label>
                    </div>
                    <p class="text-muted"> <small>Um plano de treino inactivo não é visivel para os outros utilziadores</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <input type="submit" name="submitEditarPlano" class="btn btn-primary" value="Confirmar">
                </div>
                </form>
            </div>
        </div>
    </div>





    <script>
        //atribuid value de id ao campo a editar
        $(".btnPlano").click(function (event) {
            var id = event.target.id;
            console.log(id);

            // document.getElementById("idPedido").value = id;
            $(".idPlano").val(id);

        });

    </script>