<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function allRecord()
	{
		return $this->db->count_all_results("sotaisan");
	}
	public function allRecordCat($id_cat)
	{
		$arWhere=array('id_cat'=>$id_cat);
		$this->db->where($arWhere);
		$this->db->order_by('id_sotaisan', 'desc');
		$query=$this->db->get('sotaisan');
		return $num = $query->num_rows();
	}
	public function pagination_cat($id_cat,$offset,$row_count)
	{
		$this->db->select('*');
		$this->db->from("sotaisan");
		$arWhere=array('id_cat'=>$id_cat,"is_active"=>1);
		$this->db->where($arWhere);
		$this->db->order_by('id_sotaisan', 'desc');
		$this->db->limit($row_count,$offset);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function get_loaitaisan()
	{
		return $this->db->get('muctaisancha')->result_array();
	}
	public function get_muctaisan($id)
	{
		$arWhere=array('id_muctaisancha'=>$id);
		$this->db->where($arWhere);
		return $this->db->get('muctaisan')->result_array();
	}
	
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('sotaisan');
		$arWhere=array('id_sotaisan'=>$id);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	public function del_cat($id)
	{
		$arWhere=array('id_muctaisan'=>$id);
		return $this->db->delete('sotaisan',$arWhere);
	}
	public function getid_cat($id)
	{
		$arWhere=array('id_muctaisan'=>$id);
		$this->db->where($arWhere);
		$query=$this->db->get('sotaisan');
		return $query->result_array();
		
	}
	public function getid_cat_once($id)
	{
		$arWhere=array('id_cat'=>$id,"is_active"=>1);
		$this->db->where($arWhere);
		$this->db->limit(1,0);
		$query=$this->db->get('sotaisan');
		return $query->result_array();
		
	}
	public function getid_cat_four($id)
	{
		$arWhere=array('id_cat'=>$id,"is_active"=>1);
		$this->db->where($arWhere);
		$this->db->limit(4,1);
		$query=$this->db->get('sotaisan');
		return $query->result_array();
		
	}
	public function add($arAdd)
	{
		
		return $this->db->insert('sotaisan', $arAdd);
	}
	public function update($arAdd,$id)
	{
		$arWhere=array('id_sotaisan'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('sotaisan', $arAdd);
	}
	public function read($arRead,$id)
	{
		$arWhere=array('id_sotaisan'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('sotaisan', $arRead);
	}
	public function is_active($arAdd,$id)
	{
		
		$arWhere=array('id_sotaisan'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('sotaisan', $arAdd);
	}
	public function toltal()
	{
		return $this->db->count_all_results('sotaisan');
	}
	public function total_read()
	{
		$this->db->select('read,date');
		$query=$this->db->get('sotaisan');
		return $query->result_array();
	}
	public function update_img($id)
	{
		$arWhere=array(
			'id_sotaisan'=>$id
		);
		$array=array(
			'picture'=>''
		);
		return $this->db->update('sotaisan', $array,$arWhere);
	}
	public function total_search($arSearch)
	{
		$this->db->select('sotaisan.*,category.name AS tendanhmuc');
		$this->db->from("sotaisan");
		$this->db->join('category', 'category.id_cat = sotaisan.id_cat');
		
		if(count($arSearch)>0) {
		    if($arSearch['id_cat']!="" && $arSearch['is_active']!="" && $arSearch['name']!="") {
		        $arWhere=array( 'sotaisan.id_cat'=> $arSearch['id_cat'], 'sotaisan.is_active'=> $arSearch['is_active']);
		        $arLike=array('sotaisan.name'=> $arSearch['name']);
		        $this->db->where($arWhere);
		        $this->db->like($arLike);
		    }
		    else if($arSearch['id_cat']!="" && $arSearch['is_active']!="") {
		        $arWhere=array( 'sotaisan.id_cat'=> $arSearch['id_cat'], 'sotaisan.is_active'=> $arSearch['is_active']);
		        $this->db->where($arWhere);
		    }
		    else if($arSearch['id_cat']!="" && $arSearch['name']!="") {
		        $arWhere=array( 'sotaisan.id_cat'=> $arSearch['id_cat'], 'sotaisan.is_active'=> $arSearch['is_active']);
		        $arLike=array('sotaisan.name'=> $arSearch['name']);
		        $this->db->where($arWhere);
		        $this->db->like($arLike);
		    }
		    else if($arSearch['is_active']!="" && $arSearch['name']!="") {
		        $arWhere=array( 'sotaisan.id_cat'=> $arSearch['id_cat'], 'sotaisan.is_active'=> $arSearch['is_active']);
		        $arLike=array('sotaisan.name'=> $arSearch['name']);
		        $this->db->where($arWhere);
		        $this->db->like($arLike);
		    }
		    else if($arSearch['is_active']!="") {
		        $arWhere=array( 'sotaisan.is_active'=> $arSearch['is_active']);
		        $this->db->where($arWhere);
		    }
		    else if($arSearch['id_cat']!="") {
		        $arWhere=array( 'sotaisan.id_cat'=> $arSearch['id_cat']);
		        $this->db->where($arWhere);
		    }
		    else if($arSearch['name']!="") {
		        $arLike=array('sotaisan.name'=> $arSearch['name']);
		        $this->db->like($arLike);
		    }
		}
		
		$this->db->order_by('id_sotaisan', 'desc');
		
		$query=$this->db->get();
		return count($query->result_array());
	}
	public function detail($id_sotaisan)
	{
		$this->db->select('*');
		$this->db->from("sotaisan");
		$arWhere=array('id_sotaisan'=>$id_sotaisan,"is_active"=>1);
		$this->db->where($arWhere);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function tinlienquan($id_sotaisan,$id_cat)
	{
		$this->db->select('*');
		$this->db->from("sotaisan");
		$arWhere=array('id_sotaisan!='=>$id_sotaisan,'id_cat'=>$id_cat,"is_active"=>1);
		$this->db->where($arWhere);
		$this->db->limit(3);
		$this->db->order_by('id_sotaisan', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	

}

/* End of file Device_model.php */
/* Location: ./application/models/Device_model.php */