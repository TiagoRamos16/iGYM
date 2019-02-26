
<div id="page-wrapper ">
    <div class="container-fluid">


        <!-- Page Heading -->
        <div class="row " id="main-admin">
            <h1 class="title-exercicios text-center">Perfil de <?=$cliente['nome']?></h1>
           
            <div class="perfil-dados-pessoais">
            <a class="back-arrow" href="<?= $_SERVER['HTTP_REFERER']?>"><i class="fas fa-arrow-left"></i>Back</a>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Perfil</h3>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4"><b>Nome:</b></div>
                    <div class="col-md-8"><?= $cliente['nome']?></div>
                </div>
               <hr>
               <div class="row">
                    <div class="col-md-4"><b>Username:</b></div>
                    <div class="col-md-8"><?= $utilizador['username']?></div>
                </div>
               <hr>
               <div class="row">
                    <div class="col-md-4"><b>Data Nascimento:</b></div>
                    <div class="col-md-8"><?= $cliente['data_nascimento']?></div>
                </div>
               <hr>
               <div class="row">
                    <div class="col-md-4"><b>Genero:</b></div>
                    <div class="col-md-8">
                        <?php if($cliente['genero']=='m'){ 
                                echo "Masculino"; 
                            }else{
                                echo "Feminino";
                            }
                        ?>
                    </div>
                </div>
               <hr>
                <div class="row">
                    <div class="col-md-4"><b>Cartão de cidadão:</b></div>
                    <div class="col-md-8"><?= $cliente['cc']?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4"><b>Contribuinte:</b></div>
                    <div class="col-md-8"><?= $cliente['nif']?></div>
                </div>
                <hr>
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
                    <div class="col-md-8"><?= $cliente['telefone']?></div>
                </div>
               <hr>
               <div class="row">
                    <div class="col-md-4"><b>Morada:</b></div>
                    <div class="col-md-8"><?= $cliente['morada']?></div>
                </div>
               <hr>
               <div class="row">
                    <div class="col-md-4"><b>Codigo Postal:</b></div>
                    <div class="col-md-8"><?= $cliente['codigo_postal']?></div>
                </div>
                <hr>              
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


