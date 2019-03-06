<div id="page-wrapper ">
    <div class="container-fluid ">
        <!-- Page Heading -->
        <div class="row " id="main-admin">


            <h1 class="title text-center"> Adicionar Exercicio </h1>
            <p><a class="btn-back-geral btn btn-primary" href="<?= base_url('personalTrainer/exercicios')?>"> <i class="fas fa-arrow-left"></i> Back</a>   </p>


            <div class="col-md-6 col-md-offset-3 div-form-addExercicio">
                <?=form_open("personalTrainer/adicionarExercicio")?>
                <div class="form-group">
                    <label for="nome" class="control-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Indique o nome" required>
                </div>
                <div class="form-group">
                    <label for="descricao" class="control-label">Descrição:</label>
                    <textarea class="form-control" rows="3" id="descricao" placeholder="Indique a Descrição" name="descricao" required></textarea>
                </div>
                <div class="form-group">
                    <label for="dificuldade" class="control-label">Dificulcade:</label>

                    <select class="form-control" id="dificuldade" name="dificuldade" required>  
                        <option selected value="">Dificuldade</option>        
                        <option value="Iniciante">Iniciante</option>  
                        <option value="Mediano">Mediano</option>
                        <option value="Experiente">Experiente</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="duracao" class="control-label">Duração</label>
                    <input type="number" class="form-control" id="duracao" name="duracao" placeholder="Indique a Duração" required>
                </div>
                <div class="form-group">
                    <label for="tipoDuracao" class="control-label">Tipo de Duração:</label>

                    <select class="form-control" id="tipoDuracao" name="tipoDuracao" required>           
                        <option value="">Tipo de duração</option>         
                        <option value="repetições">Repetições</option>
                        <option value="minutos">Minutos</option>
                        <option value="segundos">Segundos</option>
                    </select>

                </div>


                <div class="form-group">
                    <label for="tipoExercicio" class="control-label">Tipo de Exercicio:</label>

                    <select class="form-control" id="tipoExercicio" name="tipoExercicio" required>
                        <option value="">Tipo de Exercicio</option>
                        <option value="cardio">Cardio</option>
                        <option value="peito">Peito</option>
                        <option value="braço">Braço</option>
                        <option value="perna">Perna</option>
                    </select>

                </div>
                

                <input type="submit" name="submitAdicionarExercicio" class="btn btn-primary pull-right " value="Confirmar">
                <button type="reset" class="btn btn-default pull-right btn-cancel-add-pt" >Cancelar</button>
                
        
                <?=form_close()?>
            </div>




        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->