<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_search extends MY_Controller {

	public function index()
	{
		if (isset($_GET["search"])) {
			$textsearch=$_GET["search"];
			$loai=$_GET["type"];
			if ($loai==2) {
				$arData["arTaisan"]=$this->assets_model->search($textsearch);
				if (count($arData["arTaisan"])>0) {
					$this->load->view('templates/admin/template', $arData);
				}else{
					$this->load->view('/404/index.php');
				}
			}else if($loai==1){
				
				$arData["arNguoidung"]=$this->user_model->search($textsearch);
				if (count($arData["arNguoidung"])>0) {
					$this->load->view('templates/admin/template', $arData);
				}else{
					$this->load->view('/404/index.php');
				}
			}else{
				$this->load->view('/404/index.php');
			}
		}
		
	}

}

/* End of file Admin_search.php */
/* Location: ./application/controllers/admin/Admin_search.php */