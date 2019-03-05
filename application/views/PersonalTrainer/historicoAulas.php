<div id="page-wrapper ">
        <div class="container-fluid ">
            <!-- Page Heading -->
            <div class="row " id="main-admin">


                <div class="row">
                    <h1 class="title text-center"> Visualizar Histórico de Aulas </h1>
                    <p><a class="btn-back-geral btn btn-primary" href="<?= base_url('personalTrainer/aulas')?>"> <i class="fas fa-arrow-left"></i> Back</a>   </p>
                </div>    
            

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr class="bg-primary">
                                    <th>Data</th>
                                    <th>Hora inicio</th>
                                    <th>Hora fim</th>    
                                    <th>Nome</th>
                                    <th>Duração</th>
                                    <th>Lotação</th>
                                    <th>Sala</th>
                                    <th>Tipo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id='lista'>
                            <?php foreach($aulas as $aula): ?>
                                <tr>
                                    <td><?= $aula['data']?></td>
                                    <?php 
                                        $horaInicio = explode(" ", $aula['hora_inicio']); 
                                        $horaFim = explode(" ", $aula['hora_fim']);
                                    ?>
                                    <td><?= $horaInicio[1]?></td>
                                    <td><?= $horaFim[1]?></td>
                                    <td><?= $aula['nomeAula']?></td>
                                    <td><?= $aula['duracao']?></td>
                                    <td><?= $aula['lotacao']?></td>
                                    <td><?= $aula['nomeSala']?></td>
                                    <td><?= $aula['tipo']?></td>
                                    <td class="pull-right">
                                        <a href="<?=base_url('PersonalTrainer/visualizarAulaHistorico/'.$aula['id'])?>"> <i class="fas fa-eye fa-2x"></i> </a>
                                      
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
   

