<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $viewFolder ="";
	public function __construct(){
		parent::__construct();
		$this->viewFolder ="product_v";
	}
	public function index()
	{
		$viewData = new StdClass();
		$viewData->viewFolder =$this->viewFolder;
		$viewData->subviewFolder="list";
		$this->load->view("{$viewData->viewFolder}/$viewData->subviewFolder/index",$viewData);
	}

}
