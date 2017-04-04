<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_kinhphi extends MY_Controller {

	
	public function __construct()
	{
		parent::__construct();
		checkuser();
	}
	
	public function index()
	{
		$arData["arKinhphi"]=$this->kinhphi_model->get_kinhphi();
		$this->load->view('templates/admin/template', $arData);
	}
	public function update()
	{	
		if ($this->input->post('update')) {
			$arAdd=$this->input->post();
			$id_nguonkinhphi=addslashes($this->input->post("nguonkinhphi"));
			$arAdd["tien_themmoi"]=addslashes($this->input->post("tong_tien"));
			$result=$this->kinhphi_model->update($arAdd);
			if ($result) {
				$arKT=array("msg"=>"Bổ sung kinh phí thành công. Vui lòng chờ quản trị xét duyệt","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/nguon-kinh-phi');
			}else{
				$arKT=array("msg"=>"Có lỗi khi bổ sung ","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/nguon-kinh-phi');
			}
		}
	}
	public function update_nguonkinhphi()
	{	
		if ($this->input->post('update')) {
			$arAdd=$this->input->post();
			$id_nguonkinhphi=$this->input->post("id_nguonkinhphi");
			$result=$this->kinhphi_model->update_nguonkinhphi($arAdd,$id_nguonkinhphi);
			if ($result) {
				$arKT=array("msg"=>"Bổ sung kinh phí thành công.","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/nguon-kinh-phi');
			}else{
				$arKT=array("msg"=>"Có lỗi khi bổ sung ","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/nguon-kinh-phi');
			}
		}
	}
	public function add()
	{	
		if ($this->input->post('them')) {
			$arAdd=$this->input->post();
			$result=$this->kinhphi_model->add($arAdd);
			if ($result) {
				$arKT=array("msg"=>"Thêm thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/nguon-kinh-phi');
			}else{
				$arKT=array("msg"=>"Có lỗi khi thêm ","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/nguon-kinh-phi');
			}
		}
	}
	public function check_tennguonkinhphi()
	{
		if (isset($_POST["tennguonkinhphi"])) {
			$tennguonkinhphi=trim($_POST["tennguonkinhphi"]);
			$arData=$this->kinhphi_model->check_tennguonkinhphi($tennguonkinhphi);
			if (count($arData)>0) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}
	public function check_kinhphi()
	{
		$id=$_POST["id"];
		$arKinhphi=$this->kinhphi_model->get_idkinhphi($id);
		$tongtien=$arKinhphi["tong_tien"]+$arKinhphi["tien_themmoi"];
		$this->kinhphi_model->check_kinhphi($id,$tongtien);
	}
	public function huy_kinhphi()
	{
		$id=$_POST["id"];
		$this->kinhphi_model->huy_kinhphi($id);
	}
	public function edit()
	{	
		if (isset($_POST["id"])) {
			$id=$_POST["id"];
			$arData["arEdit"]=$this->kinhphi_model->edit($id);
		}
		$this->load->view('admin/kinhphi/edit',$arData);
	}
	public function del($id)
	{
		$name=$this->session->userdata('arsUser')["username"];
		if ($name!="admin") {
			$arKT=array("msg"=>"Bạn không phải quyền admin","kt"=>2);
			$this->session->set_userdata("kt",$arKT);
			redirect('/nguon-kinh-phi/');
		}else{
		$arDel=array('id_nguontaisan'=>$id);
		if ($this->kinhphi_model->del($arDel)) {
			$arKT=array("msg"=>"Xóa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
			redirect('/nguon-kinh-phi/');
		}else{
			$arKT=array("msg"=>"Có lỗi khi xóa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
			redirect('/nguon-kinh-phi/');
		}
}
	}
	public function check_soluong()
	{
		if (isset($_POST["tongtien"])) {
			$tongtien=$_POST["tongtien"];
			$id=$_POST["nguonkinhphi"];
			$arData=$this->kinhphi_model->get_idkinhphi($id);
			if ($arData["tong_tien"]>$tongtien) {
				echo 0;
			}else{
				echo 1;
			}
		}
	}
}

/* End of file Admin_kinhphi.php */
/* Location: ./application/controllers/admin/Admin_kinhphi.php */