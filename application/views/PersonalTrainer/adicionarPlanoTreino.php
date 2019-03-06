<div id="page-wrapper ">
    <div class="container-fluid ">
        <!-- Page Heading -->
        <div class="row " id="main-admin">

            <div class="row">
                <h1 class="title text-center"> Adicionar Plano de treino </h1>
            </div>



            <div class="col-md-6 col-md-offset-3">



                <?php echo form_open('personalTrainer/adicionarPlanoTreino',"class='form-add-pt'") ;?>
                <fieldset>
                    <legend>Passo 1</legend>
                    <div class="form-group">
                        <label for="nome">Nome do plano de treino:</label>
                        <input type="text" class="form-control" id="nome" placeholder="Nome do Plano" name="nome" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Privado:</label>

                        <div class="radio">
                            <label>
                                <input type="radio" name="radioPrivado" id="privado" value="privado" checked="">
                                Sim
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="radioPrivado" id="publico" value="publico">
                                Não
                            </label>
                        </div>

                    </div>
                    <div class="form-group">
                    
                        <button type="submit" name="addPlanoPasso1" value="Submit" class="btn btn-primary pull-right">Next <i class="fas fa-arrow-right"></i></button>
                        <button type="reset" class="btn btn-default pull-right btn-cancel-add-pt">Cancel</button>
                       
                    </div>

                </fieldset>
                <?= form_close();?>

            </div>








        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->