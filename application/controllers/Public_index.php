<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_index extends CI_Controller {

	public function index()
	{
		$this->load->view('index/index');
	}
}

/* End of file Public_index.php */
/* Location: ./application/controllers/Public_index.php */