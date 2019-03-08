<div id="page-wrapper ">
    <div class="container">
        <!-- Page Heading -->
        <div class="row " id="main-admin">

            <!-- Mensagens de sucesso ou de erro -->
            <?php if($this->session->flashdata('sucessoEnviarMensagem')!=null):?>
                    <div class="alert alert-success text-center msn-contacto" id="message">
                        <i class="fas fa-check-circle  text-success"></i>
                        <strong>Sucesso!</strong> 
                        <?= $this->session->flashdata('sucessoEnviarMensagem')?>
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
                <!-- Mensagens de sucesso ou de erro -->
                <?php if($this->session->flashdata('erroEnviarMensagem')!=null):?>
                    <div class="alert alert-danger text-center msn-contacto" id="message">
                        <i class="fas fa-check-circle  text-danger"></i>
                        <strong>Erro!</strong> 
                        <?= $this->session->flashdata('erroEnviarMensagem')?>
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

            <h1 class="title-mensagens text-center ">Mensagens</h1>     
        
            <div class="row">
                <button class="btn btn-info btn-lg btn-criar-mensagem" data-toggle="modal" data-target="#modalCriarMsn"> <i class="fas fa-plus"></i> Criar Mensagem</button>

            </div>

            <div class="row btns-mensagens">
                <div class="btn-group btn-group-justified">
                    <div class="btn-group ">
                        <?php if($this->uri->segment(3)==false):?> 
                            <a href="<?=base_url("utilizador/mensagens")?>" class="btn btn-primary active">Todas</a>
                        <?php else:?>   
                            <a href="<?=base_url("utilizador/mensagens")?>" class="btn btn-primary ">Todas</a>
                        <?php endif?>     
                    </div>
                    <div class="btn-group">
                        <?php if($this->uri->segment(3)==1):?> 
                            <a href="<?=base_url("utilizador/mensagens/1")?>" class="btn btn-primary active">Lidas</a>
                        <?php else:?>  
                            <a href="<?=base_url("utilizador/mensagens/1")?>" class="btn btn-primary">Lidas</a>
                        <?php endif?>     
                    </div>
                    <div class="btn-group">
                        <?php if($this->uri->segment(3)==2):?> 
                            <a href="<?=base_url("utilizador/mensagens/2")?>" class="btn btn-primary active">Não Lidas</a>
                        <?php else:?>   
                            <a href="<?=base_url("utilizador/mensagens/2")?>" class="btn btn-primary">Não Lidas</a>
                        <?php endif?>
                    </div>
                </div>
            </div>

            <div class="row pesquisa-mensagens">
                <form class="navbar-form navbar-left form-pesquisa-mensagens" role="search">
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control" placeholder="Pesquisar">
                    </div>
                    <div class="form-group col-md-2">
                        <input type="date" class="form-control" >
                    </div>
                    <div class="form-group col-md-2">
                        <input type="submit" class="btn btn-default" value="Pesquisar">
                    </div>
                </form>
            </div>

            <div class="row">
                <table class="table   ">
                    <thead>
                        <tr class="bg-primary">
                            <th>#</th>
                            <th>De</th>
                            <th>Titulo</th>
                            <th>Data</th>
                            <th>Estado</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count=0;?>
                        <?php foreach($mensagens as $mensagem): ?>
                        <?php $count++?>
                    
                            <?php if($mensagem['estado']==1):?>
                                <tr class="active">
                            <?php else:?>
                                <tr>
                            <?php endif?>
                                    <td><?=$count?></td>
                                    <td><?=$mensagem['email']?></td>
                                    <td><?=$mensagem['assunto']?></td>
                                    <?php 
                                    $explodeMsn = explode(" ",$mensagem['data_envio']);
                                    
                                    ?>
                                    <td><?=$explodeMsn[0]?></td>
                                    <?php if($mensagem['estado']==1):?>
                                        <td>Lido</td>
                                    <?php else:?>  
                                        <td>Não Lida</td>
                                    <?php endif?>

                                    <td>
                                        <button class="btn-transparent"><i class="fas fa-arrow-circle-right fa-2x"></i></button>
                                    </td>
                                </tr>
                        
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->


<div class="modal" id="modalCriarMsn">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Enviar Mensagem</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('utilizador/mensagens','class="form form-msn"'); ?>
            <div class="form-group">
                <input type="email" class="form-control" id="para" name="para" placeholder="Email Para">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Titulo">
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="4" id="textArea" placeholder="Mensagem" name="mensagem"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" value="Submit" name="submitMensagem" class="btn btn-primary">Enviar</button>
      </div>
    </form>
    </div>
  </div>
</div>