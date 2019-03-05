<div id="page-wrapper ">
        <div class="container-fluid ">
            <!-- Page Heading -->
            <div class="row " id="main-admin">


                 <!-- Mensagens de sucesso ou de erro -->
                 <?php if($this->session->flashdata('sucessoApagarPlano')!=null):?>
                    <div class="alert alert-success text-center msn-contacto" id="message">
                        <i class="fas fa-check-circle  text-success"></i>
                        <strong>Sucesso!</strong> 
                        <?= $this->session->flashdata('sucessoApagarPlano')?>
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

                 <?php if($this->session->flashdata('sucessoEditarPlano')!=null):?>
                    <div class="alert alert-success text-center msn-contacto" id="message">
                        <i class="fas fa-check-circle  text-success"></i>
                        <strong>Sucesso!</strong> 
                        <?= $this->session->flashdata('sucessoEditarPlano')?>
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
                <?php if($this->session->flashdata('sucessoInserirPlano')!=null):?>
                    <div class="alert alert-success text-center msn-contacto" id="message">
                        <i class="fas fa-check-circle  text-success"></i>
                        <strong>Sucesso!</strong> 
                        <?= $this->session->flashdata('sucessoInserirPlano')?>
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
                    <h1 class="title text-center"> Os meus planos de treino </h1>
                    <p><a class="btn-back-geral btn btn-primary" href="<?= base_url('personalTrainer/planosTreino')?>"> <i class="fas fa-arrow-left"></i> Back</a>   </p>
                </div>    
                 

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr class="bg-primary">
                                    <th class="col-md-1">#</th>
                                    <th class="col-md-4">Nome</th>
                                    <th class="col-md-2">Data Criação</th>    
                                    <th class="col-md-2">Estado</th>
                                    <th class="col-md-1">Editar</th>
                                    <th class="col-md-1">Remover</th>
                                    <th class="col-md-1">Ver</th>
                                </tr>
                            </thead>
                            <tbody id='lista'>
                            <?php 
                            $count = 0;
                            foreach($planosTreino as $planos): 
                                $count++;
                            ?>
                                <tr>
                                    <td><?= $count?></td>
                                    <td><?= $planos['nome']?></td>
                                    <td><?= $planos['pt_data']?></td>
                                    <?php if($planos['pt_estado']=="1"):?>
                                        <td> <i class="fas fa-circle text-success"></i> Activo</td>        
                                    <?php elseif($planos['pt_estado']=="2"):?>
                                        <td> <i class="fas fa-circle text-danger"></i> Inactivo</td>  
                                    <?php endif ?>
                          
                                    <td>
                                        <a data-toggle="modal" data-target="#modalEditarPlano" href="">  
                                            <i class="fas fa-edit text-warning fa-2x btnPlano" id="<?=$planos['id']?>"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalRemoverPLano" href="">  
                                            <i class="fas fa-times-circle text-danger fa-2x btnPlano" id="<?=$planos['id']?>"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('personalTrainer/verPlanoTreino/').$planos['id']?>"> <i class="fas fa-arrow-circle-right fa-2x"></i></a>
                                    </td>
                          
                                </tr>
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
            <p class="text-muted">O plano será apagado do sistema, se apenas quiser desabilita-lo deve entao editar o estado para inactivo</p>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" name="submitRemovePlano"  class="btn btn-primary" value="Confirmar">
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
                <input type="submit" name="submitEditarPlano"  class="btn btn-primary" value="Confirmar">
            </div>
        </form>
    </div>
  </div>
</div>


<script>
   //atribuid value de id ao campo a editar
   $(".btnPlano").click(function(event){
    var id = event.target.id;
    console.log(id);

    // document.getElementById("idPedido").value = id;
    $(".idPlano").val(id);

});

</script>




   

