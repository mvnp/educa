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
        
    }
    
    //pagina inicial
    public function index(){
        
        //pega as categorias no banco
        $sql = $this->categorias_model->getCategorias();
        
        //campos da tabela
        $campos = array('Categoria ID', "Categoria", "Descrição");
        
        //gera a tabela
        $tabela = $this->getDataTable($sql->result_array(),$campos,"categorias_datatable", TRUE);
        
        //carrega o template
        $vars['view']      = "admin/categorias/lista";
        $vars['datatable'] = $tabela;
        $vars['is_admin']  = true;
        $this->template->set_title('Categorias');;
        $this->template->set_vars($vars);
        $this->template->create_page();    
    }    
    
    //adicionar novas categorias
    public function add(){
        
    }
    
    //edita uma categoria
    public function edit(){
        
    }
    
    //remove uma categoria
    public function delete(){
        
    }
    
}