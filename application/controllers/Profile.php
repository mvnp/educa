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

        //carrega as models
        $this->load->model(array('jobs_model'));
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
        
        //pega todos os pedidos que o usuário fez
        $pedidos = $this->jobs_model->getJobByUserid($this->__user->id);

        //carrega o template
        $vars['view']     = "profile/profile";
        $vars['tab_key']  = "2";
        $vars['tab_view'] = "pedidos";
        $vars['pedidos']  = $pedidos;
        $this->template->set_title('Meus pedidos');;
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    //pagina de propostas do perfil
    public function propostas() {
        
        //carrega o template
        $vars['view']     = "profile/profile";
        $vars['tab_key']  = "3";
        $vars['tab_view'] = "propostas";
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