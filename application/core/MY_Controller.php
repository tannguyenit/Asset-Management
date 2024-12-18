<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_controller extends CI_Controller
{
    public $arKhoa;
    public $arLop;
    public $arLopofKhoa;
    public $arCat;
    public $arMessage;
    public $arBosungKP;

    public function __construct()
    {
        parent::__construct();
        $id_khoa = $this->session->userdata('arsUser')["id_khoa"];
        $id_lop = $this->session->userdata('arsUser')["id_lop"];
        $this->arKhoa = $this->khoa_model->index();
        $this->arLop = $this->lop_model->getkhoa($id_khoa);
        $this->arCat = $this->cat_model->getcat();
        $this->arMessage = $this->mail_model->thongbaomail();
        $this->arBosungKP = $this->kinhphi_model->bosung();
        $this->arLopofKhoa[] = $this->lop_model->getlop($id_lop);

    }
}

/* End of file MY_controller.php */
/* Location: ./application/core/MY_controller.php */