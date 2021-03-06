<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategorias_model extends CI_Model {
    
    //variaveis da model
    private $__fields;
    public $__table;
    private $__tableID;
    
    //construct da classe
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->__table = "subcategorias";
        //seta o nome dos campos
        $this->__setFields();
        //carrega a model de categorias
        $this->load->model('categorias_model');
    }
    
    //seta os fields da tabela
    private function __setFields(){
        //seta como vazio
        $fields = array();
        
        //campos e alias
        $field["SubID"]    = "sub_id";
        $field["SubMaeID"] = "categoria_id";
        $field["SubNome"]  = "sub_nome";
        $field["SubDesc"]  = "sub_desc";
        
        //define o campo id 
        $this->__tableID = "sub_id";
        
        //salva na global
        $this->__fields = $field;
    }
    
    //pega o nome de um campo pelo alias
    public function getField($field){
        
        //volta o campo pelo alias informado
        return $this->__fields[$field];
        
    }
    
    //monta os options pro select
    public function maeOptions($id = false){
        $categorias = $this->categorias_model->getCategorias();
        $html = "";
        
        $sub_cat = false;
        
        if($id) {
            $sub     = $this->getSubcategorias($id);
            $sub_cat = $sub->result_array();
            $sub_cat = $sub_cat[0]['desc_nome'];
        }
        
        //percorre todas as categorias e cria o option
        foreach($categorias->result_array() as $categoria){
            
            //verifica se deve adicionar a opçao selected
            if($categoria[$this->categorias_model->getField('Categoria')] === $sub_cat)
                $html .="<option selected='selected' value='".$categoria[$this->categorias_model->getField('CategoriaID')];
            else
                $html .="<option value='".$categoria[$this->categorias_model->getField('CategoriaID')];
            
            $html .="'>".$categoria[$this->categorias_model->getField('Categoria')]."</option>";
        }

        
        return $html;
        
    }
    
    //pega as categorias
    public function getSubcategorias($id = false){
        
        //monta o sql
        $sql  = "SELECT a.sub_id, b.desc_nome ,  a.sub_nome, a.sub_desc FROM ".$this->__table ." a INNER JOIN ".$this->categorias_model->__table;
        $sql .= " b WHERE a.categoria_id = b.categoria_id";
        
        //se algum id for informado
        if($id && (int)$id)
            $sql .= " AND ".$this->getField('SubID')." = ".$id." LIMIT 1";
        
        //executa a query
        $retorno = $this->db->query($sql);
        
        //verifica se a busca foi feita com sucesso
        if($retorno)
            return $retorno;
        else 
            return false;
        
    }
    
    //pega a categoria pelo id
    public function getNameById($id) {
        $this->db->from($this->__table);
        $this->db->select('sub_nome');
        $this->db->where($this->getField('SubID').' = '.$id);
        $this->db->limit(1);
        $result = $this->db->get();
        
        //guarda os dados
        if ($result->num_rows() > 0){
            $query = $result->result_array();
            return $query[0]['sub_nome'];
        }
        else
            return false;
        
    }
    
    //pega as subcategorias pelo id do pai
    public function getByParentID($id = false) {
        
        //se nenhum id for informado, retorna falso
        if(!$id)
            return false;
        
        //busca as categorias
        $query = $this->db->get_where($this->__table, array($this->getField('SubMaeID') => $id));
        
        //se nao existir subcategorias
        if($query->num_rows() == 0)
            return false;
        
        //se existir
        $result = $query->result_array();
        $html = "<option value='' selected>Sub-categoria</option>";
        
        //percorre o array para criar as opcoes
        foreach($result as $item)
            $html .= "<option value='".$item[$this->getField('SubID')]."'>".$item[$this->getField('SubNome')]."</option>";

        //retorna o html gerado
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