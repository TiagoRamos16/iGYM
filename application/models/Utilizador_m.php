<?php
class Utilizador_m extends CI_Model {
         public function __construct()
        {
            parent::__construct();
        }

        
        public function queryPlanos()
        {
            $this->db->select('id, nome, tempo_fidelizacao, periodicidade, preco, cardiofit_musculacao, consulta_nutricao, avaliacao_fisica, aulas_grupo');
            $query = $this->db->get('plano_adesao');
            return $query->result_array();
        }


}