<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_contact extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		checkuser();
	}
	public function index($page=1)
	{
		$offset=($page-1)*ADMIN_ROW_COUNT;
		$config['base_url'] = '/lien-he-nguoi-dung/';
		$config['total_rows'] = $this->user_model->toltal();
		$config['use_page_numbers'] = TRUE;
		$config['uri_segment'] = 2;
		$config['prefix'] = '';
		$config['next_link'] = '>>';
		$config['prev_link'] = '<<';
		$config['suffix'] = '';
		$config['num_links'] = 1;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['per_page'] = ADMIN_ROW_COUNT;
		$this->pagination->initialize($config);
		$pagination=$this->pagination->create_links();
		$arData["pagination"]=$pagination;
		$arData["arUser"]=$this->user_model->lienhe($offset,ADMIN_ROW_COUNT);
		$this->load->view('templates/admin/template', $arData);
	}
	public function mail()
	{
		$arData["arDen"]=$this->mail_model->mailden();
		$arData["arDi"]=$this->mail_model->maildi();
		$arData["arUser"]=$this->user_model->capkhoa();
		$this->load->view('templates/admin/template', $arData);
	}
	public function read($id_mail)
	{
		$arData["arRead"]=$this->mail_model->read($id_mail);
		$this->load->view('templates/admin/template', $arData);
	}
	public function banners()
	{
		$arData["arMessage"]=$this->mail_model->message();
		$this->load->view('admin/contact/banners',$arData);
		//$this->load->view('admin/contact/banners');
	}
	public function reply()
	{
		$id=$_POST["id"];
		$arData["arRep"]=$this->mail_model->read($id);
		$this->load->view('/admin/contact/reply', $arData);
	}
	public function check_read()
	{
		$id=$_POST["id"];
		$this->mail_model->check_read($id);
	}
	
	public function send_mail()
	{
		if ($this->input->post('send')) {
			$arSend=$this->input->post();
			$nguoinhan=addslashes($this->input->post('nguoinhan'));
			$email=$this->user_model->get_nameuser($nguoinhan);
			
			$title_mail=addslashes($this->input->post("title_mail"));
			$message=addslashes($this->input->post('message'));
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$arMail=array(
				"nguoigui"=>addslashes($arSend["nguoigui"]),
				"nguoinhan"=>addslashes($arSend["nguoinhan"]),
				"title_mail"=>addslashes($arSend["title_mail"]),
				"mail_den"=>addslashes($email["email"]),
				"mail_di"=>addslashes($arSend["mail_di"]),
				"content_mail"=>addslashes($arSend["message"]),
				"date"=>date("Y-m-d H:i:s"),
				);
			$result=$this->mail_model->guiemail($arMail);
			
			if ($result) {
				$arKT=array("msg"=>"Gửi mail thành công","kt"=>1);
				$this->session->set_userdata("kt",$arKT);
				redirect('/lien-he-khoa');
			}else{
				$arKT=array("msg"=>"Có lỗi khi gửi mail","kt"=>2);
				$this->session->set_userdata("kt",$arKT);
				redirect('/lien-he-khoa');
			}
		}
		$this->load->view('templates/admin/template', $arData);
	}

}

/* End of file Admin_contact.php */
/* Location: ./application/controllers/admin/Admin_contact.php */