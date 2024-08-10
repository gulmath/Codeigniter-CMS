<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	
	public $viewFolder ="";

	public function __construct(){
		parent::__construct();
		$this->viewFolder ="product_v";

		
	}
	public function index()
	{
		$this->load->model("product_model");
		$viewData = new StdClass();
		
		/**Veritabanından verilerin getirilmesi */
		$items=$this->product_model->get_all();
		/**View e gönderilecek değişkenlerin set edilmesi */
		$viewData->viewFolder =$this->viewFolder;
		$viewData->subviewFolder="list";
		$viewData->items=$items;
		$this->load->view("{$viewData->viewFolder}/$viewData->subviewFolder/index",$viewData);
	}

}
