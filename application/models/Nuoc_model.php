<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nuoc_model extends CI_Model
{
    public function get_nuoc()
    {
        $this->db->order_by('id_nuoc', 'desc');
        return $this->db->get('nuoc')->result_array();
    }

    public function add($arAdd)
    {
        $array = [
            "manuoc" => addslashes($arAdd["manuoc"]),
            "tennuoc" => addslashes($arAdd["tennuoc"]),
        ];
        return $this->db->insert("nuoc", $array);
    }

    public function del($arDel)
    {
        return $this->db->delete("nuoc", $arDel);
    }

    public function check_tennuoc($tennuoc)
    {
        $this->db->select("*");
        $this->db->from("nuoc");
        $arWhere = ['tennuoc' => $tennuoc];
        $this->db->where($arWhere);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function edit($id_nuoc)
    {
        $this->db->select('*');
        $this->db->from('nuoc');
        $arWhere = ['id_nuoc' => $id_nuoc];
        $this->db->where($arWhere);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update($arEdit, $id_nuoc)
    {
        $array = [
            "manuoc" => addslashes($arEdit["manuoc"]),
            "tennuoc" => addslashes($arEdit["tennuoc"]),
        ];
        $arWhere = ['id_nuoc' => $id_nuoc];
        $this->db->where($arWhere);
        return $this->db->update("nuoc", $array);
    }
}

/* End of file Nuoc_model.php */
/* Location: ./application/models/Nuoc_model.php */