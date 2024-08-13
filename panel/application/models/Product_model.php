<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product_model extends CI_Model {

    public $tableName="products";

    public function __construct()
    {
        /**bu parent::construct satırı gereksiz... PHP ve Codeigniter versiyonuna göre değişiyor. 
         * yazılması gereksiz. */
      
         //parent::__construct();
      
    }
    public function get($where =array()){
        return $this->db->where($where)->get($this->tableName)->row();
    }
    
    /**Tüm Kayıtları bana getirecek metot */
        public function get_all($where =array(),$order ="id ASC"){

        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();


    }

    public function add($data=array()){
        return $this->db->insert($this->tableName,$data);
    }

    public function update($where =array(),$data=array()){
        return $this->db->where($where)->update($this->tableName,$data);
    }

    public function delete($where =array()){
        return $this->db->where($where)->delete($this->tableName);
    }

}


?>