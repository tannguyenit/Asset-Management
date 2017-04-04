<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_index extends MY_Controller {

public function __construct()
{
	parent::__construct();
	checkuser();
}
	public function index()
	{
		$arData["total_assets"]=$this->assets_model->total_assets();		
		$arData["total_cat"]=$this->cat_model->total_cat();		
		$arData["total_khoa"]=$this->khoa_model->total_khoa();	
		$arData["total_user"]=$this->user_model->toltal();
		$arData["arNguonkinhphi"]=$this->kinhphi_model->get_kinhphi();
		$arData["arThongke"]=$this->assets_model->get_thang();
		for ($i=0; $i < 12 ; $i++) {
			$arData["thang".$i]= $arData["arThongke"][$i]["number_record"]."";
		}
		$this->load->view('templates/admin/template',$arData);
	}

}

/* End of file Admin_index.php */
/* Location: ./application/controllers/admin/Admin_index.php */