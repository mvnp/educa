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
        
    }
    
    //pagina inicial
    public function index(){
        
        //pega as categorias no banco
        $sql = $this->subcategorias_model->getSubcategorias();
        
        //campos da tabela
        $campos = array('Categoria ID', "Categoria Mãe", "Sub-categoria", "Descrição");
        
        //gera a tabela
        $tabela = $this->getDataTable($sql->result_array(),$campos,"subcategorias_datatable", TRUE, 'admin_subcategorias',$this->subcategorias_model->getField('SubID'));
        
        //carrega o template
        $vars['view']      = "admin/subcategorias/lista";
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
            $subcategoria_nome = $this->input->post('subcategoria_nome');
            $subcategoria_mae = $this->input->post('categoria_id');
            $subcategoria_desc = $this->input->post('subcategoria_desc');
            $subcategoria_id   = $this->input->post('id_editar');
            
            //agrupa os dados em um array
            $dados = array(
                $this->subcategorias_model->getField('SubNome')  => $subcategoria_nome,
                $this->subcategorias_model->getField('SubDesc')  => $subcategoria_desc,
                $this->subcategorias_model->getField('SubMaeID') => $subcategoria_mae
            );
            
            //grava a nova categoria no banco de dados
            $this->subcategorias_model->save($dados, $subcategoria_id);
            
            //redireciona para a pagina inicial
            redirect(site_url()."admin_subcategorias");
            
        } else {
            //verifica se houve algum erro 
            $error =(validation_errors()) ? $error = validation_errors() : $error = false;
        }
        
        //pega as opçoes
        $options = $this->subcategorias_model->maeOptions();
        
        //carrega o template
        $vars['view']      = "admin/subcategorias/add";
        $vars['is_admin']  = true;
        $vars['error']     = $error;
        $vars['options']   = $options;
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
        $sql = $this->subcategorias_model->getSubcategorias($id);
        
        //se nao existe o registro, redireciona para a pagina inicial
        if(!$sql)
            recirect(site_url()."admin_categorias");
        
        //array com a pesquisa
        $retorno = $sql->result_array();
        $retorno = $retorno[0];
        
        //pega as opçoes
        $options = $this->subcategorias_model->maeOptions($id);
        
        //carrega o template
        $vars['view']      = "admin/subcategorias/add";
        $vars['is_admin']  = true;
        $vars['error']     = false;
        $vars['dados']     = $retorno;
        $vars['options']   = $options;
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
        $this->subcategorias_model->delete($id);
        
        //volta para a pagina principal
        redirect(site_url().'admin_subcategorias');
        return false;
        
    }
    
    //seta as regras de validação para o formulario de subdiciplinas
    private function __setForm(){
        $config = array(
            array(
                'field' => 'subcategoria_nome',
                'label' => 'Sub-categoria',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'subcategoria_desc',
                'label' => 'Descrição',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'categoria_id',
                'label' => 'Categoria mãe',
                'rules' => 'required|trim|numeric'
            )
        );
            
        return $config;
        }
}