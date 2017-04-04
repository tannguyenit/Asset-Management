<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kinhphi_model extends CI_Model {
	
	public function get_kinhphi()
	{
		return $this->db->get('nguonkinhphi')->result_array();
	}
	public function get_idkinhphi($id)
	{
		$arWhere=array(
			'id_nguonkinhphi'=>$id,
			);
		$this->db->where($arWhere);
		return $this->db->get('nguonkinhphi')->row_array();
	}
	public function get_tongtien($id_nguonkinhphi)
	{
		$arWhere=array(
			'id_nguonkinhphi'=>$id_nguonkinhphi,
			);
		$this->db->where($arWhere);
		$nguonkinhphi= $this->db->get('nguonkinhphi')->row_array();
		return $nguonkinhphi["tong_tien"];
	}
	public function update($arAdd)
	{
		$arWhere=array(
			'id_nguonkinhphi'=>$arAdd['nguonkinhphi'],
			);
		$array=array(
			'tien_themmoi'=>$arAdd["tien_themmoi"],
			'trangthai'=>0,
		);
		$this->db->where($arWhere);
		return $this->db->update('nguonkinhphi', $array);
	}
	public function update_kinhphi($arUpdate,$id)
	{
		$arWhere=array(
			'id_nguonkinhphi'=>$id,
			);
		$this->db->where($arWhere);
		return $this->db->update('nguonkinhphi', $arUpdate);
	}
	public function update_nguonkinhphi($arAdd,$id)
	{
		$arWhere=array(
			'id_nguonkinhphi'=>$id,
			);
		$array=array(
			'manguonkinhphi'=>$arAdd['manguonkinhphi'],
			'tennguonkinhphi'=>$arAdd['tennguonkinhphi'],
		);
		$this->db->where($arWhere);
		return $this->db->update('nguonkinhphi', $array);
	}
	public function check_kinhphi($id,$tongtien)
	{
		$arWhere=array(
			'id_nguonkinhphi'=>$id,
			);
		$array=array(
			'tong_tien'=>$tongtien,
			'trangthai'=>1,
		);
		$this->db->where($arWhere);
		return $this->db->update('nguonkinhphi', $array);
	}
	public function huy_kinhphi($id)
	{
		$arWhere=array(
			'id_nguonkinhphi'=>$id,
			);
		$array=array(
			"tien_themmoi"=>0,
			'trangthai'=>1,
		);
		$this->db->where($arWhere);
		return $this->db->update('nguonkinhphi', $array);
	}
	public function add($arAdd)
	{
		$array=array(
			'manguonkinhphi'=>addslashes($arAdd['manguonkinhphi']),
			'tennguonkinhphi'=>addslashes($arAdd['tennguonkinhphi']),
		);
		return $this->db->insert('nguonkinhphi', $array);
	}
	public function check_tennguonkinhphi($tennguonkinhphi)
	{
		$this->db->select("*");
		$this->db->from("nguonkinhphi");
		$arWhere=array('tennguonkinhphi'=>$tennguonkinhphi);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->row_array();
	}
	public function bosung()
	{
		$this->db->select("*");
		$this->db->from("nguonkinhphi");
		$arWhere=array('trangthai'=>0);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('nguonkinhphi');
		$arWhere=array('id_nguonkinhphi'=>$id);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->row_array();
	}
	public function del($arDel)
	{
		return $this->db->delete('nguonkinhphi',$arDel);
	}
}

/* End of file Kinhphi_model.php */
/* Location: ./application/models/Kinhphi_model.php */