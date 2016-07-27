<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat_model extends CI_Model {

	//construct da classe
	public function __construct() {
		
		//carrega o construct do pai
		parent::__construct();

		//carrega o banco
		$this->load->database();
	}	


	//adiciona uma nova mensagem no chat
	public function add_message($dados) {
		return $this->db->insert('chat', $dados);
	}

}