


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php if($this->session->flashdata('erroPT')!=null):?>
    <div class="alert alert-danger text-center msn-contacto" id="message">
    <i class="fas fa-exclamation-circle"></i>
        <strong>Erro!</strong> 
        <?= $this->session->flashdata('erroPT')?>
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
<section id="sobre">



<h1>Página Principal</h1>

<a class="btn btn-success" href="<?= base_url('utilizador/login')?>">Login</a>
<a class="btn btn-success" href="<?= base_url('utilizador/registo')?>">Registo</a>
<a class="btn btn-success" href="<?= base_url('administrador')?>">Admin</a>
<a class="btn btn-success" href="<?= base_url('cliente')?>">Cliente</a>
<a class="btn btn-success" href="<?= base_url('nutricionista')?>">Nutricionista</a>
<a class="btn btn-success" href="<?= base_url('personalTrainer')?>">Personal Trainer</a>
<a class="btn btn-success" href="<?= base_url('rececionista')?>">Rececionista</a>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>

<section id="conceito">
    
        <div class="jumbotron">
        <h1>Jumbotron</h1>
        <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <p><a class="btn btn-primary btn-lg">Learn more</a></p>
        </div>

    
<h2>conceitos</h2>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>

<section id="servicos">
<h2>serviços</h2>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>

<section id="contactos">
<h2>contactos</h2>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>


