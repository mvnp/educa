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
        
        $this->template->set_modules('profile');
    }
    
    public function index() {
        
        //carrega o template
        $vars['view']     = "profile/profile";
        $this->template->set_title('Entrar no site');
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
}