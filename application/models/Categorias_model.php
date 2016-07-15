<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias_model extends CI_Model {
    
    //variaveis da model
    private $__fields;
    private $__table;
    
    //construct da classe
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->__table = "categorias";
        //seta o nome dos campos
        $this->__setFields();
    }
    
    //seta os fields da tabela
    private function __setFields(){
        //seta como vazio
        $fields = array();
        
        //campos e alias
        $field["CategoriaID"]     = "categoria_id";
        $field["Categoria"]       = "desc_nome";
        $field["CategoriaInfo"]  = "desc_info";
        
        //salva na global
        $this->__fields = $field;
    }
    
    //pega o nome de um campo pelo alias
    public function getField($field){
        
        //volta o campo pelo alias informado
        return $this->__fields[$field];
        
    }
    
    //pega as categorias
    public function getCategorias($id = false){
        
        //monta o sql
        $sql = "SELECT * FROM ".$this->__table;
        
        //se algum id for informado
        if(!$id && (int)$id)
            $sql .= " WHERE ".$this->getField('CategoriaID')." = ".$id;
        
        //executa a query
        return $this->db->query($sql);
        
    }
    
}