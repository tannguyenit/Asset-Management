<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mail_model extends CI_Model
{

    public function mailden()
    {
        $arsUser = $this->session->userdata('arsUser');
        $id_user = $arsUser["id_user"];
        $this->db->select('users.fullname,mail.*');
        $this->db->join('users', 'users.id_user = mail.nguoigui', 'mail');
        $array = [
            'nguoinhan' => $id_user,
        ];
        $this->db->where($array);
        return $this->db->get('mail')->result_array();
    }

    public function thongbaomail()
    {
        $arsUser = $this->session->userdata('arsUser');
        $id_user = $arsUser["id_user"];
        $this->db->select('users.fullname,mail.*');
        $this->db->join('users', 'users.id_user = mail.nguoinhan', 'mail');
        $array = [
            'trangthai' => 0,
            'nguoinhan' => $id_user,
        ];
        $this->db->where($array);
        return $this->db->get('mail')->result_array();
    }

    public function maildi()
    {
        $arsUser = $this->session->userdata('arsUser');
        $id_user = $arsUser["id_user"];
        $this->db->select('users.fullname,mail.*');
        $this->db->join('users', 'users.id_user = mail.nguoigui', 'mail');
        $this->db->where(["nguoigui" => $id_user]);
        return $this->db->get('mail')->result_array();
    }

    public function message()
    {
        $arsUser = $this->session->userdata('arsUser');
        $id_user = $arsUser["id_user"];
        $this->db->select('*');
        $this->db->where(["id_user" => 3, "user_to" => "admin"]);
        return $this->db->get('messages')->result_array();
    }

    public function read($id)
    {
        $this->db->select('users.fullname,mail.*');
        $this->db->join('users', 'users.id_user = mail.nguoigui', 'mail');
        $this->db->where('mail.id_mail', $id);
        return $this->db->get('mail')->row_array();
    }

    public function check_read($id)
    {
        $array = [
            'trangthai' => 1,
        ];
        $arWhere = ['id_mail' => $id];
        $this->db->where($arWhere);
        return $this->db->update('mail', $array);
    }

    public function guiemail($arMail)
    {
        return $this->db->insert('mail', $arMail);
    }

}

/* End of file Mail_model.php */
/* Location: ./application/models/Mail_model.php */