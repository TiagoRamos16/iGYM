<div id="page-wrapper ">
    <div class="container-fluid ">
        <!-- Page Heading -->
        <div class="row " id="main-admin">

            <h1 class="title text-center"> Visualizar Aula </h1>


            <div class="col-md-6">
                <p><a class="btn-back-geral btn btn-primary" href="<?= base_url('personalTrainer/historicoAulas')?>">
              
                        <i class="fas fa-arrow-left"></i> Back</a> </p>
                <div class="perfil-dados-pessoais">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Informação de Aula</h3>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4"><b>Nome:</b></div>
                        <div class="col-md-8">
                            <?= $aula['nome']?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><b>Duração:</b></div>
                        <div class="col-md-8">
                            <?= $aula['duracao']?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><b>Lotação:</b></div>
                        <div class="col-md-8">
                            <?= $aula['lotacao']?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><b>Data:</b></div>
                        <div class="col-md-8">
                            <?= $aula['data']?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><b>Hora de inicio:</b></div>
                        <div class="col-md-8">
                            <?= $aula['hora_inicio']?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><b>Hora de fim:</b></div>
                        <div class="col-md-8">
                            <?= $aula['hora_fim']?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><b>tipo:</b></div>
                        <div class="col-md-8">
                            <?= $aula['tipo']?>
                        </div>
                    </div>
                
                </div>
            </div>


            <div class="col-md-6">
                <div class="perfil-dados-pessoais">
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
                                    <td>
                                        <?= $count?>
                                    </td>
                                    <td>
                                        <?= $participante['clienteNome']?>
                                    </td>
                                    <td>
                                        <?= $participante['telefone']?>
                                    </td>
                                    <td class="pull-right">
                                        <a href="<?=base_url('utilizador/outroPerfil/'.$participante['clienteId'])?>"><i
                                                class="fas fa-eye fa-2x"></i></a>
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









