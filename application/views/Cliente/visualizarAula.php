<div id="page-wrapper ">
        <div class="container-fluid ">
            <!-- Page Heading -->
            <div class="row " id="main-admin">

                <h1 class="title text-center"> Visualizar Aula </h1>

                <!-- mensagens de sucesso em caso de inscricao ou desmarcar -->
                <?php if($this->session->flashdata('sucessoNovaInscricao')!=null):?>
                    <div class="alert alert-success text-center msn-contacto" id="message">
                        <i class="fas fa-check-circle  text-success"></i>
                        <strong>Sucesso!</strong> 
                        <?= $this->session->flashdata('sucessoNovaInscricao')?>
                        <button type="button" class="close" aria-label="Close" id="close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif?>

                <?php if($this->session->flashdata('sucessoDesmarcarAula')!=null):?>
                    <div class="alert alert-success text-center msn-contacto" id="message">
                        <i class="fas fa-check-circle  text-success"></i>
                        <strong>Sucesso!</strong> 
                        <?= $this->session->flashdata('sucessoDesmarcarAula')?>
                        <button type="button" class="close" aria-label="Close" id="close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif?>
               
               <div class="col-md-12">
               <a class="back-arrow" href="javascript:history.back()"><i class="fas fa-arrow-left"></i>Back</a>
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
                            <div class="col-md-8">
                            
                            <?php 
                            //  verifica se a aula ja esta esgotada
                                if ( count($numeroInscricoes) >= $aula['lotacao'] ){ ?>

                                    <button class="btn btn-danger" disabled>Esgotado</button>

                                    <!-- mesmo que a aula esteja esgotada pode remover inscricao -->
                                    <?php if ( $inscricao == 1 && $aula['hora_inicio'] > date("Y-m-d H:i:s") ){ ?>

                                        <button class="btn btn-danger" data-toggle="modal" data-target="#modalDesmarcarAula" href="">Desmarcar Aula</button>

                                    <?php }
                                }else{ ?>

            <!-- verifica se ja esta inscrito ou nao para decidir a opçao que mostra e se a data da aula é posterior à data actual, 0 nao inscrito, 1 inscrito -->
                            <?php if( $inscricao == 0 && $aula['hora_inicio'] > date("Y-m-d H:i:s") ){ ?>

                                <button class="btn btn-success" data-toggle="modal" data-target="#modalMarcarAula" href="">Inscrever na Aula</button>

                            <?php }elseif ( $inscricao == 1 && $aula['hora_inicio'] > date("Y-m-d H:i:s") ){ ?>

                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalDesmarcarAula" href="">Desmarcar Aula</button>
                            
                            <?php }} ?>

                            </div>
            
                        </div>
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



<div class="modal" id="modalMarcarAula">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">Marcar Aula?</h4>
      </div>
      <div class="modal-body">
        <p class="alert alert-success text-center">Tem certeza que pretende inscrever-se na aula?</p>
       
      </div>
      <div class="modal-footer">
            
            <div class="row">
                <div class="col-md-2 col-md-offset-7">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>

                <?php echo form_open('cliente/visualizarAula/'.$idAula); ?>
                <div class="col-md-2">
                    <input type="hidden" class="form-control" name="id_aulaInscrever" value="<?php echo $idAula ?>"/>
                    <input type="submit" class="btn btn-primary" value="Marcar" name="marcarAula">
                </div>
                <?php echo form_close(); ?>
            </div>

      </div>
    </div>
  </div>
</div>

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
            <div class="row">
                <div class="col-md-2 col-md-offset-7">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>

                <?php echo form_open('cliente/visualizarAula/'.$idAula); ?>
                <div class="col-md-2">
                    <input type="hidden" class="form-control" name="id_aulaDesmarcar" value="<?php echo $idAula ?>"/>
                    <input type="submit" class="btn btn-primary" value="Desmarcar" name="desmarcarAula">
                </div>
                <?php echo form_close(); ?>
            </div>
        <!-- <a href="<?= base_url('cliente/marcarAula')?>"  class="btn btn-primary">Inscrever</a> -->
      </div>
    </div>
  </div>
</div>
