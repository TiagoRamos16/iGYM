<div id="page-wrapper ">
        <div class="container-fluid ">
            <!-- Page Heading -->
            <div class="row " id="main-admin">

            <?php if($this->session->flashdata('sucessoCriarAula')!=null):?>
                <div class="alert alert-success text-center msn-contacto" id="message">
                    <i class="fas fa-check-circle  text-success"></i>
                    <strong>Sucesso!</strong> 
                    <?= $this->session->flashdata('sucessoCriarAula')?>
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
            <?php if($this->session->flashdata('sucessoEliminarAula')!=null):?>
                <div class="alert alert-success text-center msn-contacto" id="message">
                    <i class="fas fa-check-circle  text-success"></i>
                    <strong>Sucesso!</strong> 
                    <?= $this->session->flashdata('sucessoEliminarAula')?>
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
            <?php if($this->session->flashdata('erroEliminarAula')!=null):?>
                <div class="alert alert-danger text-center msn-contacto" id="message">
                    <i class="fas fa-check-circle  text-danger"></i>
                    <strong>Erro!</strong> 
                    <?= $this->session->flashdata('erroEliminarAula')?>
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

                <div class="row">
                    <h1 class="title text-center"> Visualizar Aulas </h1>
                </div>    
                <div class="row">
                    <div class="col-md-4 col-md-offset-4" >
                        <label for="pesqData">Pesquisar por data:</label>
                        <input type="date" class="form-control" name="pesqData" id="pesqData" min="<?= date('Y-m-d')?>">
                    </div>
                    
                </div>    

               

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Hora inicio</th>
                                    <th>Hora fim</th>    
                                    <th>Nome</th>
                                    <th>Duração</th>
                                    <th>Lotação</th>
                                    <th>Sala</th>
                                    <th>Tipo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id='lista'>
                            <?php foreach($aulas as $aula): ?>
                                <tr>
                                    <td><?= $aula['data']?></td>
                                    <td><?= $aula['hora_inicio']?></td>
                                    <td><?= $aula['hora_fim']?></td>
                                    <td><?= $aula['nomeAula']?></td>
                                    <td><?= $aula['duracao']?></td>
                                    <td><?= $aula['lotacao']?></td>
                                    <td><?= $aula['nomeSala']?></td>
                                    <td><?= $aula['tipo']?></td>
                                    <td class="pull-right">
                                        <a href="<?=base_url('PersonalTrainer/visualizarAula/'.$aula['id'])?>"> <i class="fas fa-eye fa-2x"></i> </a>
                                      
                                    </td>
                                </tr>
                            <?php endforeach;?> 
                            </tbody>
                        </table>     
                    </div>
                    
                </div>    
                

                 
   </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->


<script>
    $("#sala").change(function(){
        $('.formShow').show();
        mostrarAulasAjax();
    });


//fazer ajax

    function mostrarAulasAjax(){
        var sala =  $("#sala").val();
        var lista = $("#lista"); 
        var titleAulas = $("#titleAulas"); 
        var url = $("#url").val(); 
        var dataForm = $("#data").val(); 
        var sala = $("#sala").val(); 
        var sala2 = $( "#sala option:selected" ).text();
        

        $.ajax(
            {
                url: url+'personalTrainer/ajax',
                type:"post",
                dataType: "json",
                data:{
                    "sala" : sala,
                    "dataForm" : dataForm
                    },
                success: function(data,status){

                    console.log(data);
                    titleAulas.html('Lista de aulas para o dia <b>'+dataForm+"</b> na <b>"+sala2+"</b>");
                    var html = "";
                    
                    if(data!="0"){
                        for(var i=0 ;i<data.length;i++){
                            html+= '<tr>';
                                html+= "<td>"+  data[i]['hora_inicio']+"</td>";
                                html+= "<td>"+  data[i]['hora_fim']+"</td>";  
                                html+= "<td>"+  data[i]['nomeAula']+"</td>";  
                                html+= "<td>"+  data[i]['duracao']+"</td>";   
                                html+= "<td>"+  data[i]['lotacao']+"</td>";    
                                html+= "<td>"+  data[i]['nomeFunc']+"</td>";          
                            html+= '</tr>'; 
                        }

                        if(html==""){
                            lista.html(html); 
                            $('#semResultados').html('Sem resultados');
                        } else{
                            $('#semResultados').html('');
                            lista.html(html); 
                        }

                    }                
            }
        });
    }

   


</script>


