<div class="container-fluid" id="fullpage">





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
<a class="btn btn-success" href="<?= base_url('utilizador/registo_plano')?>">Registo</a>
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

<div class="row ">
    <div class="col-md-12" id="mapaContacto">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13433.057601117858!2d-17.059944!3d32.679014!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa393204f0d195615!2sACIN+-+iCloud+Solutions!5e0!3m2!1spt-PT!2spt!4v1551459233837"
        width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>



</div> <!-- class="container" id="fullpage" -->