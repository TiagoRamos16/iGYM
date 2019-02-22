<?php
class Cliente_m extends CI_Model {
         
    public function __construct()  {
        parent::__construct();
    }

    // envia dados dos exericios para menu cliente
    public function queryExercicios()
    {
        $query = $this->db->get('exercicio');
        return $query->result_array();
    }

    public function dadosExercicio($idExercicio)
    {
        return $this->db->get_where('exercicio', array('id' => $idExercicio))->row_array();
    }


}