<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assets_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_assets()
	{
		$this->db->select('sotaisan.*,khoa.short_name,khoa.name as tenkhoa,lop.name as tenlop,muctaisan.tenmuctaisan,nguonkinhphi.tennguonkinhphi,nhacungcap.*,users.username');
		$this->db->from('sotaisan');
		$this->db->join('muctaisan', 'muctaisan.id_muctaisan = sotaisan.id_muctaisan', 'sotaisan');
		$this->db->join('nguonkinhphi', 'nguonkinhphi.id_nguonkinhphi = sotaisan.id_kinhphi', 'sotaisan');
		$this->db->join('nhacungcap', 'nhacungcap.id_nhacungcap = sotaisan.id_ncc', 'sotaisan');
		$this->db->join('nuoc', 'nuoc.id_nuoc = sotaisan.id_nuoc', 'sotaisan');
		$this->db->join('khoa', 'khoa.id_khoa=sotaisan.id_khoa', 'left');
		$this->db->join('lop', 'lop.id_lop=sotaisan.id_lop', 'left');
		$this->db->join('users', 'users.id_user=sotaisan.id_user_mua', 'left');
		$arWhere=array("sotaisan.so_luong!="=>0);
		$this->db->where($arWhere);	
		$this->db->order_by('sotaisan.id_sotaisan', 'desc');
		return $this->db->get()->result_array();

	}
	public function search($textsearch)
	{
		$this->db->select('sotaisan.*,khoa.short_name,khoa.name as tenkhoa,lop.name as tenlop,muctaisan.tenmuctaisan,nguonkinhphi.tennguonkinhphi,nhacungcap.*,users.username');
		$this->db->from('sotaisan');
		$this->db->join('muctaisan', 'muctaisan.id_muctaisan = sotaisan.id_muctaisan', 'sotaisan');
		$this->db->join('nguonkinhphi', 'nguonkinhphi.id_nguonkinhphi = sotaisan.id_kinhphi', 'sotaisan');
		$this->db->join('nhacungcap', 'nhacungcap.id_nhacungcap = sotaisan.id_ncc', 'sotaisan');
		$this->db->join('nuoc', 'nuoc.id_nuoc = sotaisan.id_nuoc', 'sotaisan');
		$this->db->join('khoa', 'khoa.id_khoa=sotaisan.id_khoa', 'left');
		$this->db->join('lop', 'lop.id_lop=sotaisan.id_lop', 'left');
		$this->db->join('users', 'users.id_user=sotaisan.id_user_mua', 'left');
		$this->db->like("sotaisan.name",$textsearch);
		$this->db->order_by('sotaisan.id_sotaisan', 'desc');
		return $this->db->get()->result_array();

	}
	public function get_assets_sao()
	{
		$arsUser=$this->session->userdata("arsUser");
		$id=$arsUser["id_user"];
		$this->db->select('sotaisan.*,khoa.short_name,lop.name as tenlop,muctaisan.tenmuctaisan,nguonkinhphi.tennguonkinhphi,nhacungcap.*,danhgiasao.id_user as nguoidanhgia,danhgiasao.star as sosao');
		$this->db->from('sotaisan');
		$this->db->join('muctaisan', 'muctaisan.id_muctaisan = sotaisan.id_muctaisan', 'sotaisan');
		$this->db->join('nguonkinhphi', 'nguonkinhphi.id_nguonkinhphi = sotaisan.id_kinhphi', 'sotaisan');
		$this->db->join('nhacungcap', 'nhacungcap.id_nhacungcap = sotaisan.id_ncc', 'sotaisan');
		$this->db->join('nuoc', 'nuoc.id_nuoc = sotaisan.id_nuoc', 'sotaisan');
		$this->db->join('khoa', 'khoa.id_khoa=sotaisan.id_khoa', 'left');
		$this->db->join('lop', 'lop.id_lop=sotaisan.id_lop', 'left');
		$this->db->join('danhgiasao', 'sotaisan.id_sotaisan=danhgiasao.id_sotaisan AND danhgiasao.id_user='.$id, 'left');
		$arWhere=array("sotaisan.so_luong!="=>0);
		$this->db->where($arWhere);	
		$this->db->group_by('sotaisan.id_sotaisan');
		$this->db->order_by('sotaisan.id_sotaisan', 'desc');
		return $this->db->get()->result_array();

	}
	public function get_thang()
	{
		$this->db->select('thang.thang as thangtrongnam,COUNT(month(ngay_mua)) AS number_record');
		$this->db->from('thang');
		$this->db->join('sotaisan', 'sotaisan.thang=thang.thang', 'left');
		$this->db->group_by('thangtrongnam');
		return $this->db->get()->result_array();

	}
	public function get_thanhly()
	{
		$this->db->select('sotaisan.*,khoa.short_name,lop.name as tenlop,muctaisan.tenmuctaisan,nguonkinhphi.tennguonkinhphi,nhacungcap.*');
		$this->db->from('sotaisan');
		$this->db->join('muctaisan', 'muctaisan.id_muctaisan = sotaisan.id_muctaisan', 'sotaisan');
		$this->db->join('nguonkinhphi', 'nguonkinhphi.id_nguonkinhphi = sotaisan.id_kinhphi', 'sotaisan');
		$this->db->join('nhacungcap', 'nhacungcap.id_nhacungcap = sotaisan.id_ncc', 'sotaisan');
		$this->db->join('nuoc', 'nuoc.id_nuoc = sotaisan.id_nuoc', 'sotaisan');
		$this->db->join('khoa', 'khoa.id_khoa=sotaisan.id_khoa', 'left');
		$this->db->join('lop', 'lop.id_lop=sotaisan.id_lop', 'left');
		$arWhere=array("sotaisan.so_luong!="=>0);
		$this->db->where($arWhere);		
		$this->db->order_by('sotaisan.id_sotaisan', 'desc');
		return $this->db->get()->result_array();

	}
	public function getdieuchuyen()
	{
		$this->db->select('sotaisan.name,sotaisan.so_the,dieuchuyen.*,khoa.short_name,lop.name as tenlop');
		$this->db->from('dieuchuyen');
		$this->db->join('sotaisan', 'dieuchuyen.id_sotaisan=sotaisan.id_sotaisan', 'sotaisan');
		$this->db->join('khoa', 'khoa.id_khoa=sotaisan.id_khoa', 'left');
		$this->db->join('lop', 'lop.id_lop=sotaisan.id_lop', 'left');
		$this->db->order_by('sotaisan.id_sotaisan', 'desc');
		return $this->db->get()->result_array();

	}
	public function detail($id)
	{
		$this->db->select('sotaisan.*,khoa.short_name,khoa.name as namekhoa,lop.name as tenlop,muctaisan.tenmuctaisan,nguonkinhphi.tennguonkinhphi,nhacungcap.*,muctaisancha.tenmuctaisancha');
		$this->db->from('sotaisan');
		$this->db->join('muctaisan', 'muctaisan.id_muctaisan = sotaisan.id_muctaisan', 'sotaisan');
		$this->db->join('nguonkinhphi', 'nguonkinhphi.id_nguonkinhphi = sotaisan.id_kinhphi', 'sotaisan');
		$this->db->join('nhacungcap', 'nhacungcap.id_nhacungcap = sotaisan.id_ncc', 'sotaisan');
		$this->db->join('nuoc', 'nuoc.id_nuoc = sotaisan.id_nuoc', 'sotaisan');
		$this->db->join('khoa', 'khoa.id_khoa=sotaisan.id_khoa', 'left');
		$this->db->join('lop', 'lop.id_lop=sotaisan.id_lop', 'left');
		$this->db->join('muctaisancha', 'muctaisancha.id_muctaisancha=sotaisan.id_muctaisancha', 'left');
		$arWhere=array("sotaisan.id_sotaisan"=>$id);
		$this->db->where($arWhere);
		return $this->db->get()->row_array();

	}
	public function danhgiasao($id,$id_user)
	{
		$this->db->from('danhgiasao');
		$arWhere=array("id_sotaisan"=>$id,"id_user"=>$id_user);
		$this->db->where($arWhere);
		return $this->db->get()->row_array();
	}
	public function get_dm($id_muctaisancha)
	{
		$this->db->select('sotaisan.name,muctaisancha.tenmuctaisancha,muctaisan.tenmuctaisan');
		$this->db->from('sotaisan');
		$this->db->join('muctaisan', 'muctaisan.id_muctaisan = sotaisan.id_muctaisan', 'sotaisan');
		$this->db->join('muctaisancha', 'muctaisan.id_muctaisancha=muctaisancha.id_muctaisancha', 'muctaisan');
		$arWhere=array("muctaisancha.id_muctaisancha"=>$id_muctaisancha);
		$this->db->where($arWhere);
		$this->db->order_by('sotaisan.id_sotaisan', 'desc');
		return $this->db->get()->result_array();

	}
	public function get_danhmuc($id_muctaisancha)
	{
		$this->db->select('muctaisan.tenmuctaisan');
		$this->db->from('sotaisan');
		$this->db->join('muctaisan', 'muctaisan.id_muctaisan = sotaisan.id_muctaisan', 'sotaisan');
		//$this->db->join('muctaisancha', 'muctaisan.id_muctaisancha=muctaisancha.id_muctaisancha', 'muctaisan');
		//$this->db->group_by("sotaisan.id_muctaisan");
		$arWhere=array("sotaisan.id_muctaisan"=>$id_muctaisancha);
		$this->db->where($arWhere);
		$this->db->order_by('sotaisan.id_sotaisan', 'desc');
		return $this->db->get()->result_array();

	}
	public function get_lop($id_khoa,$id_lop)
	{
		$arWhere=array("id_khoa"=>$id_khoa,"id_lop"=>$id_lop);
		$this->db->where($arWhere);
		$this->db->order_by('id_sotaisan', 'desc');
		return $this->db->get("sotaisan")->result_array();
	}

	public function get_kinhphi()
	{
		$this->db->order_by('id_nguonkinhphi', 'desc');
		return $this->db->get('nguonkinhphi')->result_array();
	}
	public function get_danhgialai()
	{
		$this->db->join("sotaisan", 'danhgialaitaisan.id_sotaisan = sotaisan.id_sotaisan');
		$this->db->order_by('id_danhgialaitaisan', 'desc');
		return $this->db->get('danhgialaitaisan')->result_array();
	}
	public function add_assets($arAdd)
	{
		
		$array=array(
			'so_the'=>addslashes($arAdd['sothe']),
			'name'=>addslashes($arAdd['tentaisan']),
			'don_gia'=>addslashes($arAdd['dongia']),
			'id_user_mua'=>$arAdd['nguoimua'],
			'id_khoa'=>$arAdd['khoa'],
			'id_lop'=>$arAdd['lop'],
			'id_muctaisancha'=>$arAdd['loaitaisan'],
			'id_muctaisan'=>$arAdd['muctaisan'],
			'so_luong'=>addslashes($arAdd['soluong']),
			'nguyen_gia'=>addslashes($arAdd['nguyengia']),
			'thoigian_sd'=>$arAdd['thoigiansudung'],
			'nam_sd'=>$arAdd['namsudung'],
			'ngay_mua'=>$arAdd['ngaymuaimport'],
			'thang'=>$arAdd['thang'],
			'nam_sx'=>$arAdd['namsanxuat'],
			'ghichu'=>addslashes($arAdd['ghichu']),
			'id_muctaisan'=>$arAdd['muctaisan'],
			'id_kinhphi'=>$arAdd['nguonkinhphi'],
			'id_ncc'=>$arAdd['nhacungcap'],
			'id_nuoc'=>$arAdd['nuocsanxuat'],
			);
		return $this->db->insert('sotaisan', $array);
	}
	public function danhgiamoisao($id,$id_user,$star)
	{
		$array=array(
			'id_sotaisan'=>$id,
			'id_user'=>$id_user,
			'star'=>$star,
			);
		return $this->db->insert('danhgiasao', $array);
	}
	public function danhgialaisao($id,$id_user,$star)
	{
		$array=array(
			'id_sotaisan'=>$id,
			'id_user'=>$id_user,
			'star'=>$star,
			);
		$this->db->where(array('id_sotaisan'=>$id,'id_user'=>$id_user,));
		return $this->db->update('danhgiasao', $array);
	}
	public function danhgiatongsao($id,$star)
	{
		$array=array(
			'id_sotaisan'=>$id,
			'star'=>$star,
			);
		$this->db->where(array('id_sotaisan'=>$id));
		return $this->db->update('sotaisan', $array);
	}
	public function getsao($id,$id_user)
	{
		$this->db->where(array("id_sotaisan"=>$id));
		return $this->db->get('danhgiasao')->result_array();
	}
	public function chuyen($arAdd)
	{
		$array=array(
			"id_sotaisan"=>$arAdd["id_sotaisan"],
			"khoagiao"=>$arAdd["khoagiao"],
			"lopgiao"=>$arAdd["lopgiao"],
			"khoanhan"=>$arAdd["khoanhan"],
			"lopnhan"=>$arAdd["lopnhan"],
			"id_canbogiao"=>$arAdd["nguoigiao"],
			"id_canbonhan"=>$arAdd["nguoinhan"],
			"ngaygiao"=>$arAdd["ngaynhan"],
			);
		return $this->db->insert('dieuchuyen', $array);
	}
	public function insert_dieuchuyen($arInsert,$value)
	{
		$array=array(
			"id_sotaisan"=>$value,
			"khoanhan"=>$arInsert["khoanhan"],
			"id_canbogiao"=>$arInsert["nguoigiao"],
			"id_canbonhan"=>$arInsert["nguoinhan"],
			"ngaygiao"=>$arInsert["ngaynhan"],
			);
		return $this->db->insert('dieuchuyen', $array);
	}
	public function insert_thanhly($arInsert,$value)
	{
		$array=array(
			"id_sotaisan"=>$value,
			"id_canbothanhly"=>$arInsert["id_canbothanhly"],
			"ngaythanhly"=>$arInsert["ngaythanhly"],
			"soluong"=>$arInsert["soluongimport"],
			"lydo"=>addslashes($arInsert["lydo"]),
			"id_kinhphi"=>$arInsert["id_kinhphi"],
			"tienthanhly"=>addslashes($arInsert["tienthanhly"]),
			);
		return $this->db->insert('taisanthanhly', $array);
	}
	public function addthanhly($arAdd)
	{
		return $this->db->insert('taisanthanhly', $arAdd);
	}
	public function adddanhgialai($arAdd)
	{
		$array=array(
			"dongia"=>$arAdd["dongia"],
			"soluong"=>$arAdd["soluong"],
			"thoihansudung"=>addslashes($arAdd["thoigian_sd"]),
			"nguyengia"=>$arAdd["nguyengia"],
			
			"ngaydanhgia"=>$arAdd['ngaydanhgiaimport'],
			"id_sotaisan"=>$arAdd['id_sotaisan'],
			);
		return $this->db->insert('danhgialaitaisan', $array);
	}
	public function update($arAdd,$id)
	{
		$ngaymua=$arAdd['ngaymua'];
		$array=array(
			'so_the'=>$arAdd['sothe'],
			'name'=>addslashes($arAdd['tentaisan']),
			'don_gia'=>$arAdd['dongia'],
			'id_khoa'=>$arAdd['khoa'],
			'id_user_mua'=>$arAdd['nguoimua'],
			'id_lop'=>$arAdd['lop'],
			'id_muctaisancha'=>$arAdd['loaitaisan'],
			'id_muctaisan'=>$arAdd['muctaisan'],
			'so_luong'=>$arAdd['soluong'],
			'nguyen_gia'=>$arAdd['nguyengia'],
			'thoigian_sd'=>$arAdd['thoigiansudung'],
			'nam_sd'=>$arAdd['namsudung'],
			'ngay_mua'=>$arAdd['ngaymuaimport'],
			'nam_sx'=>$arAdd['namsanxuat'],
			
			'ghichu'=>addslashes($arAdd['ghichu']),
			'id_muctaisan'=>$arAdd['muctaisan'],
			'id_kinhphi'=>$arAdd['nguonkinhphi'],
			'id_ncc'=>$arAdd['nhacungcap'],
			'id_nuoc'=>$arAdd['nuocsanxuat'],
			);
		$arWhere=array('id_sotaisan'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('sotaisan', $array);
	}
	public function update_dieuchuyen_assets($arAdd,$id)
	{
		$arWhere=array('id_sotaisan'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('sotaisan', $arAdd);
	}
	public function update_tienthanhly($arTien,$id_kinhphi)
	{
		$arWhere=array('id_nguonkinhphi'=>$id_kinhphi);
		$this->db->where($arWhere);
		return $this->db->update('nguonkinhphi', $arTien);
	}
	public function update_dieuchuyen($arUpdate,$id)
	{
		$array=array(
			"khoanhan"=>$arUpdate["khoanhan"],
			"id_canbogiao"=>$arUpdate["nguoigiao"],
			"id_canbonhan"=>$arUpdate["nguoinhan"],
			"ngaygiao"=>$arUpdate["ngaynhan"],
			);
		$arWhere=array('id_sotaisan'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('dieuchuyen', $array);
	}
	public function update_soluongthanhly($soluongupdate,$id)
	{
		$array=array(
			'so_luong'=>$soluongupdate,
			'trangthai'=>1,
			);
		$arWhere=array('id_sotaisan'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('sotaisan', $array);
	}
	public function total_assets()
	{
		return $this->db->count_all_results('sotaisan');
	}
	public function check_tentaisan($tentaisan)
	{
		$this->db->select("*");
		$this->db->from("sotaisan");
		$arWhere=array('name'=>$tentaisan);
		$this->db->where($arWhere);
		$query=$this->db->get();
		return $query->row_array();
	}
	public function get_maxid()
	{
		$this->db->select("MAX(so_the) as id");
		$this->db->from("sotaisan");
		$query=$this->db->get();
		return $query->row_array();
	}
	public function edit($id)
	{
		$arWhere=array('id_sotaisan'=>$id);
		$this->db->where($arWhere);
		$query=$this->db->get("sotaisan");
		return $query->row_array();
	}
	public function show_danhgia($id)
	{
		$this->db->select('danhgialaitaisan.*,khoa.name as namekhoa,sotaisan.name,sotaisan.don_gia as dongiacu,sotaisan.so_luong as soluongcu ,sotaisan.thoigian_sd');
		$this->db->join("sotaisan", 'danhgialaitaisan.id_sotaisan = sotaisan.id_sotaisan');
		$this->db->join('khoa', 'khoa.id_khoa=sotaisan.id_khoa', 'left');
		$arWhere=array('id_danhgialaitaisan'=>$id);
		$this->db->where($arWhere);
		$query=$this->db->get("danhgialaitaisan");
		return $query->row_array();
	}
	public function show_thanhly()
	{
		$this->db->select('taisanthanhly.*,sotaisan.*,users.fullname');
		$this->db->join("sotaisan", 'sotaisan.id_sotaisan=taisanthanhly.id_sotaisan');
		$this->db->join('users', 'users.id_user=taisanthanhly.id_canbothanhly', 'left');
		$query=$this->db->get("taisanthanhly");
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
	public function get_taisandieuchuyen($id)
	{
		$arWhere=array('id_sotaisan'=>$id);
		$this->db->where($arWhere);
		return $this->db->get('dieuchuyen')->row_array();
	}
	public function del($arDel)
	{
		return $this->db->delete('sotaisan',$arDel);
	}
	public function is_active($arAdd,$id)
	{
		$arWhere=array('id_sotaisan'=>$id);
		$this->db->where($arWhere);
		return $this->db->update('sotaisan', $arAdd);
	}
}

/* End of file Assets_model.php */
/* Location: ./application/models/Assets_model.php */