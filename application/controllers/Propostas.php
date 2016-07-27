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

        //pega a proposta do id
        $proposta = $this->propostas_model->get($id_proposta);

        //verifica se a proposta existe
        if(!$proposta)
            $this->__goToProfile();

        //verifica se o usuario logado fez o pedido dessa proposta
        if($proposta->dono_id != $this->__user->id)
            $this->__goToProfile();    

        //tenta pegar os dados do professor
        $professor = $this->propostas_model->get_teacher($proposta->user_id);

        //verifica se o professor foi encontrado
        if(!$professor)
            $this->__goToProfile();

        //carrega o template
        $vars['view']     = "propostas/exibir";
        $vars['proposta'] = $proposta;
        $vars['professor'] = $professor;
        $this->template->set_title('Perfil');
        $this->template->set_vars($vars);
        $this->template->create_page();
	}

    //recusa uma proposta
    public function recusar($id_proposta = false) {

        //valida o id
        if(!$id_proposta || !is_numeric($id_proposta))
            return false;

        //pega os dados da proposta
        $proposta = $this->propostas_model->get($id_proposta);

        //verifica se a proposta existe
        if(!$proposta)
            $this->__goToProfile();

        //verifica se o usuario logado é dono do pedido dessa proposta
        if($proposta->dono_id != $this->__user->id)
            $this->__goToProfile();

        //seta o flg da proposta para recusada
        $check = $this->propostas_model->recusar($proposta->proposta_id);

        //faz o redirecionamento
        $this->__goToProfile();
    } 

    //exibi a página de pagamento
    public function pagar($id_proposta = false) {

        //valida o id
        if(!$id_proposta || !is_numeric($id_proposta))
            return false;

        //pega a proposta do id
        $proposta = $this->propostas_model->get($id_proposta);

        //verifica se a proposta existe
        if(!$proposta)
            $this->__goToProfile();

        //verifica se a proposta foi feita para o usuario logado
        if($proposta->dono_id != $this->__user->id)
            $this->__goToProfile();

        //tenta pegar os dados do professor
        $professor = $this->propostas_model->get_teacher($proposta->user_id);

        //verifica se o professor foi encontrado
        if(!$professor)
            $this->__goToProfile();

        //carrega o template
        $vars['view']     = "propostas/pagar";
        $vars['proposta'] = $proposta;
        $vars['professor'] = $professor;
        $this->template->set_title('Pagar');
        $this->template->set_vars($vars);
        $this->template->create_page();
    }

    //faz as transaçoes com os meios de pagamento
    public function fazer_pagamento($id_proposta = false){
        //valida o id
        if(!$id_proposta || !is_numeric($id_proposta))
            return false;

        //pega a proposta do id
        $proposta = $this->propostas_model->get($id_proposta);

        //verifica se a proposta existe
        if(!$proposta)
            $this->__goToProfile();

        //verifica se a proposta foi feita para o usuario logado
        if($proposta->dono_id != $this->__user->id)
            $this->__goToProfile();

        //tenta pegar os dados do professor
        $professor = $this->propostas_model->get_teacher($proposta->user_id);

        //verifica se o professor foi encontrado
        if(!$professor)
            $this->__goToProfile();

        /*

        ______________________ ADICIONAR CODIGO DO PAGSEGURO AQUI ___________________________

        */

        //seta o flg da proposta para aguardando pagamento
        $check = $this->propostas_model->aguardar_pagamento($id_proposta);
        
        //redireciona
        redirect(site_url()."profile");
    }

    //redireciona de volta para o perfil
    private function __goToProfile() {
        redirect(site_url()."profile");
        return false;
    }
}