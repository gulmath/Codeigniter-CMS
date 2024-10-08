<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	
	public $viewFolder ="";

	public function __construct(){
		parent::__construct();
		$this->viewFolder ="product_v";
		$this->load->model("product_model");

		
	}
	public function index()
	{
		
		$viewData = new StdClass();
		
		/**Veritabanından verilerin getirilmesi */
		$items=$this->product_model->get_all(array(), "rank ASC");
		/**View e gönderilecek değişkenlerin set edilmesi */
		$viewData->viewFolder =$this->viewFolder;
		$viewData->subviewFolder="list";
		$viewData->items=$items;
		$this->load->view("{$viewData->viewFolder}/$viewData->subviewFolder/index",$viewData);
	}
	public function new_form(){
	
		$viewData = new StdClass();
		$viewData->viewFolder =$this->viewFolder;
		$viewData->subviewFolder="add";
		//$viewData->items=$items;
		$this->load->view("{$viewData->viewFolder}/$viewData->subviewFolder/index",$viewData);

	}
	public function save(){
		$this->load->library("form_validation");
		//Kurallar yazılır..
		$this->form_validation->set_rules("title","Başlık","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);
		//Form validation çalışltırılır
		$validate=$this->form_validation->run();
		//Başarılı ise
		   //Kayıt işlemi başlar
		   //Hata ekranda gösterilir...
		   if ($validate){
			//echo "Kayıt İşlemleri Başlar";
			

						$insert = $this->product_model->add(
							array(
								"title"			=>$this->input->post("title"),
								"description"	=>$this->input->post("description"),
								"url"			=>convertToSEO($this->input->post("title")),
								"rank"			=>0,
								"isActive"		=>1,
								"createdAt"		=>date("Y-m-d H:i:s")
							
							)
						);
						//TODO alert sistemi eklenecek
						if ($insert){
								//echo "Kayıt Başarılı....";
								redirect(base_url("product"));
						} else {
							//echo "Kayıt Hatalı.....";
							redirect(base_url("product"));
						}

		   } else {
				$viewData = new StdClass();
				$viewData->viewFolder =$this->viewFolder;
				$viewData->subviewFolder="add";
				$viewData->form_error =true;
				//$viewData->items=$items;
				$this->load->view("{$viewData->viewFolder}/$viewData->subviewFolder/index",$viewData);
			// echo validation_errors();
			//echo "Birşeyler ters gitti";
		   }
        
    }

	public function update_form($id){

		$viewData = new StdClass();
		$viewData->viewFolder =$this->viewFolder;

		/**Veritabanından verilerin getirilmesi */
		$item=$this->product_model->get(array ("id" =>$id));
		//print_r($item);
		//die();
		$viewData->subviewFolder="update";
		$viewData->item=$item;
		$this->load->view("{$viewData->viewFolder}/$viewData->subviewFolder/index",$viewData);

	}

	public function update($id){
		$this->load->library("form_validation");
		//Kurallar yazılır..
		$this->form_validation->set_rules("title","Başlık","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır"
			)
		);
		//Form validation çalışltırılır
		$validate=$this->form_validation->run();
		//Başarılı ise
		   //Kayıt işlemi başlar
		   //Hata ekranda gösterilir...
		   if ($validate){
			//echo "Kayıt İşlemleri Başlar";
			

						$update = $this->product_model->update(
							array("id"  => $id),
							array(
								"title"			=>$this->input->post("title"),
								"description"	=>$this->input->post("description"),
								"url"			=>convertToSEO($this->input->post("title")),
							)
						);
						//TODO alert sistemi eklenecek
						if ($update){
								//echo "Kayıt Başarılı....";
								redirect(base_url("product"));
						} else {
							//echo "Kayıt Hatalı.....";
							redirect(base_url("product"));
						}

		   } else {
				$viewData = new StdClass();
				$viewData->viewFolder =$this->viewFolder;
				$viewData->subviewFolder="update";
				$viewData->form_error =true;
				$item=$this->product_model->get(array ("id" =>$id));
				$viewData->items=$item;
				$this->load->view("{$viewData->viewFolder}/$viewData->subviewFolder/index",$viewData);
			// echo validation_errors();
			//echo "Birşeyler ters gitti";
		   }
        
    }
	public function delete_form($id){
		
		   $delete = $this->product_model->delete(array("id"  => $id));
						//TODO alert sistemi eklenecek
						if ($delete){
								//echo "Silme Başarılı....";
								redirect(base_url("product"));
						} else {
							//echo "Silme Hatalı.....";
							redirect(base_url("product"));
						}
        
    }

	public function isActiveSetter($id){

		if ($id) {
			//echo $id;
			
			$isActive=($this->input->post("data")=="true"? 1: 0);
			//echo $isActive;
			$update = $this->product_model->update(
				array("id"  => $id),
				array(
					"isActive"			=>$isActive
				)
			);
		
		
		}

		
	}

	public function rankSetter(){
		//	echo 	"test";
			$data=$this->input->post("data");
			//echo $data;
			parse_str($data,$order);
							// print_r($order);
							// Array (  [ord] => Array  (
							// [0] => 2
							// [1] => 1
							// [2] => 3
							// [3] => 6       ) )
			$items=$order["ord"];
			foreach ($items as $rank=>$id) {
				$this->product_model->update(
					array(
						"id"   		=> $id,
						"rank !="	=>$rank
					),
					array("rank"	=>$rank));

			}
	
	}

	public function image_form($id){

		$viewData = new StdClass();
		$viewData->viewFolder =$this->viewFolder;

		/**Veritabanından verilerin getirilmesi */
		$item=$this->product_model->get(array ("id" =>$id));
		//print_r($item);
		//die();
		$viewData->subviewFolder="image";
		$viewData->item=$item;
		$this->load->view("{$viewData->viewFolder}/$viewData->subviewFolder/index",$viewData);

	}
	public function image_upload(){
		$config["allowed_types"]="jpg|jpeg|png";
		$config["upload_path"]="uploads/$this->viewFolder/";

		$this->load->library("upload", $config);

		$upload =$this->upload->do_upload("file");

		if ($upload){
			echo "İşlem Başarılı";
		} else {
			echo "İşlem Başarısız.";
		}
	}

}
