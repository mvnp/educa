<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_propostas extends MY_Controller {
    //construct
    public function __construct(){
        
        //construct do pai
        parent::__construct();
        
        //verifica se o usuário está logado
        if(!$this->__logged) {
            redirect(site_url().'user/login');
            return false;
        }

        //carrega os modulos de admin
        $this->template->set_modules(array('sb_admin'));

        //carrega as models
        $this->load->model(array('categorias_model','subcategorias_model','propostas_model'));

        $this->load->library(array('grocery_CRUD','pagination'));
        
    }

    public function index(){
    	redirect(site_url().'admin_propostas/listar');
    	return false;
    }

    //metodo index, exibe uma listagem dos dados
    public function listar(){

    	//seta o grocery
        $this->grocery_crud->set_table('propostas');
		$this->grocery_crud->set_relation('job_id','jobs','desc_title');
		$this->grocery_crud->set_relation('user_id','users','username');
		$this->grocery_crud->display_as('job_id','Pedido');
		$this->grocery_crud->display_as('user_id','Usuário');
		$this->grocery_crud->display_as('desc_valor','Valor');
		$this->grocery_crud->display_as('desc_descricao','Descrição');
		$this->grocery_crud->display_as('date_pub','Publicação');
		$this->grocery_crud->display_as('flg_status','Status');

		//pega os dados da tabela
		$output = $this->grocery_crud->render();

        //seta os links da páginação
        $vars['view']     = "admin/propostas/lista";
        $vars['is_admin'] = true;
        $vars['main_title'] = "Propostas";
        $vars['main_desc'] = "propostas feitas em pedidos";
        $vars['bread'] = array('Painel de controle','Propostas');
        $vars['table']    = $output->output;
        $vars['css_files'] = $output->css_files;
        $vars['js_files'] = $output->js_files;
        $this->template->set_title('Propostas');
        $this->template->set_vars($vars);
        $this->template->create_page();

    }
}
