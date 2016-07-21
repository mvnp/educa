<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {
    
    public function __construct() {
        //chama o construtor do pai
        parent::__construct();
        
        //verifica se o usuário está logado
        if(!$this->__logged) {
            redirect(site_url().'user/login');
            return false;
        }
        
        //carrega o modulo profile
        $this->template->set_modules('profile');

        //carrega as bibliotecas
        $this->load->library("pagination");

        //carrega as models
        $this->load->model(array('jobs_model','propostas_model'));
    }
    
    //pagina inicial do perfil
    public function index() {
        
        //carrega o template
        $vars['view']     = "profile/profile";
        $vars['tab_key']  = "1";
        $vars['tab_view'] = "inicio";
        $this->template->set_title('Perfil');
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    //pagina de pedidos do perfil
    public function pedidos() {
        
        //config da páginação
        $config                = $this->get_bootstrap_pagination();
        $config["total_rows"]  = $this->jobs_model->record_count_by_user_id($this->__user->id);;
        $config["per_page"]    = 10;
        $config["base_url"]    = site_url() . "profile/pedidos/";
        $config["uri_segment"] = 4;

        //inicializa a paginação
        $this->pagination->initialize($config);

        //seta a variavel e faz a busca
        $page    = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $pedidos = $this->jobs_model->getJobByUserid($this->__user->id, $config['per_page'], $page * $config['per_page']);

        //carrega o template
        $vars['view']     = "profile/profile";
        $vars['tab_key']  = "2";
        $vars['tab_view'] = "pedidos";
        $vars['pedidos']  = $pedidos;
        $vars['links']    = $this->pagination->create_links();
        $this->template->set_title('Meus pedidos');;
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    //pagina de propostas do perfil
    public function propostas($type = false) {
        
        //valida o type
        $allowed_types = array('feitas','recebidas');
        $type = (!in_array($type, $allowed_types)) ? 'recebidas' : $type;

        //config da páginação
        $config = $this->get_bootstrap_pagination();
        $config["total_rows"] = $this->propostas_model->record_count($this->__user->id, $type);;
        $config["per_page"]   = 10;
        $config["base_url"]   = site_url() . "profile/propostas/".$type;
        $config["uri_segment"]= 4;

        //inicializa a paginação
        $this->pagination->initialize($config);

        //seta a variavel e faz a busca
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $propostas = $this->propostas_model->getProposes($this->__user->id, $type, $config['per_page'], $page * $config['per_page']);

        //carrega o template
        $vars['view']      = "profile/profile";
        $vars['tab_key']   = "3";
        $vars['tab_view']  = "propostas";
        $vars['propostas'] = $propostas;
        $vars['links']     = $this->pagination->create_links();
        $vars['type']      = $type;

        $this->template->set_title('Propostas');;
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    //pagina de configuração do perfil
    public function settings() {
        
        //carrega o template
        $vars['view']     = "profile/profile";
        $vars['tab_key']  = "4";
        $vars['tab_view'] = "inicio";
        $this->template->set_title('Perfil');;
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    //quando nao é o usuário dono do perfil que tenta visualiza-lo
    public function exibir($username){
        
    }
    
}