<div id="page-wrapper ">
    <div class="container-fluid ">
        <!-- Page Heading -->
        <div class="row " id="main-admin">
            <!-- <h1 class="title-exercicios text-center">Aulas</h1> -->


            <?php
            // var_dump($listaPlanos);
            // var_dump($listaNomesPlanos);

            // contador para criar nova row após ter 3 elementos
            $count = 1;

            // verifica os nomes dos planos de treino
            foreach($listaNomesPlanos as $row1){ 
                if($count==0 || $count%3==0){
                    echo "<div class='row'>";
                }
            ?>

                <a class="exercicios-link" href="#">
                    <div class="col-md-6 col-lg-4">
                        <div class="exercicios-item">
                            <div class="exercicios-item-header">
                                <a class="fas fa-times-circle" href="#edit<?php echo $row1['id'];?>" data-title="Edit" data-toggle="modal"></a>
                                <i class="fas fa-file-signature fa-5x "></i>
                            </div>
                            <div class="info">
                                <div class="exercicios-title">
                                    <?php 
                                        echo $row1['nome'];
                                    ?>
                                </div>

                                <p class="exercicios-descricao"> 
                                    <?php
                                        // verifica os nomes dos planos de treino sao iguais para dar apenas os exercicios
                                        foreach($listaPlanos as $row2){
                                            if ($row1['nome'] == $row2['nome_planoTreino']){
                                                echo $row2['nomeExercicio']."<br>";
                                            }
                                        }  
                                    ?> 
                                </p>
                            </div>

                            <!-- <div class="bottom">
                                <button class="btn btn-primary exercicios-btn">Ver</button>
                            </div> -->

                            <div class="bottom">
                                <form action="<?= base_url('cliente/plano_treino/'.$row1['id'])?>">
                                    <input type="submit" class="btn btn-primary exercicios-btn" value="Ver" />
                                </form>
                            </div>
                        </div>
                    </div>
                </a>

                <div class="modal fade myModal" id="edit<?php echo $row1['id'];?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <?php echo form_open('cliente/treinos/'.$row1['id']); ?>
                            <div class="modal-header" id="titulo-exercicios">
                                <button type="button" id="fechar-modal" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"> <?php echo $row1['nome'] ?> </h4>
                            </div>
                            <div class="modal-body">
                            
                            <p>Está prestes a apagar o <?php echo $row1['nome'] ?> .</p>
                            <p>Tem a certeza que quer apagar?</p>


                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Apagar" name="apagar_plano">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php 
                if($count==0 || $count%3==0){
                    echo "</div>";
                }
                $count++;
            } 
             //  <!-- foreach -->
            ?>

            <div class="row">
            <a class="exercicios-link" href="#">
                <div class="col-md-6 col-lg-4">
                    <div class="exercicios-item ">
                        <div class="exercicios-item-header">
                            <i class="fas fa-plus-circle fa-5x "></i>
                        </div>
                        <div class="info">
                            <div class="exercicios-title">
                                Novo Plano de Treino
                            </div>
                            <p class="exercicios-descricao">Crie um novo plano de treinos para associar os exercícios pretendidos</p>
                        </div>

                        <div class="bottom">
                            <form action="<?= base_url('cliente/novo_plano')?>">
                                <input type="submit" class="btn btn-primary exercicios-btn" value="Criar" />
                            </form>
                        </div>
                    </div>
                </div>
            </a>
            </div>

                
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->