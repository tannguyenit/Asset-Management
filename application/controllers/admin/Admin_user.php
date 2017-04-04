<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		checkuser();
	}
	public function index()
	{
		$arData["arKhoa"]=$this->khoa_model->index();
		$arData["arChucvu"]=$this->user_model->chucvu();
		$arData["arUser"]=$this->user_model->index();
		$arData["arHT"]=$this->user_model->findHT();
		$this->load->view('templates/admin/template',$arData);
	}
	public function edit()
	{
		if (isset($_POST["id"])) {
			$id=$_POST["id"];
			$arData["arEdit"]=$this->user_model->edit($id);
		}
		$this->load->view('admin/user/edit_user',$arData);
	}
	public function xem()
	{
		if (isset($_POST["id"])) {
			$id=$_POST["id"];
			$arData["arEdit"]=$this->user_model->edit($id);
		}
		$this->load->view('admin/search/edit_user',$arData);
	}
	public function profile($id_user=1)
	{
		$arData["arUser"]=$this->user_model->profile($id_user);
		$arsUser=$this->session->userdata("arsUser");
		if ($arsUser["chuc_vu"]==4) {
			$this->load->view('templates/admin/template',$arData);
		}else{
			$this->load->view('templates/admin/template',$arData);
		}
		
	}
	
	public function check_user()
	{
		$username=trim($_POST["username"]);
		$arCheck_user=$this->user_model->check_user($username);
		if (count($arCheck_user)>0) {
			echo 1;
		}else{
			echo 0;
		}
	}
	
	public function edit_profile()
	{
		if (isset($_POST["id"])) {
			$id=$_POST["id"];
			$arData["arEdit"]=$this->user_model->edit($id);
		}
		$this->load->view('admin/user/edit_profile',$arData);
	}
	public function del($id)
	{
		$arsUser=$this->session->userdata("arsUser");
		$id_user_del=$arsUser["id_user"];
		$username_del=$arsUser["username"];
		if ($username_del=="admin") {
			if ($id==1) {
				$arKT=array("msg"=>"","kt"=>3);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-nguoi-dung');				
			}
			$arDel=array('id_user'=>$id);
			$arData=$this->user_model->edit($id);
			$picture=$arData["picture"];
			if ($picture != "") {
				$url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$picture;

				if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
					$this->library_file->delete($picture);
				}
			}
			// xóa ảnh
			if ($this->user_model->del($arDel)) {
				$arKT=array("msg"=>"Xóa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-nguoi-dung');
			}else{
				$arKT=array("msg"=>"Có lỗi khi xóa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-nguoi-dung');
			}
		}else{
			if ($id==1) {
				$arKT=array("msg"=>"","kt"=>3);
				$this->session->set_userdata("kt",$arKT);
				redirect('/admin/admin_index/index');				
			}else if ($id_user_del!=$id) {
				$arKT=array("msg"=>"Bạn không có quyền xóa user khác","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-nguoi-dung');
			}else{
				$arDel=array('id_user'=>$id);
				$arData=$this->user_model->edit($id);
				// lấy ảnh để xóa
				$picture=$arData["picture"];
				if ($picture != "") {
					$url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$picture;

					if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
						$this->library_file->delete($picture);
					}
				}
				// xóa ảnh
				if ($this->user_model->del($arDel)) {
					$this->session->unset_userdata('arsUser');
					redirect("/admin/admin_login");
				}else{
					$arKT=array("msg"=>"Có lỗi khi xóa","kt"=>2);
					$this->session->set_userdata("kt",$arKT);
					redirect('/quan-ly-nguoi-dung');
				}
			}
		}
        // ngược lại phân quyền


	}
	public function add()
	{
		if (isset($_POST["them"])) {
			$name_pic=$_FILES["hinhanh"]["name"];
			$filename="";
			if ($name_pic!='') {
				$arPic=$this->library_file->upload_file("hinhanh");
				$filename=$arPic['file_name'];
			}
			$arAdd=$this->input->post();
			$arAdd['hinhanh']=$filename;
			$username=addslashes($this->input->post("username"));
			$result=$this->user_model->add($arAdd);
			if ($result) {
				$arKT=array("msg"=>"Thêm thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-nguoi-dung');
			}else{
				$arKT=array("msg"=>"Có lỗi khi thêm","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-nguoi-dung');
			}
		}
	}
	public function detail_edit($id)
	{
		$arData["arHT"]=$this->user_model->findHT();
		$arData["arEdit"]=$this->user_model->edit($id);
		$arData["arKhoa"]=$this->khoa_model->index();
		$id_khoa=$arData["arEdit"]["id_khoa"];
		$arData["arLop"]=$this->lop_model->getkhoa($id_khoa);
		$arData["arChucvu"]=$this->user_model->chucvu();
		$arData["arUser"]=$this->user_model->index();
		$arData["arHT"]=$this->user_model->findHT();
		$this->load->view('templates/admin/template',$arData);
	}
	public function update()
	{
		$id_login=$this->session->userdata('arsUser')["id_user"];
		if (isset($_POST["update"])) {
			$name_pic=$_FILES["hinhanh2"]["name"];
			$id=$this->input->post("id_user");
			$password=(addslashes($this->input->post("password")));
			$arData=$this->user_model->edit($id);
			$filename=$arData["picture"];//tên file cũ
			if ($name_pic!='') {//tên file mới
				$arPic=$this->library_file->upload_file("hinhanh2");
				$url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$filename;
				if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
					$this->library_file->delete($filename);
				}
				$filename=$arPic['file_name'];
				if ($id==$id_login) {
					$arsUser=$this->session->userdata("arsUser");
					$arsUser["picture"]=$filename;
					$arMoi=$this->session->set_userdata("arsUser",$arsUser);
				}
			}
			if ($password=="") {
				$arAdd=array(
					"id_user"=>$id,
					"fullname"=>$this->input->post("fullname"),
					);
			}else{
				$arAdd=array(
					"id_user"=>$id,
					"fullname"=>$this->input->post("fullname"),
					"password"=>md5($password),
					);
			}
			
			$arAdd['picture']=$filename;
			
			$result=$this->user_model->update($arAdd,$id);
			if ($result) {
				$arKT=array("msg"=>"Sửa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-nguoi-dung');
			}else{
				$arKT=array("msg"=>"Có lỗi khi sửa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-nguoi-dung');
			}
		}
	}
	public function update_edit()
	{
		$id_login=$this->session->userdata('arsUser')["id_user"];
		if (isset($_POST["update"])) {
			$name_pic=$_FILES["hinhanh2"]["name"];
			$id=$this->input->post("id_user");
			$password=(addslashes($this->input->post("password")));
			$arData=$this->user_model->edit($id);
			$filename=$arData["picture"];//tên file cũ
			if ($name_pic!='') {//tên file mới
				$arPic=$this->library_file->upload_file("hinhanh2");
				$url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$filename;
				if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
					$this->library_file->delete($filename);
				}
				$filename=$arPic['file_name'];
				if ($id==$id_login) {
					$arsUser=$this->session->userdata("arsUser");
					$arsUser["picture"]=$filename;
					$arMoi=$this->session->set_userdata("arsUser",$arsUser);
				}
			}$chuc_vu=$this->input->post("chucvu");
			$id_khoa=0;
			$id_lop=0;
			if ($chuc_vu==2) {
				$id_khoa=$this->input->post("khoa");
			}else if ($chuc_vu==3) {
				$id_khoa=$this->input->post("khoa");
				$id_lop=$this->input->post("lop");
			}
			if ($password=="") {
				$arAdd=array(
					"fullname"=>$this->input->post("fullname"),
					"address"=>$this->input->post("diachi"),
					"phone"=>$this->input->post("phone"),
					"chuc_vu"=>$chuc_vu,
					"id_khoa"=>$id_khoa,
					"id_lop"=>$id_lop,
					"fullname"=>$this->input->post("fullname"),
					"fullname"=>$this->input->post("fullname"),
					);
			}else{
				$arAdd=array(
					"fullname"=>$this->input->post("fullname"),
					"address"=>$this->input->post("diachi"),
					"phone"=>$this->input->post("phone"),
					"chuc_vu"=>$chuc_vu,
					"id_khoa"=>$id_khoa,
					"id_lop"=>$id_lop,
					"fullname"=>$this->input->post("fullname"),
					"fullname"=>$this->input->post("fullname"),
					"password"=>md5($password),
					);
			}
			
			$arAdd['picture']=$filename;
			
			$result=$this->user_model->update($arAdd,$id);
			if ($result) {
				$arKT=array("msg"=>"Sửa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-nguoi-dung');
			}else{
				$arKT=array("msg"=>"Có lỗi khi sửa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-nguoi-dung');
			}
		}
	}
	public function update_profile()
	{
		$id_login=$this->session->userdata('arsUser')["id_user"];
		if (isset($_POST["update_profile"])) {
			$name_pic=$_FILES["hinhanh2"]["name"];
			$id=$this->input->post("id_user");
			$password=addslashes($this->input->post("password"));
			$arData=$this->user_model->edit($id);
			$filename=$arData["picture"];//tên file cũ
			if ($name_pic!='') {//tên file mới
				$arPic=$this->library_file->upload_file("hinhanh2");

				$url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/files/admin/".$filename;
				if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
					$this->library_file->delete($filename);
				}
				$filename=$arPic['file_name'];
				if ($id==$id_login) {
					$arsUser=$this->session->userdata("arsUser");
					$arsUser["picture"]=$filename;
					$arMoi=$this->session->set_userdata("arsUser",$arsUser);
				}
			}
			if ($password=="") {
				$arAdd=array(
					"fullname"=>addslashes($this->input->post("fullname")),
					"address"=>addslashes($this->input->post("address")),
					"phone"=>addslashes($this->input->post("phone")),
					"email"=>addslashes($this->input->post("email")),
					"gioithieu"=>addslashes($this->input->post("gioithieu")),
					);
			}else{
				$arAdd=array(
					"fullname"=>addslashes($this->input->post("fullname")),
					"password"=>md5($password),
					"fullname"=>addslashes($this->input->post("fullname")),
					"address"=>addslashes($this->input->post("address")),
					"phone"=>addslashes($this->input->post("phone")),
					"email"=>addslashes($this->input->post("email")),
					"gioithieu"=>addslashes($this->input->post("gioithieu")),
					);
			}
			$arAdd['picture']=$filename;
			$result=$this->user_model->update($arAdd,$id);
			if ($result) {
				$arKT=array("msg"=>"Sửa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/trang-ca-nhan/'.$id);
			}else{
				$arKT=array("msg"=>"Có lỗi khi sửa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/trang-ca-nhan/'.$id);
			}
		}
	}
	public function active()
	{
		if (isset($_POST["id"])) {

			$id=$_POST["id"];
			$is_active=$_POST["is_active"];
			if ($is_active==1) {
				$arAdd=array('active'=>0);
				echo 0;
			}else{
				$arAdd=array('active'=>1);
				echo 1;
			}
			return $this->user_model->is_active($arAdd,$id);

		}
	}
	public function removefile()
	{
		$id=$_POST["id"];
		$name=$_POST["name"];
		$img_upload=FILE_UPLOAD."/upload.png";
		if ($name=='') {
			echo '<img src="'.$img_upload.'" width="349px" height="170px" alt="" style="display:block">';
		}else{
			$url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/file/tmp/".$name;
			if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
				$this->library_file->delete($name);
			}
			$this->user_model->update_img($id);
			
			echo '<img src="'.$img_upload.'" width="349px" height="170px" alt="" style="display:block">';
		}
		
	}



}

/* End of file Admin_user.php */
/* Location: ./application/controllers/admin/Admin_user.php */