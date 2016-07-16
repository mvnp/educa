<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias_model extends CI_Model {
    
    //variaveis da model
    private $__fields;
    public $__table;
    private $__tableID;
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
        $field["CategoriaInfo"]   = "desc_info";
        
        //define o campo id 
        $this->__tableID = "categoria_id";
        
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
        if($id && (int)$id)
            $sql .= " WHERE ".$this->getField('CategoriaID')." = ".$id." LIMIT 1";
        
        //executa a query
        $retorno = $this->db->query($sql);
        
        //verifica se a busca foi feita com sucesso
        if($retorno)
            return $retorno;
        else 
            return false;
        
    }
    
    //salva os dados no banco
    public function save($dados, $id = false) {
        
        //se id for false, então significa que é uma inserção
        if(!$id) {
            $this->db->insert($this->__table, $dados); 
        } 
        //se id for true, então é um update
        else {
            $this->db->set($dados);
            $this->db->where($this->__tableID, $id);
            $this->db->update($this->__table); 
        }
        
    }
    
    //deleta uma categoria
    public function delete($id){
        $this->db->delete($this->__table, array($this->__tableID => $id)); 
    }
    
}