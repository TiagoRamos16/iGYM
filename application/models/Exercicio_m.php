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







}