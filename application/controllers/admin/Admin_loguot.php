
<?php

class Admin_loguot extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			if ($this->session->userdata('arsUser')) {
				$this->session->unset_userdata('arsUser');
				redirect("/dang-nhap.html");
			}
		}
		public function index()
		{
			
		}

}


/* End of file Admin_loguot.php */
/* Location: ./application/controllers/admin/Admin_loguot.php */