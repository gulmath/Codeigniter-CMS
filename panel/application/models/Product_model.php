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
    /**Tüm Kayıtları bana getirecek metot */
    public function get_all(){

        return $this->db->get($this->tableName)->result();


    }
}


?>