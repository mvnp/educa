<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propostas_model extends CI_Model { 
	//variaveis da model
    public $__fields;
    private $__table;
    
    //construct da classe
    public function __construct(){
        parent::__construct();
        
        //define o nome da tabela
        $this->__table = "propostas";
        
        //seta os campos da tabela
        $this->__setFields();
    
        //carrega as models necessárias
        $this->load->model(array('jobs_model'));
    }
    
    //seta os fields da tabela
    private function __setFields(){
        //array vazio
        $fields = array();
        
        //campos da tabela
        $fields["PropostaID"] = "proposta_id";
        $fields["JobID"]      = "job_id";
        $fields["Autor"]      = "user_id";
        $fields["Valor"]      = "desc_valor";
        $fields["Descricao"]  = "desc_descricao";
        $fields["Data"]       = "date_pub";
        $fields["Status"]     = "flg_status";    
        
        //salva na global
        $this->__fields = $fields;
    }
    
    //pega um proposta pelo id
    public function get($id_proposta = false) {

        $this->db->from($this->__table.' a');
        $this->db->select('a.*, b.desc_descricao as job_desc, b.desc_title as job_title, c.username, c.email, c.id');
        $this->db->join('jobs b','a.job_id = b.job_id');
        $this->db->join('users c','a.user_id = c.id');

        $query = $this->db->get();

        return $query->result();

    }

    //pega o nome de um campo pelo alias
    public function getField($field){
        return (isset($this->__fields[$field])) ? $this->__fields[$field] : false;        
    }

    //insere novo registro 
    public function add($dados){

    	//verifica se o usuario ja fez uma proposta para o job
    	$check = $this->has_propose($dados['job_id']);

    	//caso ja tenha feito, retorna false
    	if($check)
    		return false;

        //verifica se o job escolhido pode receber propostas
        if(!$this->jobs_model->allowed_propose($dados['job_id'])) 
            return false; 
            
    	//insere os dados na tabela
    	return $this->db->insert($this->__table, $dados);
    }

    //verifica se o usuario fez uma proposta em um job
    public function has_propose($job_id) {

    	//valida o id
    	if(!$job_id || !is_numeric($job_id))
    		return false;

    	//faz a consulta no banco
    	$this->db->from($this->__table);
    	$this->db->limit('1');
    	$this->db->select('proposta_id');
    	$this->db->where('user_id',$this->__user->id);
    	$this->db->where('job_id',$job_id);

    	$query = $this->db->get();

    	//verifica se existem resultados
    	if($query->num_rows() > 0){
    		$query = $query->result();
    		return $query[0];
    	}
    	else
    		return false;
    }

    //pega as propostas em um job pelo id do job
    public function getProposes($user_id = false, $received = false, $limit = 1, $start = 0){

    	//valida o id
    	if(!$user_id || !is_numeric($user_id))
    		return false;

    	$this->db->from($this->__table.' as a');
    	$this->db->limit($limit, $start);
    	$this->db->select('a.*, b.desc_title, c.username');
    	$this->db->join('users c', 'a.user_id = c.id');
    	$this->db->join('jobs b', 'a.job_id = b.job_id');
        $this->db->order_by("a.proposta_id", "desc");

    	//seta o where
    	if($received === "feitas")
    		$this->db->where('a.'.$this->getField('Autor'),$user_id);
    	else
    		$this->db->where('b.user_id',$user_id);

    	$query = $this->db->get();

    	//array de retorno
    	$retorno = array(); 

    	//verifica se existem resultados
    	if($query->num_rows() > 0) {
    		
    		//cria a flag
    		foreach($query->result() as $proposta) {

    			if($proposta->flg_status === "A")
    				$tag = "<span class='label label-info'>Aberta</span>";
    			
    			$proposta->flg_status = $tag;

    			$retorno[] = $proposta;

    		}	

    		//volta o array
    		return $retorno;
    	}
    	else
    		return false;
    }

    //pega a quantidade de resultados
    public function record_count($user_id = false, $received = false){

    	//valida o id
    	if(!$user_id || !is_numeric($user_id))
    		return false;

    	$this->db->from($this->__table.' as a');
    	$this->db->select('a.*, b.desc_title, c.username');
    	$this->db->join('users c', 'a.user_id = c.id');
    	$this->db->join('jobs b', 'a.job_id = b.job_id');
        
    	//seta o where
    	if($received === "feitas")
    		$this->db->where('a.'.$this->getField('Autor'),$user_id);
    	else
    		$this->db->where('b.user_id',$user_id);

    	$query = $this->db->get();

    	//verifica se existem resultados
    	return $query->num_rows();
    }

}