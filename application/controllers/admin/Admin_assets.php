<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_assets extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		checkuser();
	}
	
	public function index()
	{

		$arData["arCat"]=$this->cat_model->get_dmcha();
		$arData["arLoaitaisan"]=$this->device_model->get_loaitaisan();
		$arData["arNguonkinhphi"]=$this->assets_model->get_kinhphi();
		$arData["arNhacungcap"]=$this->company_model->get_nhacungcap();
		$arData["arNuoc"]=$this->company_model->get_nuoc();
		$arData["arAssets"]=$this->assets_model->get_assets();
		$arData["arNguoimua"]=$this->user_model->get_nguoimua();
		$arData["ID"]=$this->assets_model->get_maxid();
		$arData["arKhoa"]=$this->khoa_model->index();
		$this->load->view('templates/admin/template', $arData);
	}
	public function translate_assets()
	{
		$id_user=$this->session->userdata('arsUser')["id_user"];
		$arData["arCat"]=$this->cat_model->get_dmcha();
		$arData["arLoaitaisan"]=$this->device_model->get_loaitaisan();
		$arData["arNguonkinhphi"]=$this->assets_model->get_kinhphi();
		$arData["arNhacungcap"]=$this->company_model->get_nhacungcap();
		$arData["arNuoc"]=$this->company_model->get_nuoc();
		$arData["arAssets"]=$this->assets_model->get_assets();
		$arData["arKhoa"]=$this->khoa_model->index();
		$arData["arUser"]=$this->user_model->get_canbo($id_user);
		$arData["arDieuchuyen"]=$this->assets_model->getdieuchuyen();
		$this->load->view('templates/admin/template', $arData);
	}
	public function danhgia()
	{
		$arData["arCat"]=$this->cat_model->get_dmcha();
		$arData["arLoaitaisan"]=$this->device_model->get_loaitaisan();
		$arData["arNguonkinhphi"]=$this->assets_model->get_kinhphi();
		$arData["arNhacungcap"]=$this->company_model->get_nhacungcap();
		$arData["arNuoc"]=$this->company_model->get_nuoc();
		$arData["arAssets"]=$this->assets_model->get_assets_sao();
		$arData["arKhoa"]=$this->khoa_model->index();
		$this->load->view('templates/admin/template', $arData);
	}
	public function danhgialai()
	{
		
		$arData["arCat"]=$this->cat_model->get_dmcha();
		$arData["arLoaitaisan"]=$this->device_model->get_loaitaisan();
		$arData["arNguonkinhphi"]=$this->assets_model->get_kinhphi();
		$arData["arNhacungcap"]=$this->company_model->get_nhacungcap();
		$arData["arNuoc"]=$this->company_model->get_nuoc();
		$arData["arAssets"]=$this->assets_model->get_assets();
		$arData["arKhoa"]=$this->khoa_model->index();
		$arData["arDanhgia"]=$this->assets_model->get_danhgialai();
		$this->load->view('templates/admin/template', $arData);
	}
	public function detail_danhgialai($id_sotaisan)
	{
		$arsUser=$this->session->userdata("arsUser");
		if ($arsUser["chuc_vu"]==4) {
			$arData["arDetail"]=$this->assets_model->detail($id_sotaisan);
			if (count($arData["arDetail"])>0) {
				$arData["arDetail"]=$this->assets_model->detail($id_sotaisan);
				$this->load->view('templates/admin/template', $arData);
				
			}else{
				redirect('/danh-gia-lai-tai-san.html');
			}
			
		}
	}
	public function thanhlytaisan($id)
	{
		$arData["arDetail"]=$this->assets_model->detail($id);
		if (count($arData["arDetail"])>0) {
			$arData["arKhoa"]=$this->khoa_model->index();
			$this->load->view('templates/admin/template', $arData);
		}else{
			$arKT=array("msg"=>"Tài sản không tồn tại","kt"=>2);
			$this->session->set_userdata("kt",$arKT);
			redirect('/quan-ly-tai-san.html');
		}
	}
	public function thanhly()
	{
		if ($this->input->post('thanhly')) {
			$ngaythanhly= date('Y-m-d', strtotime(str_replace('/', '-', addslashes($this->input->post("ngaythanhly")))));
			$hinhanh=$_FILES["hinhanh"]["name"];
			$soluong=addslashes($this->input->post("soluong"));
			$id=addslashes($this->input->post("id_sotaisan"));
			$arDetail=$this->assets_model->detail($id);
			$tienthanhly=$soluong*$arDetail["don_gia"];
			$soluongupdate=$arDetail["so_luong"]-$soluong;
			$id_kinhphi=addslashes($this->input->post("id_kinhphi"));
			$this->assets_model->update_soluongthanhly($soluongupdate,$id);
			$filename="";
			if ($hinhanh!='') {
				$arPic=$this->library_file->upload_file("hinhanh");
				$filename=$arPic['file_name'];
			}
			$arAdd=array(
				"id_sotaisan"=>addslashes($this->input->post("id_sotaisan")),
				"ngaythanhly"=>$ngaythanhly,
				"id_canbothanhly"=>addslashes($this->input->post("nguoigiao")),
				"soluong"=>addslashes($this->input->post("soluong")),
				"lydo"=>addslashes($this->input->post("lydo")),
				"id_kinhphi"=>$id_kinhphi,
				"tienthanhly"=>$tienthanhly,
				);
			$arAdd["anhminhhoa"]=$filename;
			$arKinhphi=$this->kinhphi_model->get_idkinhphi($id_kinhphi);
			$tongthanhly=$arKinhphi["tong_thanhly"];
			$tienimport=$tongthanhly+$tienthanhly;
			$arTien=array("tong_thanhly"=>$tienimport);
			$this->assets_model->update_tienthanhly($arTien,$id_kinhphi);

			$result=$this->assets_model->addthanhly($arAdd);
			if ($result) {
				$arKT=array("msg"=>"Thanh lý thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/thanh-ly-tai-san.html');
			}else{
				$arKT=array("msg"=>"Có lỗi khi thanh lý ","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/thanh-ly-tai-san.html');
			}
		}
		$arData["arShowthanhly"]=$this->assets_model->show_thanhly();
		$arData["arThanhly"]=$this->assets_model->get_thanhly();
		$this->load->view('templates/admin/template', $arData);
	}
	public function dieuchuyennhieu()
	{
		if ($this->input->post('update')) {
			$ngaynhan= date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post("ngaynhan"))));
			$arDieuchuyen=$this->input->post();
			$arDieuchuyen["ngaynhan"]=$ngaynhan;
			$id=explode(",",addslashes($this->input->post("id_dieuchuyen")));
			$arUpdate=array(
				"id_khoa"=>addslashes($this->input->post("khoanhan"))
				);

			foreach ($id as  $value) {
				$this->assets_model->update_dieuchuyen_assets($arUpdate,$value);
				if ($this->assets_model->get_taisandieuchuyen($value)) {
					$this->assets_model->update_dieuchuyen($arDieuchuyen,$value);
				}else{
					$this->assets_model->insert_dieuchuyen($arDieuchuyen,$value);
				}

			}
			$arKT=array("msg"=>"Điều chuyển thành công","kt"=>1);
			$this->session->set_userdata("kt",$arKT);
			redirect('/dieu-chuyen-tai-san.html');

		}
	}
	public function thanhlynhieu()
	{
		if ($this->input->post('update')) {
			$ngaythanhly= date('Y-m-d', strtotime(str_replace('/', '-',addslashes($this->input->post("ngaythanhly")))));
			$arDieuchuyen=$this->input->post();
			$soluongthanhly=addslashes($this->input->post("soluongthanhly"));

			$arDieuchuyen["ngaythanhly"]=$ngaythanhly;
			$id=explode(",",addslashes($this->input->post("id_dieuchuyen")));


			foreach ($id as  $value) {
				$arDetail=$this->assets_model->detail($value);
				if ($soluongthanhly==1) {
					$arUpdate=array(
						"so_luong"=>0
						);
					$this->assets_model->update_dieuchuyen_assets($arUpdate,$value);
					$arDieuchuyen["id_kinhphi"]=$arDetail["id_kinhphi"];
					$arDieuchuyen["soluong"]=$arDetail["so_luong"];
					$arDieuchuyen["don_gia"]=$arDetail["don_gia"];
					$soluongimport=$arDetail["so_luong"];
					$arDieuchuyen["tienthanhly"]=$soluongimport*$arDetail["don_gia"];
					$arDieuchuyen["soluongimport"]=$soluongimport;
					$this->assets_model->insert_thanhly($arDieuchuyen,$value);
				}else{
					$arUpdate=array(
						"so_luong"=>number_format($arDetail["so_luong"]/2,0)
						);
					$this->assets_model->update_dieuchuyen_assets($arUpdate,$value);
					$arDieuchuyen["id_kinhphi"]=$arDetail["id_kinhphi"];
					$arDieuchuyen["soluong"]=$arDetail["so_luong"];
					$soluongimport=$arDetail["so_luong"]-number_format($arDetail["so_luong"]/2,0);
					$arDieuchuyen["tienthanhly"]=$soluongimport*$arDetail["don_gia"];
					$arDieuchuyen["soluongimport"]=$soluongimport;
					$this->assets_model->insert_thanhly($arDieuchuyen,$value);
				}
			}
			$arKT=array("msg"=>"Thanh lý thành công","kt"=>1);
			$this->session->set_userdata("kt",$arKT);
			redirect('/thanh-ly-tai-san.html');

		}
	}
	public function xoanhieu()
	{

		$name=$this->session->userdata('arsUser')["username"];
		if ($name!="admin") {
			$arKT=array("msg"=>"Bạn không phải quyền admin","kt"=>2);
			$this->session->set_userdata("kt",$arKT);
			redirect('/quan-ly-tai-san.html');
		}else{
			if (isset($_POST["id"])) {
				$idtaisan=$_POST["id"];
				for($i=0;$i<count($idtaisan);$i++){
					$arDel=array('id_sotaisan'=>$idtaisan[$i]);	
					$this->assets_model->del($arDel);
				}
				$arKT=array("msg"=>"Xóa thành công ","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-tai-san.html');

			}
		}
		
	}
	public function thongke()
	{
		$arData["arCat"]=$this->cat_model->get_dmcha();
		$arData["arLoaitaisan"]=$this->device_model->get_loaitaisan();
		$arData["arNguonkinhphi"]=$this->assets_model->get_kinhphi();
		$arData["arNhacungcap"]=$this->company_model->get_nhacungcap();
		$arData["arNuoc"]=$this->company_model->get_nuoc();
		$arData["arAssets"]=$this->assets_model->get_assets();
		$arData["arKhoa"]=$this->khoa_model->index();
		$this->load->view('templates/admin/template', $arData);
	}
	public function detail($id)
	{
		$arData["arDetail"]=$this->assets_model->detail($id);
		if (count($arData["arDetail"])>0) {
			$arData["arCat"]=$this->cat_model->get_dmcha();
			$arData["arLoaitaisan"]=$this->assets_model->get_loaitaisan();
			$arData["arNguonkinhphi"]=$this->assets_model->get_kinhphi();
			$arData["arNhacungcap"]=$this->company_model->get_nhacungcap();
			$arData["arNuoc"]=$this->company_model->get_nuoc();
			$id_khoa=$arData["arDetail"]["id_khoa"];
			$id_muctaisancha=$arData["arDetail"]["id_muctaisancha"];
			$arData["arLop"]=$this->lop_model->get_lopby_idkhoa($id_khoa);
			$arData["arNguoimua"]=$this->user_model->get_nguoimua();
			$arData["arMuctaisan"]=$this->assets_model->get_muctaisan($id_muctaisancha);
			$arData["arKhoa"]=$this->khoa_model->index();

			$this->load->view('templates/admin/template', $arData);
		}else{
			$arKT=array("msg"=>"Tài sản không tồn tại","kt"=>2);
			$this->session->set_userdata("kt",$arKT);
			redirect('/quan-ly-tai-san.html');
		}

	}
	public function translate($id)
	{	
		$id_user=$this->session->userdata('arsUser')["id_user"];
		$arData["arDetail"]=$this->assets_model->detail($id);
		if (count($arData["arDetail"])>0) {
			$arData["arKhoa"]=$this->khoa_model->index();
			$arData["arUser"]=$this->user_model->get_canbo($id_user);
			$this->load->view('templates/admin/template', $arData);
		}else{
			$arKT=array("msg"=>"Tài sản không tồn tại","kt"=>2);
			$this->session->set_userdata("kt",$arKT);
			redirect('/quan-ly-tai-san.html');
		}

	}
	public function get_idloaidanhmuc()
	{
		# code...
		if (isset($_POST["idloaitaisan"])) {
			$idloaitaisan=$_POST["idloaitaisan"];
			$arData=$this->device_model->get_muctaisan($idloaitaisan);
			echo "<option></option>";
			foreach ($arData as $key => $value) {?>
			<option value="<?php echo $value['id_muctaisan']?>"><?php echo $value["tenmuctaisan"]?></option>
			<?php } 
		}
	}
	public function danhgiataisan()
	{

		if (isset($_POST["id"])) {
			$id=$_POST["id"];
			$id_user=$_POST["id_user"];
			$star=$_POST["star"];
			$arDanhgia=$this->assets_model->danhgiasao($id,$id_user);
			if (count($arDanhgia)>0) {
				$this->assets_model->danhgialaisao($id,$id_user,$star);
			}else{
				$this->assets_model->danhgiamoisao($id,$id_user,$star);
			}
			$arGetsao=$this->assets_model->getsao($id,$id_user);
			$star=0;
			foreach ($arGetsao as $key => $value) {
				$star=$star+$value["star"];
				$id_sotaisan=$value["id_sotaisan"];
			}
			$saotong=number_format(($star/count($arGetsao)),1,".","");
			$this->assets_model->danhgiatongsao($id_sotaisan,$saotong);
		}
	}
	public function get_idkhoa()
	{
		# code...
		if (isset($_POST["idkhoa"])) {
			$idkhoa=$_POST["idkhoa"];
			$arData=$this->lop_model->get_lopby_idkhoa($idkhoa);
			echo "<option></option>";
			foreach ($arData as $key => $value) {?>
			<option value="<?php echo $value['id_lop']?>"><?php echo $value["name"]?></option>
			<?php } 
		}
	}
	public function edit()
	{	
		if (isset($_POST["id"])) {
			$id=$_POST["id"];
			$arData["arEdit"]=$this->assets_model->edit($id);
		}
		$this->load->view('admin/assets/edit',$arData);
	}
	public function showdanhgia()
	{	
		if (isset($_POST["id"])) {
			$id=$_POST["id"];
			$arData["arShowdanhgia"]=$this->assets_model->show_danhgia($id);
		}
		$this->load->view('admin/assets/hienthidanhgia',$arData);
	}
	public function add_assets()
	{	
		if ($this->input->post('them')) {
			$arAdd=$this->input->post();
			$arAdd["ngaymuaimport"]= date('Y-m-d', strtotime(str_replace('/', '-', addslashes($this->input->post("ngaymua")))));
			$arAdd["thang"]= date('m', strtotime(str_replace('/', '-', addslashes($this->input->post("ngaymua")))));
			$id=$arAdd["nguonkinhphi"];
			$result=$this->assets_model->add_assets($arAdd);
			if ($result) {
				$arNguonkinhphi=$this->kinhphi_model->get_idkinhphi($id);
				$tongtienmua=$arAdd["dongia"]*$arAdd["soluong"];

				$tong_chi=$arNguonkinhphi["tong_chi"];
				$arUpdate=array(
					"tong_chi"=>$tong_chi+$tongtienmua,
					);
				$this->kinhphi_model->update_kinhphi($arUpdate,$id);
				$arKT=array("msg"=>"Thêm thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-tai-san.html');
			}else{
				$arKT=array("msg"=>"Có lỗi khi thêm ","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-tai-san.html');
			}
		}
	}
	public function adddanhgialai()
	{	

		if ($this->input->post('themdanhgia')) {
			$arAdd=$this->input->post();
			$arAdd["ngaydanhgiaimport"]= date('Y-m-d', strtotime(str_replace('/', '-', addslashes($this->input->post("ngaydanhgia")))));
			$result=$this->assets_model->adddanhgialai($arAdd);
			if ($result) {
				$arKT=array("msg"=>"Đánh giá thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/danh-gia-lai-tai-san.html');
			}else{
				$arKT=array("msg"=>"Có lỗi khi đánh giá ","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/danh-gia-lai-tai-san.html');
			}
		}
	}
	public function update($id)
	{	
		if ($this->input->post('update')) {
			$arAdd=$this->input->post();
			$arAdd["ngaymuaimport"]= date('Y-m-d', strtotime(str_replace('/', '-', addslashes($this->input->post("ngaymua")))));
			$result=$this->assets_model->update($arAdd,$id);
			if ($result) {
				$arKT=array("msg"=>"Thêm thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-tai-san.html');
			}else{
				$arKT=array("msg"=>"Có lỗi khi thêm ","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-tai-san.html');
			}
		}
	}
	public function chuyen()
	{	
		if ($this->input->post("chuyen")) {
			$arAdd=$this->input->post();
			$arAdd["ngaynhan"]= date('Y-m-d', strtotime(str_replace('/', '-', addslashes($this->input->post("ngaynhan")))));
			$result=$this->assets_model->chuyen($arAdd);
			if ($result) {
				$arKT=array("msg"=>"Điều chuyển thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/dieu-chuyen-tai-san.html');
			}else{
				$arKT=array("msg"=>"Có lỗi khi điều chuyển ","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/dieu-chuyen-tai-san.html');
			}
		}
	}
	public function del($id)
	{
		$name=$this->session->userdata('arsUser')["username"];
		if ($name!="admin") {
			$arKT=array("msg"=>"Bạn không phải quyền admin","kt"=>2);
			$this->session->set_userdata("kt",$arKT);
			redirect('/quan-ly-tai-san.html');
		}else{
			$arDel=array('id_sotaisan'=>$id);		
			if ($this->assets_model->del($arDel)) {
				$arKT=array("msg"=>"Xóa thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-tai-san.html');
			}else{
				$arKT=array("msg"=>"Có lỗi khi xóa","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/quan-ly-tai-san.html');
			}
		}
	}
	public function check_tentaisan()
	{
		if (isset($_POST["tentaisan"])) {
			$tentaisan=trim($_POST["tentaisan"]);
			$arData=$this->assets_model->check_tentaisan($tentaisan);
			if (count($arData)>0) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}
	public function active()
	{
		if (isset($_POST["id"])) {
			$id=$_POST["id"];
			$is_active=$_POST["is_active"];
			if ($is_active==1) {
				$arAdd=array('tinhtrang'=>0);
				echo 0;
			}else{
				$arAdd=array('tinhtrang'=>1);
				echo 1;
			}
			return $this->assets_model->is_active($arAdd,$id);

		}
	}


}

/* End of file Admin_assets */
/* Location: ./application/controllers/admin/Admin_assets */