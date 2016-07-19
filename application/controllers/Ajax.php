<?php defined('BASEPATH') OR exit('No direct script access allowed');

//controller para as requisições ajax
class Ajax extends MY_Controller {
    
    public function __construct(){
        
        //pega o construct do pai
        parent::__construct();
        
        //verifica se o usuário está logado
        if(!$this->__logged)
            return false;        
    
        //carrega as models
        $this->load->model(array('subcategorias_model'));
    }
    
    //pega as options de uma categoria a partir da sua categoria informada
    public function get_subcategorias() {
        
        //pega o post
        $id = $this->input->post('categoria_mae');
        
        //valida o id
        if(!$id || !is_numeric($id))
            return false;
        
        //pega os options
        $cat = $this->subcategorias_model->getByParentID($id);
        
        //verifica se deve retornar algo
        if(!$cat)
            echo "<option value=''>Nenhuma subcategoria encontrada</option>";
        else
            echo $cat;
        
    }
    
}