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


				<h1 class="title text-center"> Marcar Aula </h1>
                <p><a class="btn-back-geral btn btn-primary" href="<?= base_url('personalTrainer/aulas')?>"> <i class="fas fa-arrow-left"></i> Back</a>   </p>
				<div class="col-md-4">
                    <?php echo form_open('personalTrainer/marcarAula','class="form-marcarAula"'); ?>
                        <input type="hidden" id="url" value="<?=base_url()?>">

                            <div class="form-group">
                                <label for="data" class= "control-label"> Escolha uma Data: </label>
                                <input type="date" class="form-control" id="data" name="data" min="<?= date('Y-m-d')?>" required>
                            </div>

                            <div class="form-group" hidden id="divSala">
                                <label for="sala" class="control-label">Escolher Sala</label>
                                    <select class="form-control" id="sala" name="sala" required>
                                    <option selected value="">Sala</option>
                                   
                                    <?php foreach ($salas as $sala):?>
                                        <option value="<?=$sala['id']?>"><?=$sala['nome']?></option>
                                    <?php endforeach?>       
                                </select>
                            </div>                       
                            
                            <div class="form-group formShow" hidden >
                                <label for="nome" class= "control-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da aula" required>
                            </div>
                          
                            <div class="form-group formShow" hidden>
                                <label for="inicio" class= "control-label">Hora de início</label>
                                <input type="time" class="form-control" id="inicio" name="inicio" required>
                            </div>

                            <div class="form-group formShow" hidden>
                                <label for="fim" class= "control-label">Hora de fim</label>
                                <input type="time" class="form-control" id="fim" name="fim" required>
                            </div>

                            <p class="text-danger text-center" id="erroTime"></p>
                            <div class="form-group formShow" hidden >
                                <label for="lotacao" class= "control-label">Número máximo de participantes</label>
                                <input type="number" class="form-control" id="lotacao" name="lotacao" placeholder="Número máximo de participantes" required>
                                <p class="text-center text-danger" id="infoLotacao"></p>
                                <small class="text-muted" id="lotacaoSala"></small>
                            </div>

                            <h4 class="text-danger text-center">
                                <?php if($this->session->flashdata('erroMarcarAula1'))echo $this->session->flashdata('erroMarcarAula1')?>
                                <?php if($this->session->flashdata('erroMarcarAula2'))echo $this->session->flashdata('erroMarcarAula2')?>
                                <?php if($this->session->flashdata('erroMarcarAula3'))echo $this->session->flashdata('erroMarcarAula3')?>
                                <?php if($this->session->flashdata('erroMarcarAula4'))echo $this->session->flashdata('erroMarcarAula4')?>
                                <?php if($this->session->flashdata('erroMarcarAula5'))echo $this->session->flashdata('erroMarcarAula5')?>
                            </h4>
                            
                            <div class="form-group formShow" >
                          
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-primary" name="marcarAula" id="submitMarcarAula">Marcar Aula</button>
                  
                            </div>

                    </form>
                    <h4 class="text-center text-danger"><?php echo validation_errors(); ?></h4> 
				</div>

			    <div class="col-md-6 col-md-offset-1">
                    <h3 id=titleAulas class="text-center">Lista de aulas </h3>
                    <table class="table table-striped table-hover ">
                        <thead>
                            <tr class="bg-primary">
                                <th>Hora inicio</th>
                                <th>Hora fim</th>
                                <th>Nome</th>
                                <th>Duração</th>
                                <th>Lotação</th>
                                <th>Professor</th>
                            </tr>
                        </thead>
                        <tbody id='lista'>
                           
                        </tbody>
                    </table> 
                    

                    <h3 id="semResultados" class="text-danger text-center"></h3>
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

    var lotacaoSala = 0;                


    $('#data').change(function(){
        $('#divSala').show();
        mostrarAulasAjax();
    });

    // Obter combobox com os modelos consoante o fabricante
    $("#sala").change(function(){
        $('.formShow').show();
        mostrarAulasAjax();
        lotacaSalaAjax();
    });



    // $("#inicio").blur(function(){
    //    if($("#inicio").val()>=$("#fim").val()){
    //     $("#erroTime").html('erro em hora');
    //    }
    // });

      $("#fim").blur(function(){
        var fim = $("#fim").val();
        var inicio = $("#inicio").val();

        if(inicio >= fim){
            $("#erroTime").html('Hora de fim deve ser maior que hora de inicio');
            $('#submitMarcarAula').attr("disabled", true);
        }else{
            $("#erroTime").html(''); 
            $('#submitMarcarAula').attr("disabled", false);
        }
    });




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
                                var horaInicio = data[i]['hora_inicio'].split(" ");
                                var horaFim = data[i]['hora_fim'].split(" ");
                                html+= "<td>"+  horaInicio[1]+ "</td>";
                                html+= "<td>"+  horaFim[1]+ "</td>";  
                                html+= "<td>"+  data[i]['nomeAula']+"</td>";  
                                html+= "<td>"+  data[i]['duracao']+"</td>";   
                                html+= "<td>"+  data[i]['lotacao']+"</td>";    
                                html+= "<td>"+  data[i]['nomeFunc']+"</td>";          
                            html+= '</tr>'; 
                        }

                        if(html==""){
                            lista.html(html); 
                            $('#semResultados').html('<i class="fas fa-exclamation-circle"></i> Sem resultados');
                        } else{
                            $('#semResultados').html('');
                            lista.html(html); 
                        }

                    }                
            }
        });
    }


// lotacaoSala

function lotacaSalaAjax(){
    var sala =  $("#sala").val(); 
    var url = $("#url").val(); 
   
        $.ajax(
            {
                url: url+'personalTrainer/ajax2',
                type:"post",
                dataType: "json",
                data:{
                    "salaLotacao" : sala,
                    },
                success: function(data,status){
                    // console.log(data);
                    // console.log(data.id);
                    // console.log(data['id']);
                    $('#lotacaoSala').html('Número maximo de participantes nesta sala: <b>'+data.capacidade_maxima+'</b>');
                    lotacaoSala = data.capacidade_maxima;
                   
            }
        });
}


// lotacao
    $("#lotacao").blur(function(){
        if($("#lotacao").val()>lotacaoSala){
            $("#infoLotacao").html('Lotação escolhida ultrapassa a lotação máxima da sala'); 
            $('#submitMarcarAula').attr("disabled", true);
        }else{
            $("#infoLotacao").html(''); 
            $('#submitMarcarAula').attr("disabled", false);
        }
    });
   
</script>      

