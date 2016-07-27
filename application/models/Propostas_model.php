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

        //valida o id
        if(!$id_proposta || !is_numeric($id_proposta))
            return false;

        //faz a query
        $this->db->limit(1);
        $this->db->from($this->__table.' a');
        $this->db->select('a.*, b.date_pub as pub_job, b.desc_descricao as job_desc, b.desc_title as job_title, b.user_id as dono_id, c.username, c.email, c.id');
        $this->db->join('jobs b','a.job_id = b.job_id');
        $this->db->join('users c','a.user_id = c.id');
        $this->db->where('proposta_id',$id_proposta);
        $this->db->where('a.flg_status',"A");

        //busca no banco e retorna
        $query = $this->db->get();

        if($query->num_rows() == 0)
            return false;

        $retorno = $query->result();
        return $retorno[0];
    }

    //pega os dados do professor pelo id da proposta
    public function get_teacher($id_professor = false) {

        //valida o id
        if(!$id_professor || !is_numeric($id_professor))
            return false;

        //faz a busca
        $this->db->limit(1);
        $this->db->from('users');
        $this->db->select('username, email, created_on, last_login, nome, sobrenome, estado, cidade, foto');
        $this->db->where('id',$id_professor);
        $query = $this->db->get();

        //verifica se houve resultados
        if($query->num_rows() == 0)
            return false;

        //pega e retorna o primeiro resultado
        $retorno = $query->result();
        return $retorno[0];
    }

    //pega o nome de um campo pelo alias
    public function getField($field){
        return (isset($this->__fields[$field])) ? $this->__fields[$field] : false;        
    }

    //recusa uma porposta
    public function recusar($id_proposta = false) {

        //valida o id
        if(!$id_proposta || !is_numeric($id_proposta))
            return false;

        //faz o update na tabela
        $this->db->where('proposta_id', $id_proposta);  
        $this->db->update($this->__table, array('flg_status' => 'R'));

        return true;
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
    public function has_propose($job_id = false) {

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

        $this->db->limit($limit, $start);

    	//valida o id
        if($user_id >= 0) {

            $this->db->from($this->__table.' as a');
            $this->db->select('a.*, b.desc_title, c.username');
            $this->db->join('users c', 'a.user_id = c.id');
            $this->db->join('jobs b', 'a.job_id = b.job_id');
            
            //seta o where
            if($received === "feitas")
                $this->db->where('a.'.$this->getField('Autor'),$user_id);
            else
                $this->db->where('b.user_id',$user_id);

        } else {

            $this->db->from($this->__table.' as a');
            $this->db->select('a.*, b.desc_title, c.username');
            $this->db->join('users c', 'a.user_id = c.id');
            $this->db->join('jobs b', 'a.job_id = b.job_id');
        }

    	$query = $this->db->get();

    	//array de retorno
    	$retorno = array(); 

    	//verifica se existem resultados
    	if($query->num_rows() > 0) {
    		
    		//cria a flag
    		foreach($query->result() as $proposta) {

    			if($proposta->flg_status === "A")
    				$tag = "<span class='label label-info'>Aberta</span>";
                else if($proposta->flg_status === "R")
                        $tag = "<span class='label label-danger'>Recusada</span>";
                else if($proposta->flg_status === "AP")
                        $tag = "<span class='label label-primary'>Aguardando pagamento</span>";
    			
    			$proposta->flg_status_label = $tag;

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
    	if($user_id >= 0) {

        	$this->db->from($this->__table.' as a');
        	$this->db->select('a.*, b.desc_title, c.username');
        	$this->db->join('users c', 'a.user_id = c.id');
        	$this->db->join('jobs b', 'a.job_id = b.job_id');
            
        	//seta o where
        	if($received === "feitas")
        		$this->db->where('a.'.$this->getField('Autor'),$user_id);
        	else
        		$this->db->where('b.user_id',$user_id);
        } else {
            $this->db->from($this->__table.' as a');
            $this->db->select('a.*, b.desc_title, c.username');
            $this->db->join('users c', 'a.user_id = c.id');
            $this->db->join('jobs b', 'a.job_id = b.job_id');
        }
    
    	$query = $this->db->get();

    	//verifica se existem resultados
    	return $query->num_rows();
    }

    //muda o flg para aguardando pagamento
    public function aguardar_pagamento($id_proposta = false) {

        //valida o id
        if(!$id_proposta || !is_numeric($id_proposta))
            return false;

        //faz o update na tabela
        $this->db->where('proposta_id', $id_proposta);  
        return $this->db->update($this->__table, array('flg_status' => 'AP'));
    }

    //deleta a prospota
    public function excluir($id_proposta =  false) {
        //valida o id
        if(!$id_proposta || !is_numeric($id_proposta))
            return false;
        //faz o update na tabela
        $this->db->where('proposta_id', $id_proposta);  
        return $this->db->delete($this->__table);
    }

}