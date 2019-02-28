<div id="page-wrapper ">
    <div class="container-fluid ">
        <!-- Page Heading -->
        <div class="row " id="main-admin">
            <h1 class="title-exercicios text-center">Novo Plano de Exercícios</h1>


            <div class="container">
                <div class = "row">
                    <?php echo form_open('cliente/novo_plano/'.$exercicio); ?>

                        <div class="form-group">
                            <label for="descricao-exercicio">Nome do Plano:</label>
                            <input type="text" class="form-control" name="nome_plano"/>
                        </div>

                        <div class="form-group col-md-3">
                            <a class="form-control btn btn-info btn-login btn-block" href="javascript:history.back()">Voltar atrás</a>
                        </div>

                        <div class="form-group col-md-3 col-md-offset-6">
                            <input type="submit" class="btn btn-primary" value="Criar Plano" name="criar_plano">
                        </div>

                    </form>
                </div>
            </div>


            <?php 

                if($this->session->flashdata('sucessoTreino')!=null){
                    echo '<div class="alert alert-dismissible alert-success sucessoTreino">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->session->flashdata('sucessoTreino').'</div>';
                }               

            ?>


            
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->