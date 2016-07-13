<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe User
 * 
 * @access public
 * @author Gustavo Vilas Boas
 * @since 07/2017
 */
class User extends MY_Controller {
    
    /**
     * Metodo construtor do controller
     * 
     * @access public
     * @author Gustavo Vilas Boas
     * @since 07/2017
     * @param void
     * @return void
     */
    public function __construct() {
        //carrega construct do pai
        parent::__construct();
        
        $this->load->helper('email');
        $this->template->set_modules('jmask');
    }
    
    /**
     * Se o usuário estiver logado, vai para o perfil, se não, vai para o login
     * 
     * @access public
     * @author Gustavo Vilas Boas
     * @since 07/2017
     * @param void
     * @return void
     */
    public function index() {
        //verifica se o usuário já está logado
        if(!$this->offline_only('/profile')) 
            return false;
        else
            redirect(site_url()."/user/login");
        
        exit();
    }
    
    /**
     * Exibe o formulario de login e loga o usuario no sistema
     * 
     * @access public
     * @author Gustavo Vilas Boas
     * @since 07/2017
     * @param void
     * @return void
     */
    public function login() {
        //verifica se o usuário já está logado
        if(!$this->offline_only('/profile')) return false;
        
        //seta as regras de validação do usuário
        $response['error'] = 'TRUE';
        $response['status'] = "Houve um erro";
        
        //carrega o helper e-mail
        $this->load->helper('email');
        
        //validação do formulário de login
        $this->validate->set_rules('identity_login','identidade','trim|required|min_length[5]|max_length[30]');
        $this->validate->set_rules('password_login','senha','trim|required|alpha_numeric|min_length[8]|max_length[16]');
        
        //se o formulario nao for válido
        if($this->validate->run() !== FALSE) {
        
            //salva as variaveis do form
            $email = $this->input->post('identity_login');
            $senha = $this->input->post('password_login');
            $conect = FALSE;
            
            //verifica se o usuario digitou um email
            if (!valid_email($email)){
                
                //ve se o username digitado existe
                $check = $this->auth->username_check('@'.$email);
                if($check) {
                    $query = $this->db->get_where('users',array('username' => '@'.$email));
                    if ($query->num_rows() > 0) {
					   foreach ($query->result() as $row ) 
						  $email = $row->email;
                    }
                }     
            }
            
            //metodo para login (trocar a linha de baixo e apagar $login = FALSE;)            
            $login = $this->auth->login($email,$senha,FALSE);
            
            //se o login foi efetuado com sucesso
            if($login) {
                redirect(site_url()."profile");
                return false;
            }
            //se não, setar mensagens de erro
            else {
                $response['error'] = 'TRUE';
                $response['status'] = "login não efetuado";
            }
                
        }
        else {
            //seta a mensagem com os erros de validação
            $response['error'] = 'TRUE';
            $response['status'] = validation_errors();  
        }
        
        //carrega o template
        $vars['view']     = "user/login";
        $vars['response'] = $response;
        $this->template->set_title('Entrar no site');;
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    /**
     * Exibe o formulario de registro
     * 
     * @access public
     * @author Gustavo Vilas Boas
     * @since 07/2017
     * @param void
     * @return void
     */
    public function register() {
        //verifica se o usuário já está logado
        if(!$this->offline_only('/user')) return false;
        
        //define erro como true
        $response['error'] = 'TRUE';
        $response['status'] = "Houve um erro";
        
        //seta as regras de validação do formulario
        $this->validate->set_rules('usuario_register','nome de usuário','trim|required|min_length[5]|max_length[30]|is_unique[users.username]');
        $this->validate->set_rules('email_register','e-mail','trim|valid_email|required|is_unique[users.email]');
        $this->validate->set_rules('password_register','senha','trim|required|alpha_numeric|max_length[16]|matches[password_repeat_register]|min_length[8]');
        $this->validate->set_rules('password_repeat_register','confirme a senha','trim|alpha_numeric|max_length[16]|min_length[8]|required');
        
        //testa se o formulário de registro é válido
        if($this->validate->run() !== FALSE) {
            //pega os dados do formulario
            $username = $this->input->post('usuario_register');
            $password = $this->input->post('password_register');
            $email = $this->input->post('email_register');
            $data = array('username' => $username);
            
            //tenta realizar o registro
            $cad = $this->auth->register($email, $password, $email, $data);
            
            //verifica se o registro foi feito com sucesso
            if($cad) {
                //se o registro for feito, ele loga
                $check = $this->auth->login($email, $password, FALSE);
                
                //se o login for feito, define erro como falso
                if($check) {
                    redirect('/user');
                    return false;
                }
                else
                    $response['status'] = 'Houve um erro ao tentar fazer o registro';
            }
            //se não conseguir logar, volta um erro
            else {
                $response['status'] = 'Houve um erro ao tentar fazer o registro';  
            }
            
        }
        //caso o formulario for invalido
        else {
            $response['error'] = 'TRUE';
            //exibe as menssagens de problema com a validação do formulário
            $response['status'] = validation_errors();
        }
        
        $vars['view']     = "user/register";     
        $vars['response'] = $response;   
        $this->template->set_title('Registrar de graça');
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    /**
     * Exibe o formulario de esqueceu senha
     * 
     * @access public
     * @author Gustavo Vilas Boas
     * @since 07/2017
     * @param void
     * @return void
     */
    public function forgot_password(){
        //verifica se o usuário já está logado
        if(!$this->offline_only('/profile')) return false;
        
        $vars['view'] = "user/forgot_password";     
        $this->template->set_title('Esqueci minha senha');
        $this->template->set_lang('pt-br en');
        $this->template->set_vars($vars);
        $this->template->create_page();
    }
    
    /**
     * faz o logout do sistema
     * 
     * @access public
     * @author Gustavo Vilas Boas
     * @since 07/2017
     * @param void
     * @return void
     */
    public function logout() {
        $this->auth->logout();
        redirect('/');
        return false;
    }
    
}