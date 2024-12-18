<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function get_nhacungcap()
    {
        return $this->db->get('nhacungcap')->result_array();
    }

    public function get_nuoc()
    {
        return $this->db->get('nuoc')->result_array();
    }

}

/* End of file Company_model.php */
/* Location: ./application/models/Company_model.php */