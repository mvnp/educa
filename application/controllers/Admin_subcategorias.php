<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_subcategorias extends MY_Controller {
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
        $this->load->model(array('categorias_model','subcategorias_model'));

        $this->load->library('grocery_crud');
        
    }
    
    public function index(){
        redirect(site_url().'admin_subcategorias/listar');
        return false;
    }

    //metodo index, exibe uma listagem dos dados
    public function listar(){

        //seta o grocery
        $this->grocery_crud->set_table('subcategorias');
        $this->grocery_crud->set_relation('categoria_id','categorias','desc_nome');
        $this->grocery_crud->display_as('categoria_id','Categoria mãe');
        $this->grocery_crud->display_as('sub_desc','Descrição');
        $this->grocery_crud->display_as('sub_nome','Sub-categoria');
        //pega os dados da tabela
        $output = $this->grocery_crud->render();

        //seta os links da páginação
        $vars['view']     = "admin/crud";
        $vars['is_admin'] = true;
        $vars['main_title'] = "Sub-categorias";
        $vars['main_desc'] = "sub-categorias do site";
        $vars['bread'] = array('Painel de controle','Categorias','Sub-categorias');
        $vars['table']    = $output->output;
        $vars['css_files'] = $output->css_files;
        $vars['js_files'] = $output->js_files;
        $this->template->set_title('Cateogorias');
        $this->template->set_vars($vars);
        $this->template->create_page();

    }  

}