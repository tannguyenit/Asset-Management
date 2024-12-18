<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cat_model extends CI_Model
{

    public function getcat()
    {
        $this->db->order_by('id_muctaisancha', 'desc');
        return $this->db->get('muctaisancha')->result_array();
    }

    public function edit($id_cat)
    {
        $this->db->select('*');
        $this->db->from('muctaisan');
        $arWhere = ['id_muctaisan' => $id_cat];
        $this->db->where($arWhere);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function edit_dmcha($id_cat)
    {
        $this->db->select('*');
        $this->db->from('muctaisancha');
        $arWhere = ['id_muctaisancha' => $id_cat];
        $this->db->where($arWhere);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function add_cat($arAdd)
    {
        $array = [
            'tenmuctaisan' => addslashes($arAdd['tendm']),
            'mamuctaisan' => addslashes($arAdd['madm']),
            'id_muctaisancha' => $arAdd['id_dm_cha'],
        ];
        return $this->db->insert('muctaisan', $array);
    }

    public function update($arAdd, $id)
    {
        $array = [
            'tenmuctaisan' => addslashes($arAdd['tendm']),
            'mamuctaisan' => addslashes($arAdd['madm']),
        ];
        $arWhere = ['id_muctaisan' => $id];
        $this->db->where($arWhere);
        return $this->db->update('muctaisan', $array);
    }

    public function del($arDel)
    {
        return $this->db->delete('muctaisan', $arDel);
    }

    public function get_idcat($id_cat)
    {
        $this->db->join('muctaisancha', 'muctaisan.id_muctaisancha = muctaisancha.id_muctaisancha', 'muctaisan');
        $arWhere = ["muctaisan.id_muctaisancha" => $id_cat];
        $this->db->where($arWhere);
        $this->db->order_by('muctaisan.id_muctaisan', 'desc');
        return $this->db->get('muctaisan')->result_array();
    }

    public function get_iddmcha($id_cat)
    {
        $arWhere = ["id_muctaisancha" => $id_cat];
        $this->db->where($arWhere);
        return $this->db->get('muctaisancha')->row_array();
    }

    public function get_dmcha()
    {
        $this->db->order_by('id_muctaisancha', 'desc');
        return $this->db->get('muctaisancha')->result_array();
    }

    public function check_tendm($tendm, $id_dm_cha)
    {
        $this->db->select("*");
        $this->db->from("muctaisan");
        $arWhere = ['tenmuctaisan' => $tendm, "id_muctaisancha" => $id_dm_cha];
        $this->db->where($arWhere);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function check_tendm_edit($tendm, $id_cat, $id_dm_cha)
    {
        $this->db->select("*");
        $this->db->from("muctaisan");
        $arWhere = ['tenmuctaisan' => $tendm, "id_muctaisan!=" => $id_cat, "id_muctaisancha" => $id_dm_cha];
        $this->db->where($arWhere);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function check_tendmcha($tendm)
    {
        $this->db->select("*");
        $this->db->from("muctaisancha");
        $arWhere = ['tenmuctaisancha' => $tendm];
        $this->db->where($arWhere);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function check_tendmcha_edit($tendm, $id_cat)
    {
        $this->db->select("*");
        $this->db->from("muctaisancha");
        $arWhere = ['tenmuctaisancha' => $tendm, "id_muctaisancha!=" => $id_cat];
        $this->db->where($arWhere);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_dmcha($arAdd, $id)
    {
        $array = [
            'tenmuctaisancha' => addslashes($arAdd['tendm']),
            'mamuctaisancha' => addslashes($arAdd['madm']),
        ];
        $arWhere = ['id_muctaisancha' => $id];
        $this->db->where($arWhere);
        return $this->db->update('muctaisancha', $array);
    }

    public function add_dmcha($arAdd)
    {
        $array = [
            'tenmuctaisancha' => addslashes($arAdd['tendm']),
            'mamuctaisancha' => addslashes($arAdd['madm']),
        ];
        return $this->db->insert('muctaisancha', $array);
    }

    public function del_cat_cha($arDel)
    {
        return $this->db->delete('muctaisancha', $arDel);
    }

    public function total_cat()
    {
        return $this->db->count_all_results('muctaisan');
    }

    public function getid_dmcha($id)
    {
        $arWhere = ['id_muctaisancha' => $id];
        $this->db->where($arWhere);
        $query = $this->db->get("muctaisan");
        return $query->result_array();
    }

}

/* End of file Cat_model.php */
/* Location: ./application/models/Cat_model.php */