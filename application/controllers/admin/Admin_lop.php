<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_lop extends MY_Controller {

	public function index($id_lop)
	{
		if (!$id_lop) {
			echo '<script>window.location.href="/trang-chu.html"</script>' ; 
		}
		$arsUser=$this->session->userdata("arsUser");
		$id_khoa=$arsUser["id_khoa"];
		if ($this->lop_model->getlopbyidkhoa($id_lop,$id_khoa)) {
			$arData["arName"]=$this->lop_model->getlop($id_lop);
			$arData["arAssets"]=$this->assets_model->get_lop($id_khoa,$id_lop);
			$this->load->view('templates/admin/template', $arData);
		}else{
			redirect('trang-chu.html','refresh');
		}

		
	}

}

/* End of file Admin_lop.php */
/* Location: ./application/controllers/admin/Admin_lop.php */