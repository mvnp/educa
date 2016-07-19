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
    
    //pega a categoria pelo id
    public function getNameById($id) {
        $this->db->from($this->__table);
        $this->db->select('desc_nome');
        $this->db->where($this->getField('CategoriaID').' = '.$id);
        $this->db->limit(1);
        $result = $this->db->get();
        
        //guarda os dados
        if ($result->num_rows() > 0){
            $query = $result->result_array();
            return $query[0]['desc_nome'];
        }
        else
            return false;
        
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
    
    //pega os options para o select
    public function getOptions(){
        
        //pega todas as categorias
        $categorias = $this->getCategorias();
        
        //se nenhum categoria for encontrada, retorna false
        if($categorias->num_rows() == 0)
            return false;
        
        //pega o array de resposta
        $categorias = $categorias->result_array();
        
        //html de retorno
        $html = "<option value='' disabled selected>Selecione uma categoria</option>";
        
        //adiciona os options no html
        foreach($categorias as $categoria) {
            $html .= "<option value='".$categoria[$this->getField('CategoriaID')]."'>".$categoria[$this->getField('Categoria')]."</option>";
        }
        
        return $html;
        
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