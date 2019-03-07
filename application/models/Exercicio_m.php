<?php
class Exercicio_m extends CI_Model {
         
    public function __construct()  {
        parent::__construct();
    }

    // envia dados dos exericios para menu cliente
    public function queryExercicios($search = false, $pesquisaTipoExercicio = false,  $pesquisaDificuldade = false)
    {
        
        $this->db->select('*');
        $this->db->from('exercicio');

        if(strlen($search) > 0){

            $this->db->like('nome', $search);
        }

        if(strlen($pesquisaDificuldade) > 0){

            $this->db->like('dificuldade', $pesquisaDificuldade);
        }

        if(strlen($pesquisaDificuldade) > 0){

            $this->db->like('tipo_exercicio', $pesquisaTipoExercicio);
        }

        $query = $this->db->get();
        return $query->result_array();

    }

    public function getDificuldade(){

        $this->db->select('dificuldade');
        $this->db->from('exercicio');
        $this->db->distinct('dificuldade');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function getTipo_exercicio(){

        $this->db->select('tipo_exercicio');
        $this->db->from('exercicio');
        $this->db->distinct('tipo_exercicio');
        $query = $this->db->get();
        return $query->result_array();
    
    }


    public function getPlanoTreino($idTreinoApagar = false,  $utilizadorId = false)
    {
        // se nao for passado parametros lista todos os planos
        if($idTreinoApagar == false && $utilizadorId == false){

            $this->db->where('pt_estado', 'ativo');
            $query = $this->db->get('plano_treino');
            return $query->result_array();
            
        }else{
            // lista planos que foram criados pelo utilizador
            $this->db->select('nome');
            $this->db->from('plano_treino');
            $this->db->where('id', $idTreinoApagar);
            $this->db->where('cliente_admin_id', $utilizadorId);
            $query = $this->db->get();
            return $query->result_array();
        }

    }


    //obter plano de treino por Funcionario
    public function getPlanoTreinoPorFuncionario($idFuncionario=false){
        return $this->db->get_where('plano_treino',array('funcionario_admin_id'=>$idFuncionario))->result_array(); 
    }

    //obter plano de treino por Funcionario
    public function getExercicioPorFuncionario($idFuncionario=false){
        return $this->db->get_where('exercicio',array('funcionario_admin_id'=>$idFuncionario))->result_array(); 
    }

    public function obterPlanoTreino($id=false){
        if($id==false){
            $this->db->select('pt.id,pt.nome "pt_nome",pt.funcionario_admin_id,pt.cliente_admin_id, pt.pt_estado,pt.pt_data, f.nome "f_nome" ');
            $this->db->join('funcionario f','pt.funcionario_admin_id = f.admin_id');    
            return $this->db->get('plano_treino pt')->result_array();
        }else{
            $this->db->select('pt.id,pt.nome "pt_nome",pt.funcionario_admin_id,pt.cliente_admin_id, pt.pt_estado,pt.pt_data, f.nome "f_nome" ');
            $this->db->join('funcionario f','pt.funcionario_admin_id = f.admin_id');   
            return $this->db->get_where('plano_treino pt',array('id'=>$id,))->row_array();
        }
    }

    

    //obter plano de treino publico e  activos

    public function getPlanoTreinoPorTipo($tipo,$estado){
        return $this->db->get_where('plano_treino',array('pt_tipo'=>$tipo,'pt_estado'=>$estado))->result_array(); 
    }

    //pedidos de plano de treino por utilizador

    public function getPedidosDePlanosTreino($estado=false,$idUtilizador=false,$ordenar=false){

        $this->db->select('cp.cpt_data, c.nome "nome_cliente", cp.cpt_estado, c.admin_id');
        $this->db->join('cliente c',"cp.id_cliente = c.admin_id");
        $this->db->join('plano_treino pt',"cp.id_planoTreino = pt.id");

        if($estado!=false){
            $this->db->where("cp.cpt_estado",$estado);
        } 
        if($idUtilizador!=false){
            $this->db->where("pt.funcionario_admin_id",$idUtilizador);
        }
        
        if($ordenar!=false){
            if($ordenar=="nome"){
                $this->db->order_by('c.nome', 'ASC');
            }else if($ordenar=="data"){
                $this->db->order_by('cp.cpt_data', 'DESC');
            }
            
        }

        return $this->db->get('cliente_has_planotreino cp')->result_array();


    }


    //obter clientes associados a plano de treino
    public function oberClientesAssociadoPlanoTreino($idPlano){
        $this->db->join("cliente c","cp.id_cliente = c.admin_id");
        return $this->db->get_where('cliente_has_planotreino cp',array("id_planoTreino"=>$idPlano))->result_array();      
    }

    //obter exercicios associados a plano de treino
    public function oberExerciciosAssociadoPlanoTreino($idPlano){
        $this->db->join("exercicio e","pe.exercicio_id = e.id");
        return $this->db->get_where('plano_treino_has_exercicio pe',array("pe.plano_treino_id"=>$idPlano))->result_array();      
    }

    public function verificaPlanoTreino($idFuncionario, $idUtilizador){

        $this->db->select('pt_estado');
        $this->db->from('plano_treino');
        $this->db->where('funcionario_admin_id', $idFuncionario);
        $this->db->where('cliente_admin_id', $idUtilizador);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function criarPlanoTreino($novoPlanoTreino)
    {
        $this->db->insert("plano_treino",$novoPlanoTreino);
        // verifica id dos dados inseridos
        return $insert_id = $this->db->insert_id();
    }


    public function criarCliente_has_PlanoTreino($novoCliente_has_PlanoTreino){

        $this->db->insert("cliente_has_planotreino",$novoCliente_has_PlanoTreino);

    }


    public function adicionarExercicio_PlanoTreino($planoTreino_has_exercicio)
    {
        $this->db->insert("plano_treino_has_exercicio",$planoTreino_has_exercicio);
    }


    public function dadosExercicio($idExercicio=false)
    {
        if($idExercicio==false){
            return $this->db->get('exercicio')->result_array();
        }else{
            return $this->db->get_where('exercicio', array('id' => $idExercicio))->row_array();
        }
        
    }

    
    public function dadosExercicioPorUtilizador($idUtilizador)
    {
       return $this->db->get_where('exercicio', array('funcionario_admin_id' => $idUtilizador))->result_array();
    }        

    public function obterExerciciosAssociadosPlano($idPlano){
        return $this->db->get_where('plano_treino_has_exercicio', array('plano_treino_id' => $idPlano))->result_array();
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


    public function apagarPlanoTreino($idTreinoApagar){
        $this->db->where('id', $idTreinoApagar);
        return $this->db->delete('plano_treino'); 
    }

    public function apagarExercicio($idExercicio){
        $this->db->where('id', $idExercicio);
        return $this->db->delete('exercicio'); 
    }

 
    //eitar plano de treino

    public function editarPlanoTreino($data,$id){

        $this->db->where('id', $id);
        $this->db->update('plano_treino', $data);
    }

    //eitar exercicio

    public function editarExercicio($data,$id){

        $this->db->update('exercicio', $data, "id = $id");
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

    public function query_apagar_exercicio_plano_treino($idPlanoTreino, $id_exercicio_plano_treino)
    {
        $this->db->where('plano_treino_id', $idPlanoTreino);
        $this->db->where('exercicio_id', $id_exercicio_plano_treino);
        return $this->db->delete('`plano_treino_has_exercicio`');
    }

    public function inserePlanoTreino($data){
        $this->db->insert('plano_treino', $data);
        return $insert_id = $this->db->insert_id();
    }

    public function insereExercicio($data){
        $this->db->insert('exercicio', $data);
        return $insert_id = $this->db->insert_id();
    }



}