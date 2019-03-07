<div id="page-wrapper ">
        <div class="container-fluid ">
            <!-- Page Heading -->
            <div class="row " id="main-admin">


                <div class="row">
                    <h1 class="title text-center"> Todos os Planos de treino Publicos </h1>
                    <p><a class="btn-back-geral btn btn-primary" href="<?= base_url('personalTrainer/planosTreino')?>"> <i class="fas fa-arrow-left"></i> Back</a>   </p>
                </div>    
               

                  <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr class="bg-primary">
                                    <th class="col-md-1">#</th>
                                    <th class="col-md-4">Nome</th>
                                    <th class="col-md-3">Data Criação</th>    
                                    <th class="col-md-3">Estado</th>
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
                                    <?php if($planos['pt_estado']=="ativo"):?>
                                        <td> <i class="fas fa-circle text-success"></i> Activo</td>        
                                    <?php endif ?>
                          
                                    <td>
                                        <a href="<?= base_url('personalTrainer/verPlanoTreinoOutro/').$planos['id']?>"> <i class="fas fa-arrow-circle-right fa-2x"></i></a>
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







   

