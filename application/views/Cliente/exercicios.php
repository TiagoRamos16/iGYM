<div id="page-wrapper ">
    <div class="container-fluid ">
        <!-- Page Heading -->
        <div class="row " id="main-admin">
            <h1 class="title-exercicios text-center">Exercícios</h1>


            <?php 
            foreach($listaExercicios as $row)
            { ?>
            
            <?php 
            // echo form_open("cliente/exercicioSelecionado/$row['id']"); 
            ?>

            <a class="exercicios-link" href="<?= base_url('cliente/exercicioSelecionado/'.$row['id'])?>">
                <div class="col-md-3">
                    <div class="exercicios-item text-center">
                        <div class="info">
                            <img class="img-exercicio" src="<?php echo base_url("assets/img/exercicios/".$row['foto']) ?>" alt="">
                            <div class="exercicios-title">
                                <?php echo $row['nome'] ?>
                            </div>
                        </div>

                        <div class="bottom">
                            <button class="btn btn-primary exercicios-btn">Ver +</button>
                        </div>
                    </div>
                </div>
            </a>
            
            <?php 
            // echo form_close();

             } 
            
            ?> <!-- foreach -->
            

            
            
                
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->