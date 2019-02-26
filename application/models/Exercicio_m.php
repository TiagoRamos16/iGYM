<?php
class Exercicio_m extends CI_Model {
         
    public function __construct()  {
        parent::__construct();
    }

    // envia dados dos exericios para menu cliente
    public function queryExercicios()
    {
        $query = $this->db->get('exercicio');
        return $query->result_array();
    }

    public function getPlanoTreino()
    {
        $query = $this->db->get('plano_treino');
        return $query->result_array();
    }

    public function criarPlanoTreino($novoPlanoTreino)
    {
        $this->db->insert("plano_treino",$novoPlanoTreino);
        // verifica id dos dados inseridos
        $this->db->select('id');
        $this->db->from('plano_treino');
        $this->db->where('nome', $novoPlanoTreino['nome']);
        $query = $this->db->get();
        return $query->row_array()['id'];
    }

    public function adicionarExercicio_PlanoTreino($planoTreino_has_exercicio)
    {
        $this->db->insert("plano_treino_has_exercicio",$planoTreino_has_exercicio);
    }


    public function dadosExercicio($idExercicio)
    {
        return $this->db->get_where('exercicio', array('id' => $idExercicio))->row_array();
    }


    public function dadosPlanoTreinoCompleto()
    {
        $this->db->select('exercicio.id, exercicio.nome "nomeExercicio", plano_treino_has_exercicio.plano_treino_id "plano_treino_id", plano_treino_has_exercicio.exercicio_id "exercicio_id", plano_treino.id, plano_treino.nome "nome_planoTreino"');
        $this->db->from('plano_treino');
        $this->db->join('plano_treino_has_exercicio', 'plano_treino_has_exercicio.plano_treino_id = plano_treino.id');
        $this->db->join('exercicio', 'exercicio.id = plano_treino_has_exercicio.exercicio_id');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function dadosNomePlanoTreino()
    {
        $this->db->select('*');
        $this->db->from('plano_treino');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function apagarPlanoTreino($idTreinoApagar)
    {
        $this->db->where('id', $idTreinoApagar);
        return $this->db->delete('plano_treino'); 
    }

    
    public function infoPlanoTreino($idPlanoTreino)
    {

        $this->db->select('*');
        $this->db->from('plano_treino_has_exercicio pe');
        $this->db->join('exercicio e', 'pe.exercicio_id = e.id');
        $this->db->where('pe.plano_treino_id', $idPlanoTreino);
        $query = $this->db->get();
        return $query->result_array();
    }

    // public function query_apagar_exercicio_plano_treino($id_exercicio_plano_treino)
    // {
    //     $this->db->where('id', $idTreinoApagar);
    //     return $this->db->delete('plano_treino');
    // }



}