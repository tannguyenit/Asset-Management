
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('arsUser')) {
			redirect("/admin/admin_index");
		}
	}
	public function index()
	{

		$this->load->view('admin/login/index');
	}
	public function forgot()
	{
		$kt="";
		if ($this->input->post('back_user')) {
			

			$name_forgot=trim($this->input->post("name_forgot"));
			$result1=$this->user_model->login_forgot($name_forgot);
			$id_user=$result1["id_user"];
			$maxacnhan=$result1["maxacnhan"];
			if (count($result1)>0) {
				$this->session->set_userdata('arsForgot',$result1);
				$macapcha=rand(100000,999999999);
				$capcha=$this->user_model->capcha_update($id_user,$macapcha);
				$ci = get_instance();
				$ci->load->library('email');
				$config['protocol'] = "smtp";
				$config['smtp_host'] = "ssl://smtp.gmail.com";
				$config['smtp_port'] = "465";
				$config['smtp_user'] = NAME_MAIL; 
				$config['smtp_pass'] = PASS_MAIL;
				$config['charset'] = "utf-8";
				$config['mailtype'] = "html";
				$config['newline'] = "\r\n";
				$ci->email->initialize($config);

				$ci->email->from(NAME_MAIL, 'For got password');
				$list = array($name_forgot);
				$ci->email->to($list);
					//$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
				$ci->email->subject('Yêu cầu khôi phục mật khẩu');
				$ci->email->message('Bạn vừa yêu cầu khôi phục mật khẩu cho tài khoản'.$result["username"].' trên trang http://tan.vnsmiles.com/ . Nhập mã sau để đặt mật khẩu mới'.$macapcha);
				if ($ci->email->send())
					redirect("../admin/admin_login/re_password");
				else
					$kt="There is error in sending mail!";

					// $this->session->set_userdata('arsUser',$result);
					//redirect("../admin/admin_index ");

			}else{
				$kt="Email bạn vừa nhập không đúng! Vui lòng kiểm tra lại";
					//redirect("../admin/admin_login?kt=Bạn nhập sai tên đăng nhập hoặc pass");
			}
		}
		$arData["kt"]=$kt;
		$this->load->view('/admin/login/forgot',$arData);
	}
	public function login()
	{
		$kt=" ";
		if ($this->input->post('login')) {
			
			$arLogin=array(
				'username'=>trim(addslashes($this->input->post('username'))),
				'password'=>trim(addslashes($this->input->post('password')))
				);
			$username=trim(addslashes($this->input->post('username')));
			$check_user=$this->user_model->check_user($username);
			if (count($check_user)>0) {
					# tồn tại username
				$result=$this->user_model->login($arLogin);
				if (count($result) > 0) {
					$check=$this->user_model->check_active($arLogin);
					if (count($check)>0) {
						$this->session->set_userdata('arsUser',$result);
						redirect("../trang-chu.html");
					}else{
						$arKT=array("msg"=>"Tài khoản của bạn chưa được kích hoạt! Vui lòng đăng nhập vào lúc khác");
						$this->session->set_userdata("kt",$arKT);
						redirect("../dang-nhap.html");
					}
				}else{
					$arKT=array("msg"=>"Bạn nhập sai tên đăng nhập hoặc pass");
					$this->session->set_userdata("kt",$arKT);
					redirect("../dang-nhap.html");
				}
			}else{
				$arKT=array("msg"=>"Bạn chưa có tài khoản! Vui lòng đăng ký");
				$this->session->set_userdata("kt",$arKT);
				redirect("../dang-nhap.html");
			}
		}
		$this->load->view('admin/login/index',$arData);
	}
	
	public function register()
	{

		$arRegister=array(
			'fullname'=>trim(addslashes($this->input->post('fullname'))),
			'password'=>md5(trim(addslashes($this->input->post('password')))),
			'username'=>trim(addslashes($this->input->post('username'))),
			'email'=>trim(addslashes($this->input->post('email'))),
			"chuc_vu"=>4
			);
		
		$arDK= $this->user_model->register($arRegister);
		if (count($arDK)>0) {

			$arKT=array("msg"=>"Đăng ký thành công. Vui lòng chờ được kích hoạt tài khoản");
			$this->session->set_userdata("kt",$arKT);
			redirect("../dang-nhap.html");
		}
		else{
			$arKT=array("msg"=>"Đăng ký thất bại");
			$this->session->set_userdata("kt",$arKT);
			redirect("../dang-nhap.html");
		}



	}
	public function check_user()
	{
		$username=trim($_POST["username"]);
		$arCheck_user=$this->user_model->check_user($username);
		if (count($arCheck_user)>0) {
			//$this->form_validation->set_message('check_user','Tên đăng nhập đã tồn tại ! Vui lòng nhập tên khác');
			echo 1;
		}else{
			echo 0;
		}
	}

}
