<?php defined('BASEPATH') OR exit('No direct script access allowed');

//controller para as requisições ajax
class Ajax extends MY_Controller {
    
    //construct da classe
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
    
    //faz o upload da foto de perfil
    public function avatar_upload() {

        //pega o tipo do arquivo
        $filename = $_FILES['avatar_file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        $config['upload_path']   = './uploads/'; 
        $config['allowed_types'] = 'gif|jpg|png'; 
        $config['file_name']     = md5(uniqid(rand()*time()));
        $config['max_size']      = 0; 
        $config['max_width']     = 0; 
        $config['max_height']    = 0;  
        
        //carrega a biblioteca de upload
        $this->load->library('upload', $config);
            
        if (!$this->upload->do_upload('avatar_file')) {
            
            $error = array('error' => $this->upload->display_errors()); 
            echo $this->upload->display_errors();
        }
            
        else {

            //pega os dados do upload
            $data = $this->upload->data(); 
        
            //faz o resize
            $config['image_library']  = 'gd2';
            $config['source_image']   = 'uploads/'.$data['orig_name'];
            $config['create_thumb']   = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width']          = 100;
            $config['height']         = 100;
            $this->load->library('image_lib');
            $this->image_lib->clear();
            $this->image_lib->initialize($config);
            $this->image_lib->resize();

            //se a foto do usuario for diferente da padrão, exclui a foto antiga
            if($this->__user->foto != "default.png")
                unlink('uploads/'.$this->__user->foto);
            
            //faz o update no mysql
            $dados = array('foto' => $data['orig_name']);
            $this->auth->update($this->__user->id, $dados);

            echo $data['orig_name'];
        } 
      
    }

}