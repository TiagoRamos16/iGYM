<div id="page-wrapper ">
        <div class="container-fluid ">
            <!-- Page Heading -->
            <div class="row " id="main-admin">

                <!-- Mensagens de sucesso ou de erro -->
                <?php if($this->session->flashdata('sucessoAdicionarExercicio')!=null):?>
                <div class="alert alert-success text-center msn-contacto" id="message">
                    <i class="fas fa-check-circle  text-success"></i>
                    <strong>Sucesso!</strong>
                    <?= $this->session->flashdata('sucessoAdicionarExercicio')?>
                    <button type="button" class="close" aria-label="Close" id="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <script>
                    document.getElementById("close").addEventListener("click", function () {
                        document.getElementById("message").style.display = "none";
                    });
                </script>
                <?php endif?>

                <h1 class="title text-center"> Lista de exercicios </h1>

                 <p><a class="btn-back-geral btn btn-primary" href="<?= base_url('personalTrainer/verPlanoTreino/'.$id)?>"> <i class="fas fa-arrow-left"></i> Back</a>   </p>
        
                <div class="col-md-8 col-md-offset-2 btns-lista-exercicios">
                    <?php if ($this->uri->segment(4)==false): ?>
                        <div class="col-md-6">
                            <a class="btn btn-primary btn-block active" href="<?=base_url('personalTrainer/listaExercicios/').$id?>" >Meus Exercicios</a>    
                        </div>
                        <div class="col-md-6 ">
                            <a class="btn btn-primary btn-block" href="<?=base_url('personalTrainer/listaExercicios/').$id."/1"?>">Todos os exercicios</a>         
                        </div>   
                    <?php else: ?>
                        <div class="col-md-6">
                            <a class="btn btn-primary btn-block " href="<?=base_url('personalTrainer/listaExercicios/').$id?>" >Meus Exercicios</a>    
                        </div>
                        <div class="col-md-6 ">
                            <a class="btn btn-primary btn-block active" href="<?=base_url('personalTrainer/listaExercicios/').$id."/1"?>">Todos os exercicios</a>         
                        </div>   
                    <?php endif ?>  
                                 
                </div>
                


                
                <div class="plano-treino-divs">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Lista de  Exercicios</h3>
                        </div>
                    </div>  

                    <?php 
                        $count = 0;
                        foreach($exercicios as $exercicio): 
                            $count++;
                        
                            if($count%4==0) echo "<div class='row'>";
                    ?>
                    
                    <div class="col-lg-3">
                        <div class="exercioPlanoTreino ">
                            <img class="img-responsive" src="<?=base_url('assets/img/exercicios/').$exercicio['foto']?>"
                                alt="">

                            <h3 class="text-center">
                                <?=$exercicio['nome']?>
                            </h3>
                            <span class="label label-primary label-nivel">
                                <?=$exercicio['dificuldade']?></span>
                            <?php if ($this->uri->segment(4)==false): ?>
                                <?php echo form_open('personalTrainer/listaExercicios/'.$id,'id=formLE' ) ;?>
                            <?php else:?>   
                                <?php echo form_open('personalTrainer/listaExercicios/'.$id."/1",'id=formLE' ) ;?>
                            <?php endif?>    
                                <input type="hidden" name="idPlanoAdicionar" value="<?=$id?>">
                                <input type="hidden" name="idExercicioAdicionar" value="<?=$exercicio['id']?>">
                                <button class="btn btn-success btn-exercioPlanoTreino btn-block <?="divLE".$exercicio['id']?>" 
                                id="btnAdicionar" name="btnAdicionar" type="submit" value="Submit"><i class="fas fa-check-circle"></i> Adicionar</button>
                            <?= form_close();?> 
                        </div>
                
                    </div>
                    <?php 
                       if($count%4==0) echo "</div>"; 
                    endforeach ?>
                </div>

            </div>

                 
   </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->



<!-- // adicionar evento ao butao para fazer check ao exercicio -->

<script>




 $.ajax({
    url: "<?= base_url('personalTrainer/listaExercicios/') ?>",
    type:"post",
    dataType: "json",
    data:{
        "idPlano" : <?= $id ?> 
    },
    success: function(data,status){

        for(var i=0;i<data.length;i++){
            $('.divLE'+data[i].exercicio_id).css("background-color", "gray");
            $('.divLE'+data[i].exercicio_id).css("border", "1px solid gray");
            $('.divLE'+data[i].exercicio_id).html("Já Selecionado");
            $('.divLE'+data[i].exercicio_id).attr("disabled", true);
        }      
    }
});




</script>




   

