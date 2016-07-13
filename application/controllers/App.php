<?php defined('BASEPATH') OR exit('No direct script access allowed');

class App extends MY_Controller {
    
	public function index() {
        
        $meta['keywords'] = "Site, palavras-chave, todo mundo usa";
        
        $vars['nome'] = "Gustavo Villas Bôas";
        
        $this->load->library('template');
        $this->template->set_title('Página inicial');
        $this->template->set_lang('pt-br en');
        $this->template->set_metatags($meta);
        $this->template->set_vars($vars);
        $this->template->create_page();
        
	}  
}
