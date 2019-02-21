<!-- Sidebar Menu Items -->
<ul class="nav navbar-nav side-nav "> 
                <li>
                    <a class="<?php if($this->uri->segment(2)=="horario"){
                        echo 'side-nav-active';
                        }
                    ?>" 
                    href="<?= base_url('personalTrainer/horario')?>"><i class="fas fa-users"></i> Horários</a>
                </li>
                <li>
                    <a class="<?php if($this->uri->segment(2)=="aulas"){
                        echo 'side-nav-active';
                        }
                    ?>" 
                    href="<?= base_url('personalTrainer/aulas')?>"><i class="fas fa-users"></i> Aulas</a>
                </li>
                <li>
                    <a class="<?php if($this->uri->segment(2)=="clientes"){
                        echo 'side-nav-active';
                        }
                    ?>" 
                    href="<?= base_url('personalTrainer/clientes')?>"><i class="fas fa-users"></i> Clientes</a>

                </li>
                <li>
                <a class="<?php if($this->uri->segment(2)=="planosTreino"){
                        echo 'side-nav-active';
                        }
                    ?>" 
                    href="<?= base_url('personalTrainer/planosTreino')?>"><i class="fas fa-users"></i> Planos de treino</a>

                </li>
                <li>
                    <a class="<?php if($this->uri->segment(2)=="exercicios"){
                        echo 'side-nav-active';
                        }
                    ?>" 
                    href="<?= base_url('personalTrainer/exercicios')?>"><i class="fas fa-users"></i> Exercicios</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>