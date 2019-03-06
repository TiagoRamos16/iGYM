<div id="page-wrapper ">
        <div class="container-fluid ">
            <!-- Page Heading -->
            <div class="row " id="main-admin">


                 <!-- Mensagens de sucesso ou de erro -->
                 <?php if($this->session->flashdata('sucessoApagarExercicio')!=null):?>
                    <div class="alert alert-success text-center msn-contacto" id="message">
                        <i class="fas fa-check-circle  text-success"></i>
                        <strong>Sucesso!</strong> 
                        <?= $this->session->flashdata('sucessoApagarExercicio')?>
                        <button type="button" class="close" aria-label="Close" id="close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <script>
                        document.getElementById("close").addEventListener("click", function(){
                            document.getElementById("message").style.display = "none";
                        });
                    </script>
                <?php endif?>

                 <?php if($this->session->flashdata('sucessoEditarExercicio')!=null):?>
                    <div class="alert alert-success text-center msn-contacto" id="message">
                        <i class="fas fa-check-circle  text-success"></i>
                        <strong>Sucesso!</strong> 
                        <?= $this->session->flashdata('sucessoEditarExercicio')?>
                        <button type="button" class="close" aria-label="Close" id="close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <script>
                        document.getElementById("close").addEventListener("click", function(){
                            document.getElementById("message").style.display = "none";
                        });
                    </script>
                <?php endif?>
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
                        document.getElementById("close").addEventListener("click", function(){
                            document.getElementById("message").style.display = "none";
                        });
                    </script>
                <?php endif?>


                <div class="row">
                    <h1 class="title text-center"> Os meus Exercicios </h1>
                    <p><a class="btn-back-geral btn btn-primary" href="<?= base_url('personalTrainer/exercicios')?>"> <i class="fas fa-arrow-left"></i> Back</a>   </p>
                </div>    
              

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr class="bg-primary">
                                    <th class="col-md-1">#</th>
                                    <th class="col-md-2">Nome</th>
                                    <th class="col-md-4">Descrição</th>    
                                    <th class="col-md-1">Dificuldade</th>
                                    <th class="col-md-1">Tipo</th>
                                    <th class="col-md-1">Editar</th>
                                    <th class="col-md-1">Remover</th>
                                    <th class="col-md-1">Ver</th>
                                </tr>
                            </thead>
                            <tbody id='lista'>
                            <?php 
                            $count = 0;
                            foreach($exercicios as $exercicio): 
                                $count++;
                            ?>
                                <tr>
                                    <td><?= $count?></td>
                                    <td><?= $exercicio['nome']?></td>
                                    
                                    <td><?= word_limiter($exercicio['descricao'],20)?></td>
                                    <td><?= $exercicio['dificuldade']?></td>
                                    <td><?= $exercicio['tipo_exercicio']?></td>
                                    <td>
                                        <a href="#editarExercicio<?php echo $exercicio['id'];?>" data-title="Edit" data-toggle="modal"> 
                                        <i class="fas fa-edit fa-2x text-warning"></i></a>

                                    </td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalRemoverPLano" href="">  
                                            <i class="fas fa-times-circle text-danger fa-2x btnPlano" id="<?=$exercicio['id']?>"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#edit<?php echo $exercicio['id'];?>" data-title="Edit" data-toggle="modal"> 
                                        <i class="fas fa-arrow-circle-right fa-2x"></i></a>

                                    </td>
                          
                                </tr>


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

                                <!--Modal Editar Exercicio-->

                                
                                    <div class="modal" id="editarExercicio<?=$exercicio['id']?>"> 
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close closeModal" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title text-center ">Editar Exercicio</h4>
                                                </div>
                                                <div class="modal-body">

                                                <?=form_open("personalTrainer/meusExercicios")?>
                                                    <div class="form-group">
                                                        <label for="nome" class="control-label">Nome:</label>
                                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Novo nome" 
                                                            value="<?=$exercicio['nome']?>">       
                                                    </div>  
                                                    <div class="form-group">
                                                        <label for="descricao" class="control-label">Descrição:</label>
                                                        <textarea class="form-control" rows="3" id="textArea" name="descricao" 
                                                        placeholder="Nova descrição" ><?=$exercicio['descricao']?></textarea>      
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dificuldade" class="control-label">Dificulcade:</label>
                                            
                                                            <select class="form-control" id="dificuldade" name="dificuldade">
                                                                <?= $exercicio['dificuldade']=="Iniciante" ? 
                                                                    '<option selected value="Iniciante">Iniciante</option>' : 
                                                                    '<option value="Iniciante">Iniciante</option>' ?>
                                                                <?= $exercicio['dificuldade']=="Mediano" ? 
                                                                    '<option selected value="Mediano">Mediano</option>' : 
                                                                    '<option value="Mediano">Mediano</option>' ?>
                                                                <?= $exercicio['dificuldade']=="Experiente" ? 
                                                                    '<option selected value="Experiente">Experiente</option>' : 
                                                                    '<option value="Experiente">Experiente</option>' ?>
                                                            </select>
                                      
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="duracao" class="control-label">Duração</label>
                                                        <input type="number" class="form-control" id="duracao" name="duracao" placeholder="Nova duracao" 
                                                            value="<?=$exercicio['duracao']?>">       
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tipoExercicio" class="control-label">Tipo de Exercicio:</label>
                                            
                                                            <select class="form-control" id="tipoExercicio" name="tipoExercicio">
                                                                <?= $exercicio['tipo_exercicio']=="cardio" ? 
                                                                    '<option selected value="cardio">cardio</option>' : 
                                                                    '<option value="cardio">Iniciante</option>' ?>
                                                                <?= $exercicio['tipo_exercicio']=="peito" ? 
                                                                    '<option selected value="peito">peito</option>' : 
                                                                    '<option value="peito">peito</option>' ?>
                                                                <?= $exercicio['tipo_exercicio']=="braço" ? 
                                                                    '<option selected value="braço">braço</option>' : 
                                                                    '<option value="braço">braço</option>' ?>
                                                                    <?= $exercicio['tipo_exercicio']=="perna" ? 
                                                                    '<option selected value="perna">perna</option>' : 
                                                                    '<option value="perna">perna</option>' ?>
                                                            </select>
                                      
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="tipoDuracao" class="control-label">Tipo de Exercicio:</label>
                                            
                                                            <select class="form-control" id="tipoDuracao" name="tipoDuracao">
                                                                <?= $exercicio['tipo_duracao']=="repetições" ? 
                                                                    '<option selected value="repetições">repetições</option>' : 
                                                                    '<option value="repetições">repetições</option>' ?>
                                                                <?= $exercicio['tipo_duracao']=="minutos" ? 
                                                                    '<option selected value="minutos">minutos</option>' : 
                                                                    '<option value="minutos">minutos</option>' ?>
                                                                <?= $exercicio['tipo_duracao']=="segundos" ? 
                                                                    '<option selected value="segundos">segundos</option>' : 
                                                                    '<option value="segundos">segundos</option>' ?>
                                                            </select>
                                      
                                                    </div> 
                                                                                     
                                                </div>

                                                <input type="hidden" name="id" value="<?=$exercicio['id']?>">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    <input type="submit" name="submitEditaExercicio"  class="btn btn-primary" value="Confirmar">
                                                </div>
                                                <?=form_close()?>  
                                            </div>
                                        </div>
                                    </div>



                            <?php endforeach;?>  
                            </tbody>
                        </table>     
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
        <h4 class="modal-title text-center ">Remover Exercicio</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('personalTrainer/meusExercicios'); ?>
            <div class="form-group">
                <p for="email" class="alert alert-danger">Tem certeza que pretende remover o exercicio?</p>
                <input type="hidden" id="url" value="<?=base_url()?>">
                <input type="hidden" class="form-control idExercicio" id="idExercicio" name="idExercicio" value="">    
            </div>                                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" name="submitRemoveExercicio"  class="btn btn-primary" value="Confirmar">
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
            $(".idExercicio").val(id);

        });

    </script>