<div id="page-wrapper ">
    <div class="container-fluid ">
        <!-- Page Heading -->
        <div class="row " id="main-admin">
            <h1 class="title-exercicios text-center">Exercícios</h1>


            <?php 
            // var_dump($listaDificuldade);
            ?>

            <div class="filter-search">
                <div class="container">
                    <?php echo form_open('cliente/exercicios') ;?>

                        <div class="col-md-5">
                            <input type="text" class="search-query form-control" name="search" placeholder="indique o nome do plano pretendida">
                        </div>

                        <div class="col-md-3">
                            <select class="form-control" id="pesquisaTipoExercicio" name="pesquisaTipoExercicio" >
                                <option selected="true" disabled="disabled">Tipo de Exercício</option>
                                <?php 
                                    foreach($listaTipo_exercicio as $row)
                                    { 
                                    echo '<option value="'.$row['tipo_exercicio'].'">'.$row['tipo_exercicio'].'</option>';
                                    }
                                ?>  
                            </select>
                        </div>

                        <div class="col-md-2">
                            <select class="form-control" id="pesquisaDificuldade" name="pesquisaDificuldade" >
                                <option selected="true" disabled="disabled">Dificuldade</option>
                                <?php
                                    foreach($listaDificuldade as $row)
                                    { 
                                    echo '<option value="'.$row['dificuldade'].'">'.$row['dificuldade'].'</option>';
                                    }
                                ?>  
                            </select>
                        </div>

                        <div class="col-md-2">
                            <input type="submit" class="btn btn-primary" value="Pesquisar" name="pesquisaExercicios">
                            <!-- <input type="submit" class="btn btn-primary wrn-btn">Pesquisar</button> -->
                        </div>

                    <?php echo form_close(); ?>

                </div>
            </div>






            <?php 
            foreach($listaExercicios as $row)
            { ?>
            
            <a class="exercicios-link" href="#edit<?php echo $row['id'];?>" data-title="Edit" data-toggle="modal">
                <div class="col-md-3">
                    <div class="exercicios-item text-center">
                        <div class="info">
                            <img class="img-exercicio" src="<?php echo base_url("assets/img/exercicios/".$row['foto']) ?>" alt="">
                            <div class="exercicios-title">
                                <?php echo $row['nome'] ?>
                            </div>
                            <div class="exercicios-descricao">
                                <?php
                                    echo $row['tipo_exercicio'].'<br>'.$row['dificuldade']
                                ?>
                            </div>
                        </div>

                        <div class="bottom">
                            <button class="btn btn-primary exercicios-btn">Ver +</button>
                        </div>
                    </div>
                </div>
            </a>

            <!-- https://www.spotebi.com/fitness-tips/best-back-exercises-posture-tone-strength/ -->

            <div class="modal fade myModal" id="edit<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <?php echo form_open('cliente/exercicios','class="form form-msn"'); ?>
                        <div class="modal-header" id="titulo-exercicios">
                            <button type="button" id="fechar-modal" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"> <?php echo $row['nome'] ?> </h4>
                        </div>
                        <div class="modal-body">
                        

                            <div class="form-group">
                                <img class="img-exercicio" src="<?php echo base_url("assets/img/exercicios/".$row['foto']) ?>" alt="">
                            </div>
                            <div class="form-group">

                                <label for="descricao-exercicio">Descrição</label>
                                <p>
                                    <?php echo $row['descricao'] ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="descricao-exercicio">Tipo de Exercício:</label><?php echo ' '.$row['tipo_exercicio'] ?>
                            </div>
                            <div class="form-group">
                                <label for="descricao-exercicio">Dificuldade:</label><?php echo ' '.$row['dificuldade'] ?>
                            </div>
                            <div class="form-group">
                                <label for="descricao-exercicio">Duração:</label><?php echo ' '.$row['duracao'].' '.$row['tipo_duracao'] ?>
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="exercicio_selecionado" value="<?php echo $row['id'];?>" />
                            </div>


                            <div class="form-group">
                                <label id="modeloLabel">Adicionar a um plano de treino:</label><BR>
                                <div class = "row">
                                    <div class="form-group col-md-6">
                                        <select class="form-control" id="plano_treino" name="plano_treino">
                                            <option selected="true" disabled="disabled">Seleccione um plano de treino</option>
                                            <?php 
                                                foreach($listaPlanoTreino as $plano)
                                                { 
                                                echo '<option value="'.$plano['id'].'">'.$plano['nome'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <a class="form-control btn btn-info btn-login btn-block" href="<?= base_url('cliente/novo_plano/').$row['id']?>">Criar Novo Plano</a>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Adicionar ao plano escolhido" name="adicionar_ao_plano">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php 
             } //  <!-- foreach -->
            ?> 

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->
