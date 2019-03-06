<div id="page-wrapper ">
        <div class="container-fluid ">
            <!-- Page Heading -->
            <div class="row " id="main-admin">

                <!-- Mensagens de sucesso ou de erro -->
                <?php if($this->session->flashdata('sucessoAssocia')!=null):?>
                    <div class="alert alert-success text-center msn-contacto" id="message">
                        <i class="fas fa-check-circle  text-success"></i>
                        <strong>Sucesso!</strong> 
                        <?= $this->session->flashdata('sucessoAssocia')?>
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

                <?php if($this->session->flashdata('erroAssocia')!=null):?>
                    <div class="alert alert-danger text-center msn-contacto" id="message">
                        <i class="fas fa-check-circle  text-danger"></i>
                        <strong>Erro!</strong> 
                        <?= $this->session->flashdata('erroAssocia')?>
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

                <div class="row verClientes-menu">
                    <div class="col-md-4">
                        <button class="btn btn-info btn-lg btn-criar-mensagem pull-right" data-toggle="modal" data-target="#modalAdicionarCliente"> 
                            <i class="fas fa-plus"></i> Adicionar Cliente</button>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_open('personalTrainer/verClientes'); ?>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Pesquisa" name="pesquisa">
                                <div class="input-group-btn">
                                    <button class="btn btn-info" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>    
                        </form>   
                    </div>
                    <div class="col-md-4">
                        <?php if ($this->uri->segment(3)==1):?>
                            <a class="btn btn-info active"  href="<?=base_url('personalTrainer/verClientes/1')?>" >Activos</a>
                        <?php else:?>
                            <a class="btn btn-info" href="<?=base_url('personalTrainer/verClientes/1')?>" >Activos</a>
                        <?php endif?> 
                        <?php if ($this->uri->segment(3)==2):?>
                            <a class="btn btn-info active" href="<?=base_url('personalTrainer/verClientes/2')?>" type="submit">Inactivos</a> 
                        <?php else:?>
                            <a class="btn btn-info" href="<?=base_url('personalTrainer/verClientes/2')?>" type="submit">Inactivos</a> 
                        <?php endif?>
                        <?php if ($this->uri->segment(3)==3):?>
                            <a class="btn btn-info active" href="<?=base_url('personalTrainer/verClientes/3')?>" type="submit">Pendentes</a> 
                        <?php else:?>
                            <a class="btn btn-info" href="<?=base_url('personalTrainer/verClientes/3')?>" type="submit">Pendentes</a> 
                        <?php endif?>
                        <a class="btn btn-info" href="<?=base_url('personalTrainer/verClientes')?>">Ver Todos</a>
                    </div>
                </div>

                <h1 class="title text-center"> Lista de clientes </h1>
                <p><a class="btn-back-geral btn btn-primary" href="<?= base_url('personalTrainer/clientes')?>">
                    <i class="fas fa-arrow-left"></i> Back</a> </p>

                <div class="row listaClientes">
                    <div class="col-lg-4 col-lg-offset-4">
                        <table class="table table-striped table-hover ">
                            <tbody id='lista'>
                            <?php foreach($utilizadores as $utilizador): ?>
                                <tr>
                                    <td><img class="img-circle" width="50px" height="50px" src="<?= base_url('uploads/').$utilizador['foto']?>" alt=""></td>
                                    <td><?= $utilizador['nome']?></td>
                                    <td>
                                        <!-- <?php 
                                            if($utilizador['estado']==1){
                                                echo "<i class='fas fa-circle text-success'></i> Activo";
                                            }else{
                                                echo "<i class='fas fa-circle text-danger'></i> Inactivo";
                                            }
                                        ?> -->
                                        <?php if($utilizador['fc_estado']=="activo"){
                                            echo "<i class='fas fa-circle text-success'></i> Activo";
                                        }else if($utilizador['fc_estado']=="rejeitado"){
                                            echo "<i class='fas fa-circle text-danger'></i> Rejeitado";
                                        }else if($utilizador['fc_estado']=="pendente"){
                                            echo "<i class='fas fa-circle text-warning'></i> Pendente";
                                        }
                                        
                                        ?>
                                    </td>
                                    <td class="pull-right">
                                        <a href="<?=base_url('utilizador/outroPerfil/'.$utilizador['id'])?>"> <i class="fas fa-eye fa-2x"></i> </a>
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



<div class="modal" id="modalAdicionarCliente">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close closeModal" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center ">Adicionar Cliente</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('personalTrainer/AdicionarCliente'); ?>
            <div class="form-group">
                <label for="email" class="control-label">Indique o Email do Cliente a ser associado:</label>
                <input type="hidden" id="url" value="<?=base_url()?>">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">  
                <p id="erroEmail"></p>   
            </div>                                    
            </div>
            <div class="modal-footer">
            <p class="text-muted">Será enviada um pedido ao cliente</p>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" disabled id="submitAdicionaCliente" href="<?= base_url('PersonalTrainer/AdicionarCliente/')?>"  
                class="btn btn-primary">Adicionar Cliente</button>
            </div>
        </form>
    </div>
  </div>
</div>

<div class="modal" id="modalRemoveParticipante">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close closeModal" data-dismiss="modal" aria-hidden="true" >&times;</button>
        <h4 class="modal-title text-center">Remover Participante?</h4>
      </div>
      <div class="modal-body">
        <p class="alert alert-danger text-center">Tem certeza que pretende remover utilizador da sua aula?</p>
       
      </div>
      <div class="modal-footer">
      <p class="text-muted">Será enviada uma mensagem ao participante </p>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <?php echo form_open('PersonalTrainer/eliminarParticipanteAula/'); ?>
            <input type="hidden" name="idAula" value="<?=$id?>">
            <input type="hidden" name="idUtilizador" value="" id="idUtilizador">
            <input type="submit" value="Desmarcar" class="btn btn-primary" name="submitEliminaParticipante">    
        </form>
        
      </div>
    </div>
  </div>
</div>

<script>
   //atribuid value de id ao campo a editar
   $(".btnIdCliente").click(function(event){
    var id = event.target.id;
    console.log(id);

    document.getElementById("idUtilizador").value = id;

});


//verifica se email ja existe ajax

$('#email').blur(function(){
    var email = $('#email').val();
    var url = $('#url').val();
 
    $.post(url+"utilizador/verificaEmailAjax", 
    {
        "email": email,
    }, 
    
    function(result){
        if(result==0){
            $("#erroEmail").html('<i class="fas fa-exclamation-circle"></i> Email Inexistentente');
            $("#submitAdicionaCliente").prop('disabled', true);
        }else{
            $("#erroEmail").html("");
            $("#submitAdicionaCliente").prop('disabled', false);
        }
        
    }); 

});



   

</script>

