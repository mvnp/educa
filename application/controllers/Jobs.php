<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends MY_Controller{
    
    public function __construct() {
        //carrega o construct do pai
        parent::__construct();
        
        //verifica se o usuário está logado
        if(!$this->__logged) {
            redirect(site_url().'user/login');
            return false;
        }
        
        //carrega os modulos do controller
        $this->template->set_modules('jobs');
    }
    
    //lista pedidos de aula
    public function index() {
        
        //carrega o template
        $vars['view']     = "jobs/lista";
        $this->template->set_title('Pedidos de aula');;
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    //adiciona pedidos de aula()
    public function add(){
        
        //carrega o template
        $vars['view']     = "jobs/add_form";
        $this->template->set_title('Pedir uma aula');;
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
}