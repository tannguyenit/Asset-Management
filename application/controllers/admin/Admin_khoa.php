<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_khoa extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkuser();
    }

    public function index($id_khoa)
    {
        if (!$id_khoa) {
            echo '<script>window.location.href="/admin/admin_index"</script>';
        }
        $arData["arKhoa"] = $this->khoa_model->get_idkhoa($id_khoa);
        $arData["arName"] = $this->khoa_model->get_namekhoa($id_khoa);
        $arData["arLop"] = $this->lop_model->get_lopby_idkhoa($id_khoa);
        $this->load->view('templates/admin/template', $arData);
    }

    public function add_lop()
    {
        if ($this->input->post('them')) {
            $arAdd = $this->input->post();
            $id_khoa = addslashes($this->input->post("id_khoa"));
            $result = $this->lop_model->add_lop($arAdd);
            if ($result) {
                $arKT = ["msg" => "Thêm thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_khoa/index/' . $id_khoa);
            } else {
                $arKT = ["msg" => "Có lỗi khi thêm ", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_khoa/index/' . $id_khoa);
            }
        }
    }

    public function check_tenlop()
    {
        if (isset($_POST["tenlop"])) {
            $tenlop = trim($_POST["tenlop"]);
            $arData = $this->khoa_model->check_tenlop($tenlop);
            if (count($arData) > 0) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function del_lop($id)
    {
        $name = $this->session->userdata('arsUser')["username"];
        if ($name != "admin") {
            $arKT = ["msg" => "Bạn không phải quyền admin", "kt" => 2];
            $this->session->set_userdata("kt", $arKT);
            redirect('/admin/admin_khoa/index/' . $id);
        } else {
            $arDel = ['id_lop' => $id];
            if ($this->lop_model->del_lop($id)) {
                $arKT = ["msg" => "Xóa thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_khoa/index/' . $id);
            } else {
                $arKT = ["msg" => "Có lỗi khi xóa", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_khoa/index/' . $id);
            }
        }
    }

    public function edit()
    {
        if (isset($_POST["id"])) {
            $id_lop = $_POST["id"];
            $arData["arEdit"] = $this->lop_model->edit($id_lop);
        }
        $this->load->view('admin/khoa/edit', $arData);
    }

    public function update_lop()
    {
        if (isset($_POST["update"])) {
            $arAdd = $this->input->post();
            $id = $this->input->post("id_khoa");
            $id_lop = $this->input->post("id_lop");
            $result = $this->lop_model->update($arAdd, $id_lop);
            if ($result) {
                $arKT = ["msg" => "Sửa thành công", "kt" => 1];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_khoa/index/' . $id);
            } else {
                $arKT = ["msg" => "Có lỗi khi sửa", "kt" => 2];
                $this->session->set_userdata("kt", $arKT);
                redirect('/admin/admin_khoa/index/' . $id);
            }
        }
    }

}

/* End of file Admin_khoa.php */
/* Location: ./application/controllers/admin/Admin_khoa.php */