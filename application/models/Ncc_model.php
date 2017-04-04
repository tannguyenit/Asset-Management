<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ncc_model extends CI_Model {

	public function get_ncc()
	{
		return $this->db->get('nhacungcap')->result_array();
	}
	public function check_tencongty($tencongty)
	{
		$this->db->select("*");
		$this->db->from("nhacungcap");
		$arWhere=array('tencongty'=>$tencongty);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->row_array();
	}
	public function add($arAdd)
	{
		$array=array(
			'macongty'=>addslashes($arAdd['macongty']),
			'tencongty'=>addslashes($arAdd['tencongty']),
			'diachi'=>addslashes($arAdd['diachi']),
			'email'=>addslashes($arAdd['email']),
			'sdt'=>$arAdd['sdt'],
		);
		return $this->db->insert("nhacungcap", $array);
	}
	public function edit($id_ncc)
	{
		$this->db->select('*');
		$this->db->from("nhacungcap");
		$arWhere=array('id_nhacungcap'=>$id_ncc);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->row_array();
	}
	public function update($arEdit,$id_ncc)
	{
		$array=array(
			"macongty"=>addslashes($arEdit["macongty"]),
			"tencongty"=>addslashes($arEdit["tencongty"]),
			"diachi"=>addslashes($arEdit["diachi"]),
			"email"=>addslashes($arEdit["email"]),
			"sdt"=>$arEdit["sdt"],
		);
		$arWhere=array('id_nhacungcap'=>$id_ncc);
		$this->db->where($arWhere);
		return $this->db->update("nhacungcap", $array);
	}
	public function del($arDel)
	{
		return $this->db->delete("nhacungcap",$arDel);
	}
}

/* End of file Ncc_model.php */
/* Location: ./application/models/Ncc_model.php */