<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {
    
    public function __construct() {
        //chama o construtor do pai
        parent::__construct();
        
        //verifica se o usuário está logado
        if(!$this->__logged) {
            redirect(site_url().'user/login');
            return false;
        }
        
        //carrega o modulo profile
        $this->template->set_modules('profile');

        //carrega as bibliotecas
        $this->load->library("pagination");

        //carrega as models
        $this->load->model(array('jobs_model','propostas_model'));
    }
    
    //pagina inicial do perfil
    public function index() {
        
        //carrega o template
        $vars['view']     = "profile/profile";
        $vars['tab_key']  = "1";
        $vars['tab_view'] = "inicio";
        $this->template->set_title('Perfil');
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    //pagina de pedidos do perfil
    public function pedidos() {
        
        //config da páginação
        $config                = $this->get_bootstrap_pagination();
        $config["total_rows"]  = $this->jobs_model->record_count_by_user_id($this->__user->id);;
        $config["per_page"]    = 10;
        $config["base_url"]    = site_url() . "profile/pedidos/";
        $config["uri_segment"] = 4;

        //inicializa a paginação
        $this->pagination->initialize($config);

        //seta a variavel e faz a busca
        $page    = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $pedidos = $this->jobs_model->getJobByUserid($this->__user->id, $config['per_page'], $page * $config['per_page']);

        //carrega o template
        $vars['view']     = "profile/profile";
        $vars['tab_key']  = "2";
        $vars['tab_view'] = "pedidos";
        $vars['pedidos']  = $pedidos;
        $vars['links']    = $this->pagination->create_links();
        $this->template->set_title('Meus pedidos');;
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    //pagina de propostas do perfil
    public function propostas($type = false) {
        
        //valida o type
        $allowed_types = array('feitas','recebidas');
        $type = (!in_array($type, $allowed_types)) ? 'recebidas' : $type;

        //config da páginação
        $config = $this->get_bootstrap_pagination();
        $config["total_rows"] = $this->propostas_model->record_count($this->__user->id, $type);;
        $config["per_page"]   = 10;
        $config["base_url"]   = site_url() . "profile/propostas/".$type;
        $config["uri_segment"]= 4;

        //inicializa a paginação
        $this->pagination->initialize($config);

        //seta a variavel e faz a busca
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $propostas = $this->propostas_model->getProposes($this->__user->id, $type, $config['per_page'], $page * $config['per_page']);

        //carrega o template
        $vars['view']      = "profile/profile";
        $vars['tab_key']   = "3";
        $vars['tab_view']  = "propostas";
        $vars['propostas'] = $propostas;
        $vars['links']     = $this->pagination->create_links();
        $vars['type']      = $type;

        $this->template->set_title('Propostas');;
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    //pagina de configuração do perfil
    public function settings() {
        
        //seta as regras de validação do formulário
        $this->validate->set_rules($this->__setForm());
        
        //define error como false
        $error = false;
        
        //verifica se o formulario foi submetido com sucesso
        if($this->validate->run()) {

            //monta o array com os dados para a inserção
            $dados["nome"]        = $this->input->post('cad_nome', TRUE);
            $dados["sobrenome"]   = $this->input->post('cad_sobrenome', TRUE);
            $dados["cpf"]         = $this->input->post('cad_cpf', TRUE);
            $dados["estado"]      = $this->input->post('cad_estado', TRUE);
            $dados["cep"]         = $this->input->post('cad_cep', TRUE);
            $dados["endereco"]    = $this->input->post('cad_endereco', TRUE);
            $dados["numero"]      = $this->input->post('cad_numero', TRUE);
            $dados["complemento"] = $this->input->post('cad_complemento', TRUE);
            $dados["bairro"]      = $this->input->post('cad_bairro', TRUE);
            $dados["cidade"]      = $this->input->post('cad_cidade', TRUE);
            $dados["telefone"]    = $this->input->post('cad_telefone', TRUE);

            //tenta inserir a nova atividade na tabela
            $insert = $this->auth->update($this->__user->id, $dados);
            
            //redireciona o usuário para o perfil
            redirect(site_url().'profile');
            return false;
            
        } else {
            //verifica se houve algum erro 
            $error =(validation_errors()) ? $error = validation_errors() : $error = false;
        }

        //carrega o template
        $vars['view']     = "profile/profile";
        $vars['tab_key']  = "4";
        $vars['tab_view'] = "settings";
        $vars['error']    = $error;
        $this->template->set_title('Perfil');;
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    //quando nao é o usuário dono do perfil que tenta visualiza-lo
    public function exibir($username){
        
    }

    //seta as regras do formulario de configuração
    private function __setForm() {

        $config = array(
            array(
                'field' => 'cad_nome',
                'label' => 'Nome',
                'rules' => 'required|trim|regex_match[/[A-z0-9à-ú -]/]|min_length[2]|max_length[20]'
            ),
            array(
                'field' => 'cad_sobrenome',
                'label' => 'Sobrenome',
                'rules' => 'trim|required|regex_match[/[A-z0-9à-ú -]/]|min_length[2]|max_length[40]'
            ),
             array(
                'field' => 'cad_cpf',
                'label' => 'CPF',
                'rules' => 'required|trim|alpha_dash|min_length[3]|max_length[15]'
            ),
            array(
                'field' => 'cad_estado',
                'label' => 'Estado',
                'rules' => 'required|trim|max_length[2]|alpha'
            ),
             array(
                'field' => 'cad_cep',
                'label' => 'CEP',
                'rules' => 'required|trim|alpha_dash'
            ),
             array(
                'field' => 'cad_endereco',
                'label' => 'Endereço',
                'rules' => 'required|trim|regex_match[/[A-z0-9à-ú -]/]|max_length[255]'
            ),
             array(
                'field' => 'cad_numero',
                'label' => 'Número',
                'rules' => 'required|trim|numeric|max_length[5]'
            ),
             array(
                'field' => 'cad_complemento',
                'label' => 'Complemento',
                'rules' => 'trim|min_length[3]|max_length[50]'
            ),
             array(
                'field' => 'cad_bairro',
                'label' => 'Bairro',
                'rules' => 'required|trim|alpha_numeric_spaces|max_length[30]'
            ),
             array(
                'field' => 'cad_cidade',
                'label' => 'Cidade',
                'rules' => 'required|trim|alpha_numeric_spaces|min_length[3]|max_length[30]'
            ),
             array(
                'field' => 'cad_telefone',
                'label' => 'Telefone',
                'rules' => 'required|trim|min_length[8]|max_length[15]'
            )

        );
            
        return $config;
    }
    
}