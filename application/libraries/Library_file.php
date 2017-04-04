<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library_file {
	public $CI;
		function __construct()
		{
			$this->CI= &get_instance();
		}
	public function upload_file($name)
	{
		$config['upload_path']          = $_SERVER["DOCUMENT_ROOT"].'/assets/files/admin/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 5000;
		$config['max_width']            = 4024;
		$config['max_height']           = 4768;
		$config['encrypt_name']         = true;

		$this->CI->load->library('upload', $config);

			if ( ! $this->CI->upload->do_upload($name))//name input file
			{
				// $error = array('error' => 
				//return $this->CI->upload->display_errors();
				//$this->CI->load->view('upload_form', $error);
			}
			else
			{
				// $data = array('upload_data' => 
				return $this->CI->upload->data();

				//$this->CI->load->view('upload_success', $data);
			}
		}
		public function delete($filename)
		{
			$urlPic=$_SERVER['DOCUMENT_ROOT'].'/assets/file/tmp/'.$filename;
			unlink($urlPic);
		}
	}