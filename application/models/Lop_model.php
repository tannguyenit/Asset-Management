<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lop_model extends CI_Model
{

    public function getkhoa($id_khoa)
    {
        $arWhere = ["id_khoa" => $id_khoa];
        $this->db->where($arWhere);
        return $this->db->get('lop')->result_array();
    }

    public function getlop($id_lop)
    {
        $arWhere = ["id_lop" => $id_lop];
        $this->db->where($arWhere);
        return $this->db->get('lop')->row_array();
    }

    public function get_lopby_idkhoa($id_khoa)
    {
        $arWhere = ["id_khoa" => $id_khoa];
        $this->db->where($arWhere);
        return $this->db->get('lop')->result_array();
    }

    public function getlopbyidkhoa($id_lop, $id_khoa)
    {
        $arWhere = ["id_khoa" => $id_khoa, "id_lop" => $id_lop];
        $this->db->where($arWhere);
        return $this->db->get('lop')->row_array();
    }

    public function add_lop($arAdd)
    {
        $array = [
            'name' => addslashes($arAdd['tenlop']),
            'id_khoa' => $arAdd['id_khoa'],
        ];
        return $this->db->insert('lop', $array);
    }

    public function del_lop($id)
    {
        $arWhere = ['id_lop' => $id];
        return $this->db->delete('lop', $arWhere);
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('lop');
        $arWhere = ['id_lop' => $id];
        $this->db->where($arWhere);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update($arAdd, $id)
    {
        $array = [
            'name' => $arAdd['tenlop'],
        ];
        $arWhere = ['id_lop' => $id];
        $this->db->where($arWhere);
        return $this->db->update('lop', $array);
    }

}

/* End of file Lop_model.php */
/* Location: ./application/models/Lop_model.php */