<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs_model extends CI_Model {
    
    //variaveis da model
    public $__fields;
    private $__table;
    
    //construct da classe
    public function __construct(){
        parent::__construct();
        
        //define o nome da tabela
        $this->__table = "jobs";
        
        //seta os campos da tabela
        $this->__setFields();
    }
    
    //seta os fields da tabela
    private function __setFields(){
        //array vazio
        $fields = array();
        
        //campos da tabela
        $fields["JobID"]          = "job_id";
        $fields["CategoriaID"]    = "categoria_id";
        $fields["SubCategoriaID"] = "sub_id";
        $fields["Orcamento"]      = "desc_orcamento";
        $fields["Descricao"]      = "desc_descricao";
        $fields["Titulo"]         = "desc_title";
        $fields["Autor"]          = "user_id"; 
        $fields["Status"]         = "flg_status";    
        
        //salva na global
        $this->__fields = $fields;
    }
    
    //pega o nome de um campo pelo alias
    public function getField($field){
        return (isset($this->__fields[$field])) ? $this->__fields[$field] : false;        
    }
    
    //conta quantos registros existem na tabela
    public function record_count() {
        return $this->db->count_all($this->__table);
    }
    
    //faz a paginação dos resultados da tabela
    public function paginate($limit, $start){
        
        //executa a query
        $this->db->limit($limit, $start);
        $this->db->from($this->__table." a");
        $this->db->join('categorias b', 'b.categoria_id = a.categoria_id');
        $this->db->join('subcategorias c', 'c.sub_id = a.sub_id','left');
        
        //verifica se existem filtros
        if($this->session->userdata('filter_cat_principal_id'))
            $this->db->where('a.categoria_id',$this->session->userdata('filter_cat_principal_id'));
        if($this->session->userdata('filter_cat_sec_id'))
            $this->db->where('a.sub_id', $this->session->userdata('filter_cat_sec_id'));
        if($this->session->userdata('filter_desc_orc'))
            $this->db->where('a.desc_orcamento', $this->session->userdata('filter_desc_orc'));
        
        //pega somente os ativos
        $this->db->where('a.flg_status','A');
        
        $query = $this->db->get();
        
        //guarda os dados
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $row->date_pub = date('h:m d-m-Y',strtotime($row->date_pub));
                $data[] = $row;
            }
            return $data;
        }
        return false;
    
    }
        
    
    
    //adiciona um novo pedido de aula
    public function add($dados){
        return $this->db->insert($this->__table, $dados);
    }
    
}