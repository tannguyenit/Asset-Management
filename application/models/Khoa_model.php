<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Khoa_model extends CI_Model {

	public function index()
	{
		return $this->db->get('khoa')->result_array();
	}
	public function get_idkhoa($id_khoa)
	{
		$this->db->select('sotaisan.*,muctaisan.tenmuctaisan,muctaisancha.tenmuctaisancha,lop.name as tenlop');
		$arWhere=array("sotaisan.id_khoa"=>$id_khoa);
		$this->db->where($arWhere);
		$this->db->join('lop', 'sotaisan.id_lop = lop.id_lop', 'left');
		$this->db->join('muctaisan', 'sotaisan.id_muctaisan = muctaisan.id_muctaisan', 'left');
		$this->db->join('muctaisancha', 'muctaisan.id_muctaisancha=muctaisancha.id_muctaisancha', 'left');
		$this->db->order_by('sotaisan.id_khoa', 'desc');
		return $this->db->get("sotaisan")->result_array();
	}
	public function getkhoa()
	{
		$this->db->select('users.id_user,users.email,khoa.name');
		$arWhere=array("users.chuc_vu"=>2);
		$this->db->where($arWhere);
		$this->db->join('khoa', 'khoa.id_khoa=users.id_khoa', 'left');
		return $this->db->get("users")->result_array();
	}
	public function get_namekhoa($id_khoa)
	{
		$arWhere=array("id_khoa"=>$id_khoa);
		$this->db->where($arWhere);
		return $this->db->get("khoa")->row_array();
	}
	public function get_lop($id_khoa)
	{
		$arWhere=array("id_khoa"=>$id_khoa);
		$this->db->where($arWhere);
		return $this->db->get("lop")->result_array();
	}
	public function total_khoa()
	{
		return $this->db->count_all_results('khoa');
	}
	public function check_tenlop($tenlop)
	{
		$this->db->select("*");
		$this->db->from("lop");
		$arWhere=array('name'=>$tenlop);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->row_array();
	}
}

/* End of file Khoa_model.php */
/* Location: ./application/models/Khoa_model.php */