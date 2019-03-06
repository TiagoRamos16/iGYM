<br><br><br>
    <?php if($this->session->flashdata('sucessoEditar')!=null):?>
    <div class="alert alert-success text-center msn-contacto" id="message">
        <i class="fas fa-check-circle  text-success"></i>
        <strong>Sucesso!</strong> 
        <?= $this->session->flashdata('sucessoEditar')?>
        <button type="button" class="close" aria-label="Close" id="close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
    <script>
        document.getElementById("close").addEventListener("click", function(){
            document.getElementById("message").style.display = "none";
        });
    </script>
<?php endif?>
<?php if($this->session->flashdata('erroImagem')!=null):?>
    <div class="alert alert-danger text-center msn-contacto" id="message">
        <i class="fas fa-check-circle  text-danger"></i>
        <strong>Erro!</strong> 
        <?= $this->session->flashdata('erroImagem')?>
        <button type="button" class="close" aria-label="Close" id="close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
    <script>
        document.getElementById("close").addEventListener("click", function(){
            document.getElementById("message").style.display = "none";
        });
    </script>
<?php endif?>
<?php if($this->session->flashdata('erroPass')!=null):?>
    <div class="alert alert-danger text-center msn-contacto" id="message">
        <i class="fas fa-check-circle  text-danger"></i>
        <strong>Erro!</strong> 
        <?= $this->session->flashdata('erroPass')?>
        <button type="button" class="close" aria-label="Close" id="close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
    <script>
        document.getElementById("close").addEventListener("click", function(){
            document.getElementById("message").style.display = "none";
        });
    </script>
<?php endif?>
<?php if($this->session->flashdata('erroPassConf')!=null):?>
    <div class="alert alert-danger text-center msn-contacto" id="message">
        <i class="fas fa-check-circle  text-danger"></i>
        <strong>Erro!</strong> 
        <?= $this->session->flashdata('erroPassConf')?>
        <button type="button" class="close" aria-label="Close" id="close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
    <script>
        document.getElementById("close").addEventListener("click", function(){
            document.getElementById("message").style.display = "none";
        });
    </script>
<?php endif?>

<div id="page-wrapper ">
    <div class="container-fluid">


        <!-- Page Heading -->
        <div class="row " id="main-admin">
            <h1 class="title-exercicios text-center">Perfil Pessoal</h1>
            
            
            <div class="perfil-dados-pessoais">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Perfil</h3>
                    </div>
                    <div class="col-md-6">    
                        <img class="pull-right img-perfil" src="<?=base_url('uploads/').$funcionario['foto']?>" alt="">
                    </div>   
                </div>
                
                <div class="row">
                    <div class="col-md-4"><b>Nome:</b></div>
                    <div class="col-md-8"><?= $funcionario['nome']?></div>
                </div>
               <hr>
               <div class="row">
                    <div class="col-md-4"><b>Username:</b></div>
                    <div class="col-md-8"><?= $utilizador['username']?></div>
                </div>
               <hr>
               <div class="row">
                    <div class="col-md-4"><b>Data Nascimento:</b></div>
                    <div class="col-md-8"><?= $funcionario['data_nascimento']?></div>
                </div>
               <hr>
               <div class="row">
                    <div class="col-md-4"><b>Genero:</b></div>
                    <div class="col-md-8">
                        <?php if($funcionario['genero']=='m'){ 
                                echo "Masculino"; 
                            }else{
                                echo "Feminino";
                            }
                        ?>
                    </div>
                </div>
               <hr>
               <div class="row">
                    <div class="col-md-4"><b>Password:</b></div>
                    <div class="col-md-8">*************</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4"><b>Cartão de cidadão:</b></div>
                    <div class="col-md-8"><?= $funcionario['cc']?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4"><b>Contribuinte:</b></div>
                    <div class="col-md-8"><?= $funcionario['nif']?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 col-md-offset-9 ">
                        <a data-toggle="modal" data-target="#editarDadosPerfil" class="btn btn-primary pull-right">Editar Perfil</a>
                    </div>
                </div>
            </div>    

            <div class="perfil-dados-pessoais">
                <h3>Informações de contacto</h3>
                <div class="row">
                    <div class="col-md-4"><b>Email:</b></div>
                    <div class="col-md-8"><?= $utilizador['email']?></div>
                </div>
               <hr>
               <div class="row">
                    <div class="col-md-4"><b>Telefone:</b></div>
                    <div class="col-md-8"><?= $funcionario['telefone']?></div>
                </div>
               <hr>
               <div class="row">
                    <div class="col-md-4"><b>Morada:</b></div>
                    <div class="col-md-8"><?= $funcionario['morada']?></div>
                </div>
               <hr>
               <div class="row">
                    <div class="col-md-4"><b>Codigo Postal:</b></div>
                    <div class="col-md-8"><?= $funcionario['codigo_postal']?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 col-md-offset-9 ">
                        <a data-toggle="modal" data-target="#editarDadosContacto" class="btn btn-primary pull-right">Editar Informação de Contacto</a>
                </div>
                
            </div>

            </div>
           
            <div class="perfil-dados-pessoais">
                <h3>Informações de GYM</h3>
                <div class="row">
                    <div class="col-md-4"><b>Data de Registo:</b></div>
                    <div class="col-md-8">asdasd asd asdadasd as dad</div>
                    
                </div>
               <hr>
                <div class="row">
                    <div class="col-md-4"><b>Plano de adesão:</b></div>
                    <div class="col-md-8">asdasd asd asdadasd as dad</div>
                    
                </div>
               <hr>
                <div class="row">
                    <div class="col-md-4"><b>Plano de adesão:</b></div>
                    <div class="col-md-8">asdasd asd asdadasd as dad</div>
                    
                </div>
               <hr>
               <div class="row">
                    <div class="col-md-4"><b>Pagamentos:</b></div>
                    <div class="col-md-8">asdasd asd asdadasd as dad</div>
                </div>
               <hr>
               <div class="row">
                    <div class="col-md-4"><b>Estatisticas de treino:</b></div>
                    <div class="col-md-8">asdasd asd asdadasd as dad</div>
                </div>
            </div>    
                
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->



<!--  Modals de edição  -->

<div class="modal" id="editarDadosPerfil">
  <div class="modal-dialog">
    <div class="modal-content">
     <?php echo form_open_multipart('utilizador/editarUtilizador','class="form form-msn"'); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Editar dados de Perfil</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="telefone">Novo Username:</label>
                <input type="text" class="form-control" id="username" name="username" 
                placeholder="novo username" value="<?= $utilizador['username']?>">
            </div>
            <div class="form-group">
                <label for="password">Password Antiga:</label>
                <input type="password" class="form-control" id="oldPassword" name="oldPassword" 
                placeholder="password antiga">
            </div>
            <div class="form-group">
                <label for="password">Nova Password:</label>
                <input type="password" class="form-control" id="password" name="password" 
                placeholder="nova password">
            </div>
            <div class="form-group">
                <label for="confPassword">Confirmar Nova Password:</label>
                <input type="password" class="form-control" id="confPassword" name="confPassword" 
                placeholder="confirmar password">
            </div>
            <div class="form-group">
                <input type="file" class="form-control" id="userfile" 
                name="userfile">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Confirmar" name="editarPerfil">
      </div>
     </form>
    </div>
  </div>
</div>

<div class="modal" id="editarDadosContacto">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php echo form_open('utilizador/editarUtilizador','class="form form-msn"'); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Editar dados de Contacto</h4>
      </div>
      <div class="modal-body">
      
            <div class="form-group">
                <label for="telefone">Novo Telefone:</label>
                <input type="text" class="form-control" id="telefone" 
                name="telefone" placeholder="novo numero de telefone" value="<?= $funcionario['telefone']?>">
            </div>
            <div class="form-group">
            <label for="telefone">Nova Morada:</label>
                <input type="text" class="form-control" id="morada" 
                name="morada" placeholder="nova morada" value="<?= $funcionario['morada']?>">
            </div>
            <div class="form-group">
                <label for="telefone">Novo Codigo Postal:</label>
                <input type="text" class="form-control" id="codigoPostal" 
                name="codigoPostal" placeholder="novo código postal" value="<?= $funcionario['codigo_postal']?>">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Confirmar" name="editarContactos">
      </div>
    </form>
    </div>
  </div>
</div>




