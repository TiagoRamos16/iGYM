<div id="page-wrapper ">
    <div class="container-fluid ">
        <!-- Page Heading -->
        <div class="row " id="main-admin">
            <h1 class="title-exercicios text-center">Exercícios</h1>


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


<script>
    $(document).ready(function() {

        $(".myModal").on("hidden.bs.modal", function () {
            $('#outroPlano_treino').hide();
        });

        $('#plano_treino').change(function () {
            if ($('#plano_treino').val() == 'Outro') {
                $('#outroPlano_treino').show();
            }
            else {
                $('#outroPlano_treino').hide();
            }
        });

    });
</script>
