<div id="page-wrapper ">
        <div class="container-fluid ">
            <!-- Page Heading -->
            <div class="row " id="main-admin">

                <!-- Mensagens de sucesso ou de erro -->
                <?php if($this->session->flashdata('sucessoAceitar')!=null):?>
                    <div class="alert alert-success text-center msn-contacto" id="message">
                        <i class="fas fa-check-circle  text-success"></i>
                        <strong>Sucesso!</strong> 
                        <?= $this->session->flashdata('sucessoAceitar')?>
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

                 <?php if($this->session->flashdata('sucessoRejeitar')!=null):?>
                    <div class="alert alert-success text-center msn-contacto" id="message">
                        <i class="fas fa-check-circle  text-success"></i>
                        <strong>Sucesso!</strong> 
                        <?= $this->session->flashdata('sucessoRejeitar')?>
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

                <h1 class="title text-center"> Lista de Pedidos de Cliente </h1>
                <p><a class="btn-back-geral btn btn-primary" href="<?= base_url('personalTrainer/clientes')?>">
                    <i class="fas fa-arrow-left"></i> Back</a> </p>

                        <div class="row btns-mensagens">
                            <div class="btn-group  col-md-8 col-md-offset-2">
                                <div class="btn-group col-md-4 col-sm-12 col-xs-12">
                                    <?php if ($this->uri->segment(3)==false):?>
                                        <a href="<?=base_url('personalTrainer/verPedidos')?>" 
                                        type="button" class="btn btn-primary btn-verPedidos active">Todos os Pedidos</a>
                                    <?php else:?>
                                        <a href="<?=base_url('personalTrainer/verPedidos')?>" 
                                        type="button" class="btn btn-primary btn-verPedidos ">Todos os Pedidos</a>
                                    <?php endif?>    
                                </div>
                                <?php if ($this->uri->segment(3)==1):?>  
                                    <div class="btn-group col-md-4 col-sm-12 col-xs-12">
                                        <a href="<?=base_url('personalTrainer/verPedidos/1')?>" 
                                        type="button" class="btn btn-primary btn-verPedidos active">Pedidos Aceites</a>
                                    </div>
                                <?php else:?>   
                                    <div class="btn-group col-md-4 col-sm-12 col-xs-12">
                                        <a href="<?=base_url('personalTrainer/verPedidos/1')?>" 
                                        type="button" class="btn btn-primary btn-verPedidos">Pedidos Aceites</a>
                                    </div>
                                <?php endif?>    
                                <?php if ($this->uri->segment(3)==2):?>
                                    <div class="btn-group col-md-4 col-sm-12 col-xs-12">
                                        <a href="<?=base_url('personalTrainer/verPedidos/2')?>" 
                                        type="button" class="btn btn-primary btn-verPedidos active">Pedidos Rejeitados</a>
                                    </div>
                                <?php else:?>
                                    <div class="btn-group col-md-4 col-sm-12 col-xs-12">
                                        <a href="<?=base_url('personalTrainer/verPedidos/2')?>" 
                                        type="button" class="btn btn-primary btn-verPedidos">Pedidos Rejeitados</a>
                                    </div>
                                <?php endif?>
                            </div>
                        </div>      


                <div class="row listaClientes">
                    <div class="col-lg-6 col-lg-offset-3">

                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr class="bg-primary">
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Data Pedido</th>
                                    <th>Perfil</th>
                                    <?php if(($this->uri->segment(3)==false)):?>
                                        <th>Aceitar</th>
                                        <th>Rejeitar</th>
                                    <?php endif?>   
                                </tr>
                            </thead>
                            <tbody id='lista'>
                            <?php  
                                $count =0;
                                foreach($listaPedidos as $pedido): 
                                    $count++;
                            ?>
                                
                                <tr>
                                    <td><?= $count?></td>
                                    <td><?= $pedido['nome']?></td>
                                    <td>
                                    <?= $pedido['fc_data']?>
                                    </td>
                                    <td class="">
                                        <a href="<?=base_url('utilizador/outroPerfil/'.$pedido['admin_id'])?>"> <i class="fas fa-user fa-2x text-primary"></i> </a>
                                    </td>
                                    <?php if(($this->uri->segment(3)==false)):?>
                                    
                                        <td>
                                            <a data-toggle="modal" data-target="#modalAceitarCliente" href=""> 
                                                <i class="fas fa-check-circle text-sucess fa-2x btnIdCliente" id="<?=$pedido['id']?>"></i> 
                                            </a>
                                        </td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modalRejeitarCliente" href="">  
                                                <i class="fas fa-times-circle text-danger fa-2x btnIdCliente" id="<?=$pedido['id']?>"></i> 
                                            </a>
                                        </td>
                                    <?php endif?> 
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



<div class="modal" id="modalAceitarCliente"> 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close closeModal" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center ">Aceitar Cliente</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('personalTrainer/verPedidos'); ?>
            <div class="form-group">
                <p for="email" class="alert alert-success">Tem certeza que quer aceitar o utilizador?</p>
                <input type="hidden" id="url" value="<?=base_url()?>">
                <input type="hidden" class="form-control idPedido" id="idPedido" name="idPedido" value="">    
            </div>                                    
            </div>
            <div class="modal-footer">
            <p class="text-muted">Será enviada uma mensagem informativa ao utilizador</p>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" name="submitAceitaCliente"  class="btn btn-primary" value="Confirmar">
            </div>
        </form>
    </div>
  </div>
</div>

<div class="modal" id="modalRejeitarCliente"> 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close closeModal" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center ">Rejeitar Cliente</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('personalTrainer/verPedidos'); ?>
            <div class="form-group">
                <p for="email" class="alert alert-danger">Tem certeza que quer rejeitar o utilizador?</p>
                <input type="hidden" id="url" value="<?=base_url()?>">
                <input type="hidden" class="form-control idPedido" id="idPedido" name="idPedido" value="">    
            </div>                                    
            </div>
            <div class="modal-footer">
            <p class="text-muted">Será enviada uma mensagem informativa ao utilizador</p>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" name="submitRejeitarCliente"  class="btn btn-primary" value="Confirmar">
            </div>
        </form>
    </div>
  </div>
</div>


<script>
   //atribuid value de id ao campo a editar
   $(".btnIdCliente").click(function(event){
    var id = event.target.id;
    console.log(id);

    // document.getElementById("idPedido").value = id;
    $(".idPedido").val(id);

});

</script>






