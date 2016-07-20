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
    }
    
    //seta os fields da tabela
    private function __setFields(){
        //array vazio
        $fields = array();
        
        //campos da tabela
        $fields["PropostaID"] = "job_id";
        $fields["JobID"]      = "categoria_id";
        $fields["Autor"]      = "sub_id";
        $fields["Valor"]      = "desc_orcamento";
        $fields["Descricao"]  = "desc_descricao";
        $fields["Data"]       = "desc_title";
        $fields["Status"]     = "flg_status";    
        
        //salva na global
        $this->__fields = $fields;
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
}