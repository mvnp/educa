<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends MY_Controller{
    
    public function __construct() {
        //carrega o construct do pai
        parent::__construct();
        
        //verifica se o usuário está logado
        if(!$this->__logged) {
            redirect(site_url().'user/login'); 
            return false;
        }
        
        //carrega as models
        $this->load->model(array('categorias_model','jobs_model','subcategorias_model'));
        
        //carrega os modulos do controller
        $this->template->set_modules('jobs');
        
        //carrega componentes usados no controller
        $this->load->helper("url");
        $this->load->library("pagination");
    }
    
    //lista pedidos de aula
    public function index() {
        
        //config da páginação
        $config = $this->get_bootstrap_pagination();
        $config["base_url"]   = site_url() . "jobs/index";
        $config["total_rows"] = $this->jobs_model->record_count();
        $config["per_page"]   = 20;
        $config["uri_segment"]= 3;
        
        //seta os filtros
        $filter_cat     = $this->input->post('cat_principal');
        $filter_cat_sec = $this->input->post('cat_sec');
        $filter_orc     = $this->input->post('desc_orcamento');
        
        //salva os filtros na sessão
        $filter_cat_id = ($filter_cat) ? $filter_cat : false; 
        $filter_cat    = ($filter_cat) ? $this->categorias_model->getNameById($filter_cat) : false;

        $filter_cat_sec_id = ($filter_cat_sec) ? $filter_cat_sec : false; 
        $filter_cat_sec    = ($filter_cat_sec) ? $this->subcategorias_model->getNameById($filter_cat_sec) : false;

        $this->session->set_userdata('filter_cat_principal', $filter_cat);
        $this->session->set_userdata('filter_cat_principal_id', $filter_cat_id);

        $this->session->set_userdata('filter_cat_sec', $filter_cat_sec);
        $this->session->set_userdata('filter_cat_sec_id', $filter_cat_sec_id);

        $this->session->set_userdata('filter_desc_orc', $filter_orc);
        
        //verifica se existem filtros
        if( !$this->session->userdata('filter_cat_principal') &&
            !$this->session->userdata('filter_cat_principal_id') &&
            !$this->session->userdata('filter_cat_sec') &&
            !$this->session->userdata('filter_cat_sec_id') &&
            !$this->session->userdata('filter_desc_orc')) {
            
            $no_filters = true;
            //$this->remove_filters();
        }
        else {
            $no_filters = false;
        }
        
        //inicializa a paginação
        $this->pagination->initialize($config);

        //seta a variavel e faz a busca
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->jobs_model->paginate($config["per_page"], $page * $config["per_page"]);
        
        //seta os links da páginação
        $data["links"] = $this->pagination->create_links();
        
        //pega o options das categorias
        $options_categoria = $this->categorias_model->getOptions();
        
        //carrega o template
        $vars['options_categoria'] = $options_categoria;
        $vars['view']        = "jobs/lista";
        $vars['result']      = $data["results"];
        $vars['links']       = $data["links"];
        $vars['no_filters']  = $no_filters;
        $this->template->set_title('Pedidos de aula');;
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    //remove os filtros
    public function remove_filters(){
        $this->session->unset_userdata('filter_cat_principal');
        $this->session->unset_userdata('filter_cat_principal_id');
        
        $this->session->unset_userdata('filter_cat_sec');
        $this->session->unset_userdata('filter_cat_sec_id');
        
        $this->session->unset_userdata('filter_desc_orc');
        
        redirect(site_url().'jobs');
    }
    
    //mostra em detalhe um pedido de aula
    public function aula($id = false) {
        
        //se nenhum id for informado, redireciona para a página inicial
        if(!$id) {
            redirect(site_url()."/jobs");
            return false;
        }
        
        //pega os dados do job
        $sql = $this->jobs_model->getJobById($id);

        //se o job nao existir, redireciona para a listagem
        if(!$sql) {
            redirect(site_url().'jobs');
            return false;
        }

        //carrega o template
        $vars['view'] = "jobs/detail";
        $vars['job']  = $sql;
        $this->template->set_title('Aula');;
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    //formulario para fazer uma proposta
    public function proposta($id = false){
        //verifica se algum id foi informado
        if(!$id){
            redirect(site_url()."/jobs");
            return false;
        }

        //carrega a model de propostas
        $this->load->model('propostas_model');
        
        //pega os dados do job
        $sql = $this->jobs_model->getJobById($id);

        //se o job nao existir, redireciona para a listagem
        if(!$sql) {
            redirect(site_url().'jobs');
            return false;
        }  

        //se o job for do usuaro, redirecionar para a lista
        if($sql->user_id == $this->__user->id){
            redirect(site_url().'jobs');
            return false;
        } 
            

        //faz a validação do formulario
        $this->validate->set_rules($this->__setPropostaForm());
        $error = false;

        //testa o formulário
        if($this->validate->run()){

            //pega os dados
            $dados['job_id']  = $id;
            $dados['user_id'] = $this->__user->id;
            $dados['desc_descricao'] = $this->input->post('descricao_proposta');
            $dados['desc_valor'] = $this->input->post('valor_proposta');

            //tenta salvar a proposta
            $this->propostas_model->add($dados); 
        } else {
            if(validation_errors())
                $error = validation_errors();
        }

        //verifica se o usuário ja fez uma proposta para esse trabalho
        $has_propose = $this->propostas_model->has_propose($id);

        //chame o jmask
        $this->template->set_modules('jmask'); 

        //carrega o template
        $vars['view']        = "jobs/proposta";
        $vars['job']         = $sql;
        $vars['error']       = $error;
        $vars['has_propose'] = $has_propose;
        $this->template->set_title('Proposta');;
        $this->template->set_vars($vars);
        $this->template->create_page();      
    }
    
    //pagina do chat
    public function chat($id = false){
        //verifica se algum id foi informado
        if(!$id){
            redirect(site_url()."/jobs");
            return false;
        }
        
        //carrega o template
        $vars['view']     = "jobs/chat";
        $this->template->set_title('Chat');;
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    //adiciona pedidos de aula()
    public function add(){
                
        //seta as regras de validação do formulário
        $this->validate->set_rules($this->__setAddForm());
        
        //define error como false
        $error = false;
        
        //verifica se o formulario foi submetido com sucesso
        if($this->validate->run()) {
 
            //monta o array com os dados para a inserção
            $dados[$this->jobs_model->getField('CategoriaID')]    = $this->input->post('cat_principal');
            $dados[$this->jobs_model->getField('SubCategoriaID')] = $this->input->post('cat_sec') ?  $this->input->post('cat_sec') : NULL;
            $dados[$this->jobs_model->getField('Orcamento')]      = $this->input->post('desc_orcamento');
            $dados[$this->jobs_model->getField('Titulo')]         = $this->input->post('desc_title');
            $dados[$this->jobs_model->getField('Descricao')]      = $this->input->post('desc_job');
            $dados[$this->jobs_model->getField('Autor')]          = $this->__user->id;

            //tenta inserir a nova atividade na tabela
            $insert = $this->jobs_model->add($dados);
            
            
        } else {
            //verifica se houve algum erro 
            $error =(validation_errors()) ? $error = validation_errors() : $error = false;
        }
        
        //pega o options das categorias
        $options_categoria = $this->categorias_model->getOptions();
        
        //seta as variaveis de pagina
        $vars['view']              = "jobs/add_form";
        $vars['options_categoria'] = $options_categoria;
        $vars['error']             = $error;
        
        //carrega o template
        $this->template->set_title('Pedir uma aula');;
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    //edita um pedido
    public function edit(){       
    }

    //regras de validação para o formulário
    private function __setAddForm(){
        $config = array(
            array(
                'field' => 'cat_principal',
                'label' => 'Categoria',
                'rules' => 'required|trim|numeric'
            ),
            array(
                'field' => 'cat_sec',
                'label' => 'Sub-categoria',
                'rules' => 'trim|numeric'
            ),
             array(
                'field' => 'desc_orcamento',
                'label' => 'Orçamento',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'desc_title',
                'label' => 'Título',
                'rules' => 'required|trim|max_length[140]'
            ),
             array(
                'field' => 'desc_job',
                'label' => 'Descrição',
                'rules' => 'required|trim'
            )
        );
            
        return $config;
    }
    
    //regras de validacao para propostas
    private function __setPropostaForm(){
        $config = array(
            array(
                'field' => 'descricao_proposta',
                'label' => 'Descrição',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'valor_proposta',
                'label' => 'Valor',
                'rules' => 'required|trim|numeric'
            )
        );
            
        return $config;
    }

}