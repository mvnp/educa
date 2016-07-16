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
        $tabela = $this->getDataTable($sql->result_array(),$campos,"categorias_datatable", TRUE, 'admin_categorias',$this->categorias_model->getField('CategoriaID'));
        
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
        
        //seta as regras de validação do formulário
        $this->validate->set_rules($this->__setForm());
        
        //define os erros como false
        $error = false;
        
        //verifica se os campos foram digitados corretamente
        if($this->validate->run()) {
            
            //pega os dados submetidos pelo login
            $categoria_nome = $this->input->post('categoria_nome');
            $categoria_desc = $this->input->post('categoria_desc');
            $categoria_id   = $this->input->post('id_editar');
            
            //agrupa os dados em um array
            $dados = array(
                $this->categorias_model->getField('Categoria')     => $categoria_nome,
                $this->categorias_model->getField('CategoriaInfo') => $categoria_desc
            );
            
            //grava a nova categoria no banco de dados
            $this->categorias_model->save($dados, $categoria_id);
            
            //redireciona para a pagina inicial
            redirect(site_url()."admin_categorias");
            
        } else {
            //verifica se houve algum erro 
            $error =(validation_errors()) ? $error = validation_errors() : $error = false;
        }
        
        //carrega o template
        $vars['view']      = "admin/categorias/add";
        $vars['is_admin']  = true;
        $vars['error']     = $error;
        $this->template->set_title('Adicionar categoria');;
        $this->template->set_vars($vars);
        $this->template->create_page(); 
    }
    
    //edita uma categoria
    public function edit($id = false){
        //se nenhum id for informado, retorna false
        if(!$id && (int)$id)
            recirect(site_url()."admin_categorias");
        
        //pega as categorias no banco
        $sql = $this->categorias_model->getCategorias($id);
        
        //se nao existe o registro, redireciona para a pagina inicial
        if(!$sql)
            recirect(site_url()."admin_categorias");
        
        $retorno = $sql->result_array();
        $retorno = $retorno[0];
        
        //carrega o template
        $vars['view']      = "admin/categorias/add";
        $vars['is_admin']  = true;
        $vars['error']     = false;
        $vars['dados']     = $retorno;
        $this->template->set_title('Editar categoria');;
        $this->template->set_vars($vars);
        $this->template->create_page();
        
    }
    
    //remove uma categoria
    public function remove($id = false){
        //verifica se algum id foi informado
        if(!$id)
            return false;
        
        //deleta o registro informado pelo id
        $this->categorias_model->delete($id);
        
        //volta para a pagina principal
        redirect(site_url().'admin_categorias');
        return false;
        
    }
    
    private function __setForm(){
        $config = array(
            array(
                'field' => 'categoria_nome',
                'label' => 'Categoria',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'categoria_desc',
                'label' => 'Descrição',
                'rules' => 'required|trim'
            )
        );
            
        return $config;
    }
    
}