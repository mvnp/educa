<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
    
    //titulo da página
    public $__title = "Página sem titulo";
    
    //metatags
    public $__metatags = array();
    
    //JavaScripts da página
    public $__pageJS = array();
    
    //CSS da página
    public $__pageCSS = array();
    
    //lang
    public $__lang = "pt-br";
    
    //charset
    public $__charset = "UTF-8";
    
    //variaveis PHP da página
    public $__page_vars = array();
    
    //array que será passado para a view
    public $__setpage;
    
    //variavel que guarda instanci do CodeIgniter
    public $CI;
    
    //Metodo construtor de classe
    public function __construct() {
        //instancia a classe do CodeIgniter dentro na variavel CI da classe
        $this->CI =& get_instance();
        //carrega a biblioteca do bower
        $this->CI->load->library('bower');
        //carrega as metatags
        $this->set_metatags();
    }
    
    //seta o titulo da página
    public function set_title($title = false) {
        if(!$title) return false;
        $this->__title = $title;
    }
    
    //seta o charset da página
    public function set_charset($charset = "UTF-8") {
        $this->__charset = $charset;
    }
    
    //seta o charset da página
    public function set_lang($lang = "pt-br") {
        $this->__lang = $lang;
    }
    
    //seta as metatags
    public function set_metatags($metatags = array()) {
        //seta as metatags padrões
        $this->__setpage['metatags'][] = '<meta charset="'.$this->__charset.'">';
        $this->__setpage['metatags'][] = '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
        $this->__setpage['metatags'][] = '<meta name="viewport" content="width=device-width, initial-scale=1">';
        
        //carrega as metatags
        foreach($metatags as $name => $content)
            $this->__setpage['metatags'][] = '<meta name="'.$name.'" content="'.$content.'">';
    }
    
    //seta as var do PHP
    public function set_vars($vars = array()) {
        //guarda as variaveis da view
        $this->__page_vars = array_merge($this->__page_vars, $vars);
    }
    
    //salva os arquivos js e css do metodo bower intalado, usando a biblioteca
    public function set_modules($modules = array()) {
        //guarda na variavel de JS da classe
        $this->__pageJS = array_merge($this->__pageJS,$this->CI->bower->get_bower_js($modules)); 
        //guarda na variavel de CSS da classe
        $this->__pageCSS = array_merge($this->__pageCSS,$this->CI->bower->get_bower_css($modules)); 
    }
    
    //função que chama a view e passa os parametros
    public function create_page() {
        
        //agrupa as variaveis de página para manda-las para a view
        $this->__setpage = array_merge($this->__setpage, $this->__page_vars);
        $this->__setpage['title'] = $this->__title;
        $this->__setpage['page_JS'] = $this->__pageJS;
        $this->__setpage['page_CSS'] = $this->__pageCSS;
        $this->__setpage['page_lang'] = $this->__lang;
        
        //carrega a view
        $this->CI->load->view('index',$this->__setpage);
    }
    
    
}