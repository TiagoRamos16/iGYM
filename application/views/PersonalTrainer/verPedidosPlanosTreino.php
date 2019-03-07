<div id="page-wrapper ">
    <div class="container-fluid ">
        <!-- Page Heading -->
        <div class="row " id="main-admin">


         <!-- Mensagens de sucesso ou de erro -->
         <?php if($this->session->flashdata('sucessoInserirPedidoPlano')!=null):?>
            <div class="alert alert-success text-center msn-contacto" id="message">
                <i class="fas fa-check-circle  text-success"></i>
                <strong>Sucesso!</strong>
                <?= $this->session->flashdata('sucessoInserirPedidoPlano')?>
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

            <div class="row">
                <h1 class="title text-center"> Adicionar Plano de treino </h1>
            </div>


            <h1 class="title text-center"> Pedidos de Planos de Treino</h1>

            <p><a class="btn-back-geral btn btn-primary" href="<?= base_url('personalTrainer/planosTreino')?>"> 
            <i class="fas fa-arrow-left"></i> Back</a> </p>
            <input type="hidden" value="<?=base_url()?>" id="url">

            <div class="row">
                <div class="col-md-6 col-md-offset-3">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="select" class="col-lg-4 control-label">Ordenar por:</label>
                            <div class="col-lg-8">
                                <select class="form-control input-sm" id="selectOrdem">
                                    <option value="" selected></option>
                                    <option value="nome">Nome</option>
                                    <option value="data">Data</option>
                                </select>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="select" class="col-lg-4 control-label">Ver Apenas:</label>
                            <div class="col-lg-8">
                                <select class="form-control input-sm" id="select2">
                                    <option value="" selected></option>
                                    <option value="aceite">Aceites</option>
                                    <option value="pendente">Pendentes</option>
                                    <option value="rejeitado">Rejeitados</option>
                                </select>
                                <br>
                            </div>
                        </div>
                    
                    </div>
                    <br><br><br>
                    <table class="table table-striped table-hover ">
                        <thead>
                            <tr class="bg-primary">
                                <th class="col-md-2">#</th>
                                <th class="col-md-2">Data</th>
                                <th class="col-md-2">Pedido Por</th>
                                <th class="col-md-2">Estado</th>
                                <th class="col-md-2">Ver Cliente</th>
                                <th class="col-md-2">Aceitar pedido</th>
                            </tr>
                        </thead>
                        <tbody id='lista'>
                            <?php $count = 0; ?>
                            
                            <?php foreach($planosTreino as $planos):?> 
                                <?php $count++;?>
                            
                            <tr>
                                <td>
                                    <?= $count?>
                                </td>
                                <td>
                                    <?= $planos['cpt_data']?>
                                </td>
                                <td>
                                    <?= $planos['nome_cliente']?>
                                </td>
                                <td>
                                    <?php if($planos['cpt_estado']=="pendente"){
                                        echo "<i class='fas fa-circle text-warning'></i> Pendente";
                                    }else if($planos['cpt_estado']=="rejeitado"){
                                        echo "<i class='fas fa-circle text-danger'></i> Rejeitado";
                                    }else if($planos['cpt_estado']=="aceite"){
                                        echo "<i class='fas fa-circle text-success'></i> Aceite";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('utilizador/outroPerfil/').$planos['admin_id']?>"> <i class="fas fa-arrow-circle-right fa-2x text-info"></i></a>
                                </td>
                                <td>
                                    <a href="<?= base_url('personalTrainer/elaborarPlano/').$planos['pt_id']?>"> <i class="fas fa-check-circle fa-2x"></i></a>
                                
                                    <!-- <?= form_open('personalTrainer/verPedidoPlanos/') ?>
                                        <input type="hidden" name="idPlano" value="<?= $planos['pt_id'] ?>">
                                        <button type="submit" value="Submit" name="submitAceitar" class="btn-transparent"> 
                                            <i class="fas fa-check-circle fa-2x"></i>
                                        </button>
                                    <?= form_close() ?> -->
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

    $('#selectOrdem').change(function(){
        // mostrarAulasAjax();
        

        var ordenamento = $('#selectOrdem').val();
        console.log(ordenamento);

        $.ajax(
            {
                url: '<?=base_url('personalTrainer/verPedidoPlanos')?>',
                type:"post",
                dataType: "json",
                data:{
                    "ordenamento" : ordenamento,
                    },
                success: function(data,status){

                    var bodyTabela = $('#lista');
                    console.log(data);
                    var html = "";
                    var url = $('#url').val();;
                    console.log(url);

                    for(var i=0 ;i<data.length;i++){
                        var count = i+1;
                            html+= '<tr>';
                                html+= "<td>"+  count +"</td>";
                                html+= "<td>"+  data[i]['cpt_data']+"</td>";  
                                html+= "<td>"+  data[i]['nome_cliente']+"</td>"; 
                                html+= "<td>";
                                if(data[i]['cpt_estado']=="pendente"){
                                        html+= "<i class='fas fa-circle text-warning'></i> Pendente";
                                }else if(data[i]['cpt_estado']=="rejeitado"){
                                        html+= "<i class='fas fa-circle text-danger'></i> Rejeitado";
                                }else if(data[i]['cpt_estado']=="aceite"){
                                        html+= "<i class='fas fa-circle text-success'></i> Aceite";
                                }
                                html+= "</td>";
                                html+= "<td>";
                                html+= "<a href="+"<?= base_url('utilizador/outroPerfil/')?>"+data[i].admin_id+'> <i class="fas fa-arrow-circle-right fa-2x"></i></a>';
                                html+= "</td>";      
                            html+= '</tr>'; 
                        }

                        
                            bodyTabela.html(html); 
        
            }
        });



    });





      $('#select2').change(function(){
        // mostrarAulasAjax();
        

        var ordenamento2 = $('#select2').val();
        console.log(ordenamento2);

        $.ajax(
            {
                url: '<?=base_url('personalTrainer/verPedidoPlanos')?>',
                type:"post",
                dataType: "json",
                data:{
                    "ordenamento2" : ordenamento2,
                    },
                success: function(data,status){

                    var bodyTabela = $('#lista');
                    console.log(data);
                    var html = "";
                    var url = $('#url').val();;
                    console.log(url);

                    for(var i=0 ;i<data.length;i++){
                        var count = i+1;
                            html+= '<tr>';
                                html+= "<td>"+  count +"</td>";
                                html+= "<td>"+  data[i]['cpt_data']+"</td>";  
                                html+= "<td>"+  data[i]['nome_cliente']+"</td>"; 
                                html+= "<td>";
                                if(data[i]['cpt_estado']=="pendente"){
                                        html+= "<i class='fas fa-circle text-warning'></i> Pendente";
                                }else if(data[i]['cpt_estado']=="rejeitado"){
                                        html+= "<i class='fas fa-circle text-danger'></i> Rejeitado";
                                }else if(data[i]['cpt_estado']=="aceite"){
                                        html+= "<i class='fas fa-circle text-success'></i> Aceite";
                                }
                                html+= "</td>";
                                html+= "<td>";
                                html+= "<a href="+"<?= base_url('utilizador/outroPerfil/')?>"+data[i].admin_id+'> <i class="fas fa-arrow-circle-right fa-2x"></i></a>';
                                html+= "</td>";      
                            html+= '</tr>'; 
                        }

                        
                            bodyTabela.html(html); 
        
            }
        });



    });


</script>
