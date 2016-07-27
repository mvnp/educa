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

    //faz a exclusao de propostas
    public function excluir_proposta() {

        //array de retorno
        $retorno = array();

        //verifica se a requisição é ajax
        if(!$this->input->is_ajax_request())
            return false;

        //pega o id passado pelo post
        $proposta_id = $this->input->post('proposta_id');

        //valida o id
        if(!$proposta_id || !is_numeric($proposta_id))
            return false;

        //carrega a model de proposta
        $this->load->model('propostas_model');

        //pega os dados da proposta pelo id
        $proposta = $this->propostas_model->get($proposta_id);

        //verifica se a busca retornou resultados
        if(!$proposta){
            $retorno['msg']    = "Essa proposta já foi aceita pelo usuário";
            $retorno['status'] = "error";
            echo json_encode($retorno);
            return false;
        }

        //verifica se a proposta foi feita pelo usuário logado
        if($proposta->user_id != $this->__user->id) {
            $retorno['msg']    = 'Você não tem permissão para excluir essa proposta';
            $retorno['status'] = 'error';
            echo json_encode($retorno);
            return false;
        }

        //deleta a prospota
        $excluir = $this->propostas_model->excluir($proposta_id);

        //verifica se a exclusao aconteceu com sucesso
        if($excluir) {
            $retorno['msg']    = "A proposta foi excluida com sucesso!";
            $retorno['status'] = "success";
        }

        //formata o json de retorno
        echo json_encode($retorno);
    }


    //adiciona conversa no chat
    public function chat_add_msg(){

        //carrega a model do chat
        $this->load->model('chat_model');

        //pega os dados da conversa
        $id_para = $this->input->post('id_para');
        $msg     = $this->input->post('chat_msg');
        $time    = time();

        //monta os dados para inserir
        $dados =  array();
        $dados['id_de']    = $this->__user->id;
        $dados['id_para']  = $id_para;
        $dados['desc_msg'] = $msg;

        //tenta inserir os dados na tabela
        $teste = $this->chat_model->add_message($dados);  

        //se nao conseguir, retorna falso
        if(!$teste)
            return false;

        //monta o html de retorno
        $html = '<li class="bubble send">
                    <span class="chat_author">'.$this->__user->username.' diz:</span>
                    <span class="chat_msg">'.$msg.'</span>
                    <span class="chat_date">'.date('H:i', $time).' em '.date('d/m/Y', $time).'</span>
                </li>';

        //manda o html como json        
        $resposta['html'] = $html;
        echo json_encode($resposta);        

    }

    //pega msg do chat
    public function chat_add_msg() {
        
    }
}   