<?php defined('BASEPATH') OR exit('No direct script access allowed');

abstract class MY_Controller extends CI_Controller {
    
    //guarda todos os modulos_template da aplicaçao
    public $_directives;
    public $_modules = array('app',
                             'normalize.css',
                             'roboto');
    
    //informa se o usuario esta logado ou nao
    public $__logged;
    //dados do usuário logado atual
    public $__user;
    
    public function __construct() {
        //pega o construct do pai
        parent::__construct();
        
        //carrega as bibliotecas
        $this->load->library(array("template","bower","ion_auth" => "auth"));
        
        //carrega os modulos bower usados no site
        $this->template->set_modules($this->_modules);
        $this->template->set_lang('pt-br en');
        
        //seta um valor para logged
        $this->__logged = $this->is_logged();
        
        //chama o metodo que salva os dados do usuário na global
        $this->set_user_data();        
    }
    
    /**
     *
     * set_user_data
     *
     * Verifica se o usuario atual está logado e seta os dados desse usuário
     *
     * @access private
     * @author Gustavo Villas Boas
     * @since 07/2016
     * @param void
     * @return bool false se o usuario nao estiver logado ou true se estiver
     */
    private function set_user_data(){
        if(!$this->__logged) {
            $this->__user = false;
        } else {
            $this->__user = $this->auth->user()->row();
        }
    }
    
    /**
     *
     * is_logged
     *
     * Verifica se o usuario atual está logado
     *
     * @access private
     * @author Gustavo Villas Boas
     * @since 07/2016
     * @param void
     * @return bool false se o usuario nao estiver logado ou true se estiver
     */
    private function is_logged() {
        //usa o metodo do ion_auth para verificar se o usuario esta logado
        return $this->auth->logged_in();  
    }
    
    /**
     *
     * is_restrict
     *
     * restringe o acesso a um metodo para um determinado grupo de usuarios
     *
     * @access public
     * @author Gustavo Vilas Boas
     * @since 07/2016
     * @param string $group o nome do grupo cujo acesso é restrito
     * @param string $url url para redicionar caso o usuario nao possua acesso a pagina
     * @return bool
     */
    public function is_restrict($group, $url = "") {
        //verifica se o usuario logado esta no grupo
        $in_group = $this->auth->in_group($group);
        
        //se nao estiver, redireciona até a url passada no parametro
        if(!$in_group) {
            redirect(site_url().$url);
            return false;
        }
        //se estiver, volta true
        else {
            return true;
        }
    }
    
    /**
     * Usada para metodos que só podem ser exibidos para usuários não logados
     * 
     * @access public
     * @author Gustavo Vilas Boas
     * @since 07/2017
     * @param string $url url para onde redirecionar o usuário
     * @return bool 
     */
    public function offline_only($url) {
        if($this->__logged) {
            redirect($url);
            return false;
        }
        return true;
    }
    
    //gera uma tabela 
    public function getDataTable($dados,$campos,$id_tabela, $crud = false,$controller = false, $id_field = false){
        
        //cria o header da tabela
        $html  = "<table id='".$id_tabela."' class='table table-bordered table-striped'>";
        $html .= "<thead>";
        
        //percorre e lista todos os campos
        foreach($campos as $campo)
            $html .= "<th>".$campo."</th>";
        
        //verifica se deve acrescentar os campos de crud
        if($crud && $controller && $id_field)
            $html .= "<th>Editar</th><th>Remover</th>";
        
        
        //cria o corpo da tabela
        $html .= "</thead>";
        $html .="<tbody>";
        
        //coloca o conteudo dentro da tabela
        foreach($dados as $dado) {
            $html .= "<tr>";
            foreach($dado as $item)
                $html .= "<td>".$item."</td>";
                    
            //verifica se deve adicionar os campos do crud
            if($crud && $controller && $id_field) {
                $html .= "<td><a href='".site_url().$controller."/edit/".$dado[$id_field]
                    ."' class='btn btn-info'><span class='glyphicon glyphicon-edit'></a></td>";
                $html .= "<td><a href='".site_url().$controller."/remove/".$dado[$id_field]
                    ."' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></a></td>";
            }
            $html .= "</tr>";
        }
        
        //fecha a tabela
        $html .= "</tbody></table>";
        
        //adiciona 
        $html .= "<script>(function()"."{"."$('#".$id_tabela."').DataTable();})();</script>";
        
        //retorna a tabela gerada
        return $html;
    }
    
}