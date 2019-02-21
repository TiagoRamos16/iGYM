<div id="page-wrapper ">
    <div class="container">
        <!-- Page Heading -->
        <div class="row " id="main-admin">
            <h1 class="title-mensagens text-center ">Mensagens</h1>     
        
            <div class="row">
                <button class="btn btn-info btn-lg btn-criar-mensagem" data-toggle="modal" data-target="#modalCriarMsn"> <i class="fas fa-plus"></i> Criar Mensagem</button>

            </div>

            <div class="row btns-mensagens">
                <div class="btn-group btn-group-justified">
                    <div class="btn-group ">
                        <button type="button" class="btn btn-primary active">Todas</button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Lidas</button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Não Lidas</button>
                    </div>
                </div>
            </div>

            <div class="row pesquisa-mensagens">
                <form class="navbar-form navbar-left form-pesquisa-mensagens" role="search">
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control" placeholder="Pesquisar">
                    </div>
                    <div class="form-group col-md-2">
                        <input type="date" class="form-control" >
                    </div>
                    <div class="form-group col-md-2">
                        <input type="submit" class="btn btn-default" value="Pesquisar">
                    </div>
                </form>
            </div>

            <div class="row">
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>De</th>
                            <th>Titulo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->


<div class="modal" id="modalCriarMsn">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Enviar Mensagem</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('utilizador/login','class="form form-msn"'); ?>
            <div class="form-group">
                <input type="email" class="form-control" id="para" name="para" placeholder="Email Para">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Titulo">
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="4" id="textArea" placeholder="Mensagem"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </form>
    </div>
  </div>
</div>