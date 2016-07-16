<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs_model extends CI_Model {
    
    //variaveis da model
    private $__fields;
    private $__table;
    
    //construct da classe
    public function __construct(){
        parent::__construct();
    }
    
    //seta os fields da tabela
    private function __setFields(){
        $fields = array();
        
        $field["JobID"] = "job_id";
        $field["CategoriaID"] = "categoria_id";
        $fields["SubCategoriaID"] ="sub_categoria_id";
    }
    
    //pega o nome de um campo pelo alias
    public function getField($field){
        
    }
    
}