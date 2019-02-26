<div id="page-wrapper ">
    <div class="container-fluid ">
        <!-- Page Heading -->
        <div class="row " id="main-admin">
            <h1 class="title-exercicios text-center">Plano de Exercícios</h1>


            <?php 
                foreach($exericiosExistentesPlano as $row){ 
                // var_dump($exericiosExistentesPlano);
            ?>
            
                <div class="col-md-3">
                    <div class="exercicios-item text-center">
                        <div class="info">
                            <a class="fas fa-times-circle" href="#delete<?php echo $row['id'];?>" data-title="Delete" data-toggle="modal"></a>
                            <img class="img-exercicio" src="<?php echo base_url("assets/img/exercicios/".$row['foto']) ?>" alt="">
                            <div class="exercicios-title">
                                <?php echo $row['nome'] ?>
                            </div>
                        </div>

                        <div class="bottom">
                            <a class="exercicios-link" href="#edit<?php echo $row['id'];?>" data-title="Edit" data-toggle="modal">
                                <button class="btn btn-primary exercicios-btn">Ver +</button></a>
                        </div>
                    </div>
                </div>
            

            <!------------------------------- Modal para apgar exercício do plano -------------------------------->
            <div class="modal fade myModal" id="delete<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <?php echo form_open('cliente/apagar_exercicio_plano_treino/'.$row['id']); ?>
                        <div class="modal-header" id="titulo-exercicios">
                            <button type="button" id="fechar-modal" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"> <?php echo $row['nome'] ?> </h4>
                        </div>
                        <div class="modal-body">
                        
                        <p>Está prestes a apagar o <?php echo $row['nome'] ?> do seu plano de treino.</p>
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

            <!------------------------------- Modal com informação do exercício -------------------------------->
            <div class="modal fade myModal" id="edit<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

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

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>
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
