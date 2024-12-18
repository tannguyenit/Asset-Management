<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_ncc extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkuser();
    }

    public function index()
    {
        $arData["arNcc"] = $this->ncc_model->get_ncc();
        $this->load->view('templates/admin/template', $arData);
    }

    public function add()
    {
        if ($this->input->post('them')) {
            $arAdd = $this->input->post();
            $result = $this->ncc_model->add($arAdd);
            if ($result) {
                $arKT = ["msg" => "Thêm thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/nha-cung-cap');
            } else {
                $arKT = ["msg" => "Có lỗi khi thêm ", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/nha-cung-cap');
            }
        }
    }

    public function edit_ncc()
    {
        if ($this->input->post('update')) {
            $arEdit = $this->input->post();
            $id_ncc = $this->input->post("id_nhacungcap");
            $result = $this->ncc_model->update($arEdit, $id_ncc);
            if ($result) {
                $arKT = ["msg" => "Sửa thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/nha-cung-cap');
            } else {
                $arKT = ["msg" => "Có lỗi khi sửa ", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/nha-cung-cap');
            }
        }
    }

    public function edit()
    {
        if (isset($_POST["id"])) {
            $id_ncc = $_POST["id"];
            $arData["arEdit"] = $this->ncc_model->edit($id_ncc);
        }
        $this->load->view('admin/ncc/edit', $arData);
    }

    public function del($id)
    {
        $name = $this->session->userdata('arsUser')["username"];
        if ($name != "admin") {
            $arKT = ["msg" => "Bạn không phải quyền admin", "kt" => 2];
            $this->session->set_userdata("kt", $arKT);
            redirect('/nha-cung-cap');
        } else {
            $arDel = ["id_nhacungcap" => $id];
            if ($this->ncc_model->del($arDel)) {
                $arKT = ["msg" => "Xóa thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/nha-cung-cap');
            } else {
                $arKT = ["msg" => "Có lỗi khi xóa", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/nha-cung-cap');
            }
        }
    }

    public function check_tencongty()
    {
        if (isset($_POST["tencongty"])) {
            $tencongty = trim($_POST["tencongty"]);
            $arData = $this->ncc_model->check_tencongty($tencongty);
            if (count($arData) > 0) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

}

/* End of file Admin_ncc.php */
/* Location: ./application/controllers/nha-cung-cap.php */