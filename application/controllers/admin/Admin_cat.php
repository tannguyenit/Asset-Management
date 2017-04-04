<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_cat extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		checkuser();
	}
	public function cat($id_cat=0)
	{

		$arData["arNameCat"]=$this->cat_model->get_iddmcha($id_cat);
		$arData["arCat"]=$this->cat_model->get_idcat($id_cat);
		$this->load->view('templates/admin/template', $arData);
	}
	public function index()
	{

		$arData["arCat"]=$this->cat_model->get_dmcha();
		$this->load->view('templates/admin/template', $arData);
	}
	public function edit_cat()
	{	
		if (isset($_POST["id"])) {
			$id_cat=$_POST["id"];
			$id_dm_cha=$_POST["id_dm_cha"];
			$arData["id_dm_cha"]=$id_dm_cha;
			$arData["arEdit"]=$this->cat_model->edit($id_cat);
		}
		$this->load->view('admin/cat/edit_cat',$arData);
	}
	public function edit_dmcha()
	{	
		if (isset($_POST["id"])) {
			$id_cat=$_POST["id"];
			$arData["arEdit"]=$this->cat_model->edit_dmcha($id_cat);
		}
		$this->load->view('admin/cat/edit_dmcha',$arData);
	}
	public function add_cat()
	{	
		if ($this->input->post('them')) {
			$arAdd=$this->input->post();
			$id_dm_cha=$this->input->post("id_dm_cha");
			$result=$this->cat_model->add_cat($arAdd);
			if ($result) {
				$arKT=array("msg"=>"Thêm thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_cat/cat/'.$id_dm_cha);
			}else{
				$arKT=array("msg"=>"Có lỗi khi thêm ","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_cat/cat/'.$id_dm_cha);
			}
		}
	}
	public function add_dmcha()
	{	
		if ($this->input->post('them')) {
			$arAdd=$this->input->post();
			$result=$this->cat_model->add_dmcha($arAdd);
			if ($result) {
				$arKT=array("msg"=>"Thêm thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_cat/index');
			}else{
				$arKT=array("msg"=>"Có lỗi khi thêm ","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_cat/index');
			}
		}
	}
	public function update()
	{
		if (isset($_POST["update"])) {
			$arAdd=$this->input->post();
			$id=$this->input->post("id_cat");
			$id_dm_cha=$this->input->post("id_dm_cha");
			$result=$this->cat_model->update($arAdd,$id);
			if ($result) {
				$arKT=array("msg"=>"Sửa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_cat/cat/'.$id_dm_cha);
			}else{
				$arKT=array("msg"=>"Có lỗi khi sửa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_cat/cat/'.$id_dm_cha);
			}
		}
	}
	public function update_dmcha()
	{
		if (isset($_POST["update"])) {
			$arAdd=$this->input->post();
			$id=$this->input->post("id_cat");
			$result=$this->cat_model->update_dmcha($arAdd,$id);
			if ($result) {
				$arKT=array("msg"=>"Sửa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_cat/index');
			}else{
				$arKT=array("msg"=>"Có lỗi khi sửa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_cat/index');
			}
		}
	}
	public function del_cat($id_dm_cha,$id)
	{

		$name=$this->session->userdata('arsUser')["username"];
		if ($name!="admin") {
			$arKT=array("msg"=>"Bạn không phải quyền admin","kt"=>2);
			$this->session->set_userdata("kt",$arKT);
			redirect('/admin/admin_cat/cat/'.$id_dm_cha);
		}else{
			$arDel=array('id_muctaisan'=>$id);
			$arData=$this->device_model->getid_cat($id);
			if (count($arData)>0) {
				foreach ($arData as $key => $value) {
					$this->device_model->del_cat($id);
				}
			}
		//$this->device_model->del_cat($id);
			if ($this->cat_model->del($arDel)) {
				$arKT=array("msg"=>"Xóa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_cat/cat/'.$id_dm_cha);
			}else{
				$arKT=array("msg"=>"Có lỗi khi xóa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_cat/cat/'.$id_dm_cha);
			}
		}
	}
	public function del_cat_cha($id_dm_cha,$id)
	{

		$name=$this->session->userdata('arsUser')["username"];
		if ($name!="admin") {
			$arKT=array("msg"=>"Bạn không phải quyền admin","kt"=>2);
			$this->session->set_userdata("kt",$arKT);
			redirect('/admin/admin_cat/cat/'.$id_dm_cha);
		}else{

			$arDel=array('id_muctaisan'=>$id);
			$arData=$this->device_model->getid_cat($id);
			if (count($arData)>0) {
				foreach ($arData as $key => $value) {
					$this->device_model->del_cat($id);
				}
			}$this->cat_model->del($arDel);
		}
	}
	public function del_dmcha($id)
	{

		$name=$this->session->userdata('arsUser')["username"];
		if ($name!="admin") {
			$arKT=array("msg"=>"Bạn không phải quyền admin","kt"=>2);
			$this->session->set_userdata("kt",$arKT);
			redirect('/quan-ly-danh-muc');
		}else{
			$arDel=array('id_muctaisancha'=>$id);
			$arData=$this->cat_model->getid_dmcha($id);
			if (count($arData)>0) {
				foreach ($arData as $key => $value) {
					$id_muctaisan=$value["id_muctaisan"];
					echo $id_muctaisan;
					$this->del_cat_cha($id,$id_muctaisan);
				}
			}
			if ($this->cat_model->del_cat_cha($arDel)) {
				$arKT=array("msg"=>"Xóa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-danh-muc');
			}else{
				$arKT=array("msg"=>"Có lỗi khi xóa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-danh-muc');
			}
		}
	}
	public function check_tendm()
	{
		if (isset($_POST["namecat"])) {
			$namecat=trim($_POST["namecat"]);
			$id_dm_cha=trim($_POST["id_dm_cha"]);
			$arData=$this->cat_model->check_tendm($namecat,$id_dm_cha);
			if (count($arData)>0) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}
	public function check_tendm_edit()
	{
		if (isset($_POST["namecat"])) {
			$id_cat=trim($_POST["id_cat"]);
			$namecat=trim($_POST["namecat"]);
			$id_dm_cha=$_POST["id_dm_cha"];
			$arData=$this->cat_model->check_tendm_edit($namecat,$id_cat,$id_dm_cha);
			if (count($arData)>0) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}
	public function check_tendmcha()
	{
		if (isset($_POST["namecat"])) {
			$namecat=trim($_POST["namecat"]);
			$arData=$this->cat_model->check_tendmcha($namecat);
			if (count($arData)>0) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}
	public function check_tendmcha_edit()
	{
		if (isset($_POST["namecat"])) {
			$id_cat=$_POST["id_cat"];
			$namecat=trim($_POST["namecat"]);
			$arData=$this->cat_model->check_tendmcha_edit($namecat,$id_cat);
			if (count($arData)>0) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}

}

/* End of file Admin_cat.php */
/* Location: ./application/controllers/admin/Admin_cat.php */