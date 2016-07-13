<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
    Classe para carregar os pacotes bower do site
*/
class Bower 
{    
    //variavel com a instancia do codeigniter
    protected $CI;
    //caminho para o bower
    private $__path;
    //modules bower encontrados na pasta
    public $__modules = array();
    //modulos padrões
    public $__default = array();
    
    public function __construct() {
        
        //instancia a classe do CodeIgniter dentro na variavel CI da classe
        $this->CI =& get_instance();
        
        //carrega o arquivo de configuração
        $this->CI->config->load('bower');
        $this->__path = $this->CI->config->item("bower_path");
        $this->CI->load->helper('url');
        
        
        //guarda os modulos na variavel __modules
        $this->__loadModules();
    
    }
    
    /**
    * Seta os modulos padrões do bower
    */
    public function set_default($params) {
        //verifica se foi informado apenas um parametro ou todos eles
        $type = gettype($params);
        //se for uma string, cria um array pra armazena-las
        if($type == "string") $params = array($params);
        //salva na variavel global da classe
        $this->__default = $params;
    }
    
    public function get_default_js() {
        
        return $this->get_bower_js($this->__default, $exceptions =  array(), $include_default = true);
        
    }
    
    public function get_default_css() {
        
        return $this->get_bower_css($this->__default, $exceptions =  array(), $include_default = true);
    }
    
    /**
    *
    *
    * Carrega os modulos dentro do path bower e salva no array dos modulos
    *
    *@private
    *
    */
    private function __loadModules() {
        
        //um array com todos os modulos
        $all_modules_names = preg_grep('~[a-z0-9 _-]~', scandir($this->__path));
        
        //percorre todos os modulos encontrados
        foreach($all_modules_names as $module) {
            
            //seta o novo modulo na variavel __modules da classa
            $this->__modules[$module] = array();
            
            //pega o .bower.json do modulo
            $object = $this->__ModuleObject($module);
            //pega o nome de todos os arquivos do modulo
            $module_files = $object->main;
            
            
            //verifica o tipo da variavel $module_files
            $type = gettype($module_files);
            
            //se for uma string, o modulo só possui um arquivo
            if($type == "string") {
                
                //pega a exensão do arquivo
                $extension = $this->_getFileExtension($module_files);
                $key = $extension . "_files";
                
                //salva o arquivo na global modules
                $this->__modules[$module][$key][] = $module_files;
                
            }
            //se for um array, significa que o modulo possui mais de um arquivo a ser carregado
            else if($type == "array") {
                
                foreach($module_files as $file) {
                    
                    //pega a exensão do arquivo
                    $extension = $this->_getFileExtension($file);
                    $key = $extension . "_files";
                
                    $this->__modules[$module][$key][] = $file;
                    
                }    
            }
            
            //se existir de dependencias, salva o nome dela dentro da variavel do modulo
            if(isset($object->dependencies)) {
                $dependencies = $object->dependencies;
                //guarda as dependencias na chave dependencies do modulo
                foreach($dependencies as $key => $dependencie)
                    $this->__modules[$module]["dependencies"][] = $key;
            }
        }
        
    }
    
    /**
    *
    *
    * Pega o arquivo .bower.json do modulo especificado
    *
    *@public
    *@param string $module nome do modulo a ser carregado
    *@return object json do .bower do modulo
    *
    */
    private function __ModuleObject($module) {
        
        $dir = $this->__path.$module."/.bower.json";
        $file = file_get_contents($dir);
        return json_decode($file);
        
    }
    
    /**
    *
    *
    * Retorna a extensão de um arquivo
    *
    *@private
    *@param string $file arquivo para pegar a extensão
    *@return string $extension extensão do arquivo
    *
    */
    private function _getFileExtension($file = false) {
        //verifica se algum parametro foi informado
        if(!$file) return false;
        //separa as partes do arquivo e retorna a extensão
        $parts = explode('.',$file);
        return $parts[count($parts)-1];
        
    }
    
    /**
    *
    *
    * Retorna a tag script de inclusão do modulo informado
    * se for informado uma string, retorna o script para o modulo e suas dependencias  
    * se for informado um array, retorna o script para todos os modulos dentro desse array
    * se não for informado nenhum parametro, retorna o script de todos os modulos no bower component 
    * se forem informadas excessões, carrega todos os modulos menos os informados nas exceptions,
    * ou um array para carregar um grupo de modulos
    *
    *@public
    *@param $mixed module pode ser false para carregar todos os modulos, string para carregar um modulo especifico
    *@return um array com as tags javascript do elemento bower
    *
    */
    public function get_bower_js($module = false, $exceptions =  array(), $include_default = false) {
        
        
        //tags javascript dos modulos carregados
        $modules_tags = array();
        
        //tag do script
        $tag_model = '<script src="'.base_url().$this->__path.'&MODULE_NAME&/&MODULE_PATH&" type="text/javascript"></script>';
        $tag_search = array("&MODULE_NAME&","&MODULE_PATH&");
        
        //ve quais modulos precisao ser carregados e suas dependencias
        $modules_to_load = $this->__getDependenciesTree($module, $exceptions, $include_default);
        
        //percorre todos os modulos que precisa tag
        foreach($modules_to_load as $module) {
            $js_files = (isset($this->__modules[$module]['js_files'])) ? $this->__modules[$module]['js_files'] :  false;
            
            if($js_files)
            {
                foreach($js_files as $file) {
                    $new_itens = array($module,$file);
                    $modules_tags[] = str_replace($tag_search, $new_itens, $tag_model);
                }
            }
        }
        
        return $modules_tags;
        
    }
    
    /**
    *
    *
    * Retorna a tag script de inclusão do modulo informado
    * se for informado uma string, retorna o script para o modulo e suas dependencias  
    * se for informado um array, retorna o script para todos os modulos dentro desse array
    * se não for informado nenhum parametro, retorna o script de todos os modulos no bower component 
    * se forem informadas excessões, carrega todos os modulos menos os informados nas exceptions,
    * ou um array para carregar um grupo de modulos
    *
    *@public
    *@param $mixed module pode ser false para carregar todos os modulos, string para carregar um modulo especifico
    *@return um array com as tags css do elemento bower
    *
    */
    
    public function get_bower_css($module = false, $exceptions = array(),$include_default = false) {
        
        //tags css dos modulos carregados
        $modules_tags = array();
        
        //tag do css
        $tag_model = '<link href="'.base_url().$this->__path.'&MODULE_NAME&/&MODULE_PATH&"'; 
        $tag_model .= ' rel="stylesheet" type="text/css" media="screen">';
        $tag_search = array("&MODULE_NAME&","&MODULE_PATH&");
        
        //modulos que serão carregados e suas dependencias
        $modules_to_load = $this->__getDependenciesTree($module, $exceptions, $include_default);
        
        //percorre todos os modulos que precisa tag
        foreach($modules_to_load as $module) {
            //verifica se o arquivo atual tem um css
            $css_files = (isset($this->__modules[$module]['css_files'])) ? $this->__modules[$module]['css_files'] :  false;
            
            //se tiver, gera as tags css
            if($css_files) {
                foreach($css_files as $file) {
                    $new_itens = array($module,$file);
                    $modules_tags[] = str_replace($tag_search, $new_itens, $tag_model);
                }
            }
        }
        
        //retorna as tags geradas
        return $modules_tags;
    }
   
    /**
    *
    * carrega as dependencias de um modulo
    *
    *@private
    *@param $mixed module pode ser false para carregar todos os modulos, string para carregar um modulo especifico
    *@return um array com as dependencias dos modulos informados
    *
    */
    private function __getDependenciesTree($module = false, $exceptions = array(), $include_default = false) {
        
        //se nenhum modulo for informado, carregar todos
        $module = ($module) ? $module : array_keys($this->__modules); 
        
        //array com os modulos a serem carregados
        $modules_to_load = array();
        
        //tipo do modulo passado
        $type = gettype($module);
        
        //se for pra carregar apenas um modulo
        if($type == "string") {
            
            //seta as dependencias
            $dependencies=(isset($this->__modules[$module]["dependencies"]))?$this->__modules[$module]["dependencies"]: false;
            
            //verifica se existem dependencias
            if($dependencies){
                //carrega as dependencias desse modulo primeiro
                foreach($dependencies as $dependencie)
                   $modules_to_load[] = $dependencie;
                
                //depois carrega o modulo
                $modules_to_load[] = $module;   
            }
            //se nao existir, adiciona o nome do module no array de modulo para carregar
            else {
                $modules_to_load[] = $module;
            }
        }  
        //se for pra carregar mais de um modulo
        else if($type == "array") {
                    
            foreach($module as $module) {
                //seta as dependencias
                $dependencies=(isset($this->__modules[$module]["dependencies"]))?$this->__modules[$module]["dependencies"]: false;

                //verifica se existem dependencias
                if($dependencies){
                    //carrega as dependencias desse modulo primeiro
                    foreach($dependencies as $dependencie)
                       $modules_to_load[] = $dependencie;

                    //depois carrega o modulo
                    $modules_to_load[] = $module;   
                }
                //se nao existir, adiciona o nome do module no array de modulo para carregar
                else {
                    $modules_to_load[] = $module;
                }
            }   
        } 
        
         //tira as entradas repetidas de um array
        $modules_to_load = array_unique($modules_to_load);
        //tira as entradas passadar no parametro exceptions
        $modules_to_load = array_diff($modules_to_load, $exceptions);
        //tira os modulos padroes
        if(!$include_default) $modules_to_load = array_diff($modules_to_load, $this->__default);
        
        return $modules_to_load;
    
    }
    
}