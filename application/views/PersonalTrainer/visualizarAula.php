<div id="page-wrapper ">
        <div class="container-fluid ">
            <!-- Page Heading -->
            <div class="row " id="main-admin">

                <h1 class="title text-center"> Visualizar Aula </h1>
            
               
               <div class="col-md-6">
               <a class="back-arrow" href="<?= base_url('PersonalTrainer/visualizarAulas')?>"><i class="fas fa-arrow-left"></i>Back</a>
                    <div class="perfil-dados-pessoais">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Informação de Aula</h3>
                            </div>
                        
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4"><b>Nome:</b></div>
                            <div class="col-md-8"><?= $aula['nome']?></div>
                        </div>
                    <hr>
                    <div class="row">
                            <div class="col-md-4"><b>Duração:</b></div>
                            <div class="col-md-8"><?= $aula['duracao']?></div>
                        </div>
                    <hr>
                    <div class="row">
                            <div class="col-md-4"><b>Lotação:</b></div>
                            <div class="col-md-8"><?= $aula['lotacao']?></div>
                        </div>
                    <hr>
                    <div class="row">
                            <div class="col-md-4"><b>Data:</b></div>
                            <div class="col-md-8"><?= $aula['data']?></div>
                        </div>
                    <hr>
                    <div class="row">
                            <div class="col-md-4"><b>Hora de inicio:</b></div>
                            <div class="col-md-8"><?= $aula['hora_inicio']?></div>
                    </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4"><b>Hora de fim:</b></div>
                            <div class="col-md-8"><?= $aula['hora_fim']?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4"><b>tipo:</b></div>
                            <div class="col-md-8"><?= $aula['tipo']?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalDesmarcarAula" href="">Desmarcar Aula</button>
                            </div>
            
                        </div>
                    </div>    
                    </div>


               <div class="col-md-6">
                    <div class="perfil-dados-pessoais">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <button href="" class="btn btn-info btn-criar-mensagem">Pedidos Pendentes</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Participantes</h3>
                            </div>
                        </div>
                        
                        <div class="row">
                            <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Nome</th>
                                        <th>Telefone </th>    
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id='lista'>
                                <?php $count =0;?>
                                <?php foreach($participantesAula as $participante): ?>
                                <?php $count++?>
                                    <tr>
                                        <td><?= $count?></td>
                                        <td><?= $participante['clienteNome']?></td>
                                        <td><?= $participante['telefone']?></td>
                                        <td class="pull-right">
                                            <a href="<?=base_url('utilizador/outroPerfil/'.$participante['clienteId'])?>"><i class="fas fa-eye fa-2x"></i></a>
                                            <a class="btnremoveCliente" data-toggle="modal" data-target="#modalRemoveParticipante" id="<?=$participante['clienteId']?>">
                                                <i class="fas fa-times-circle text-danger fa-2x btnIdCliente" id="<?=$participante['clienteId']?>"></i></a>    
                                               
                                        </td>
                                    </tr>
                                <?php endforeach;?> 
                                </tbody>
                            </table>    
                        
                        </div>
               </div>
                </div>
                

                 
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->



<div class="modal" id="modalDesmarcarAula">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Desmarcar Aula?</h4>
      </div>
      <div class="modal-body">
        <p class="alert alert-danger text-center">Tem certeza que pretende desmarcar a aula?</p>
       
      </div>
      <div class="modal-footer">
      <p class="text-muted">Será enviada uma mensagem a cada participante a avisa que a aula foi cancelada</p>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a href="<?= base_url('PersonalTrainer/eliminarAula/'.$id)?>"  class="btn btn-primary">Desmarcar</a>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modalRemoveParticipante">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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

   

</script>

