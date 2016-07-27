<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_categorias extends MY_Controller {
    
    //construct
    public function __construct(){
        parent::__construct();
        
        //verifica se o usuário está logado
        if(!$this->__logged) {
            redirect(site_url().'user/login');
            return false;
        }
        //carrega os modulos de admin
        $this->template->set_modules(array('sb_admin','datatables'));
        //carrega as models
        $this->load->model('categorias_model');

        $this->load->library('grocery_crud');
        
    }
    
    public function index(){
        redirect(site_url().'admin_categorias/listar');
        return false;
    }

    //metodo index, exibe uma listagem dos dados
    public function listar(){

        //seta o grocery
        $this->grocery_crud->set_table('categorias');
        $this->grocery_crud->display_as('desc_nome','Categoria');
        $this->grocery_crud->display_as('desc_info','Descrição');
        //pega os dados da tabela
        $output = $this->grocery_crud->render();

        //seta os links da páginação
        $vars['view']     = "admin/crud";
        $vars['is_admin'] = true;
        $vars['main_title'] = "Categorias";
        $vars['main_desc'] = "categorias das matérias";
        $vars['bread'] = array('Painel de controle','Categorias');
        $vars['table']    = $output->output;
        $vars['css_files'] = $output->css_files;
        $vars['js_files'] = $output->js_files;
        $this->template->set_title('Categorias');
        $this->template->set_vars($vars);
        $this->template->create_page();

    }    

}