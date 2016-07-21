<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Propostas extends MY_Controller { 

	//construtor
	public function __construct(){
		
		//carrega o construct do pai
		parent::__construct();

		//verifica se o usuário está logado
        if(!$this->__logged) {
            redirect(site_url().'user/login');
            return false;
        }
        
        //carrega as models
        $this->load->model(array('propostas_model'));

        //carrega os modulos css e javascript
        $this->template->set_modules('propostas');
	}	


	//exibi uma proposta
	public function exibir($id_proposta =  false){

		//valida o id
		if(!$id_proposta || !is_numeric($id_proposta)){
            redirect(site_url().'profile');
            return false;
        }

        $proposta = $this->propostas_model->get(20);

        //carrega o template
        $vars['view']     = "propostas/exibir";
        $this->template->set_title('Perfil');
        $this->template->set_vars($vars);
        $this->template->create_page();

	}

}