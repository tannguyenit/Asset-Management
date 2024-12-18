<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_nuoc extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkuser();
    }

    public function index()
    {
        $arData["arNuoc"] = $this->nuoc_model->get_nuoc();
        $this->load->view('templates/admin/template', $arData);
    }

    public function update()
    {
        if ($this->input->post('update')) {
            $arEdit = $this->input->post();
            $id_nuoc = $this->input->post("id_nuoc");
            $result = $this->nuoc_model->update($arEdit, $id_nuoc);
            if ($result) {
                $arKT = ["msg" => "Sửa thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/nuoc');
            } else {
                $arKT = ["msg" => "Có lỗi khi sửa ", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/nuoc');
            }
        }
    }

    public function add()
    {
        if ($this->input->post('them')) {
            $arAdd = $this->input->post();
            $result = $this->nuoc_model->add($arAdd);
            if ($result) {
                $arKT = ["msg" => "Thêm thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/nuoc');
            } else {
                $arKT = ["msg" => "Có lỗi khi thêm ", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/nuoc');
            }
        }
    }

    public function del($id)
    {
        $name = $this->session->userdata('arsUser')["username"];
        if ($name != "admin") {
            $arKT = ["msg" => "Bạn không phải quyền admin", "kt" => 2];
            $this->session->set_userdata("kt", $arKT);
            redirect('/nuoc');
        } else {
            $arDel = ["id_nuoc" => $id];
            if ($this->nuoc_model->del($arDel)) {
                $arKT = ["msg" => "Xóa thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/nuoc');
            } else {
                $arKT = ["msg" => "Có lỗi khi xóa", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/nuoc');
            }
        }
    }

    public function check_tennuoc()
    {
        if (isset($_POST["tennuoc"])) {
            $tennuoc = trim($_POST["tennuoc"]);
            $arData = $this->nuoc_model->check_tennuoc($tennuoc);
            if (count($arData) > 0) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function edit()
    {
        if (isset($_POST["id"])) {
            $id_nuoc = $_POST["id"];
            $arData["arEdit"] = $this->nuoc_model->edit($id_nuoc);
        }
        $this->load->view('admin/nuoc/edit', $arData);
    }
}

/* End of file Admin_nuoc.php */
/* Location: ./application/controllers/nuoc.php */