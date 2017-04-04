<?php 
$arsUser=$this->session->userdata('arsUser');
if ($arsUser["chuc_vu"]!=4) {
	redirect('/trang-chu.html','refresh');
}
?>
<div class=" row">
	<form method="post" action="/admin/admin_assets/adddanhgialai" id="chitietdanhgia">
		<div class="col-md-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Thông tin tài sản cần đánh giá</h3>
				</div>
				<div class="panel-body">
					<div class="form-group col-xs-12">
						<label class="control-label col-xs-3" >Tên tài sản </label>
						<div class="col-xs-9">
							<input type="hidden" name="id_sotaisan" value="<?=$arDetail["id_sotaisan"]?>">
							<input type="text" class="form-control"  disabled="disabled" value="<?=$arDetail["name"]?>" >
						</div>
					</div>

					<div class="form-group col-xs-12">
						<label class="control-label col-xs-3">Đơn vị sử dụng </label>
						<div class="col-xs-9">
							<input type="text" class="form-control" disabled="disabled" value="<?=$arDetail["namekhoa"]?>">
						</div>
					</div>
					<div class="form-group col-xs-12">
						<label class="control-label col-xs-3" >Số lượng </label>
						<div class="col-xs-9">
							<input type="text"  class="form-control" disabled="disabled" value="<?=$arDetail["so_luong"]?>" >
						</div>
					</div>
					<div class="form-group col-xs-12">
						<label class="control-label col-xs-3">Đơn giá</label>
						<div class="col-xs-9">
							<input type="text" class="form-control" disabled="disabled" value="<?=number_format($arDetail["don_gia"],0,",",",")." đ"?>">
						</div>
					</div>
					<div class="form-group col-xs-12">
						<label class="control-label col-xs-3" >Thời hạn sử dụng </label>
						<div class="col-xs-9">
							<input type="text" class="form-control" disabled="disabled" value="<?=$arDetail["thoigian_sd"]?> năm"  >
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Thông tin tài sản được đánh giá</h3>
				</div>
				<div class="panel-body">

					<div class="form-group col-xs-12">
						<label class="control-label col-xs-3" >Ngày đánh giá </label>
						<div class="col-xs-9">
							<input type="text" name="ngaydanhgia" value="<?php echo date("d/m/Y")?>" class="form-control ngay" placeholder="Chọn ngày đánh giá"  >
						</div>
					</div>
					<div class="form-group col-xs-12">
						<label class="control-label col-xs-3" >Số lượng </label>
						<div class="col-xs-9">
							<input type="text" name="soluong" class="form-control" placeholder="Nhập số lượng" >
						</div>
					</div>
					<div class="form-group col-xs-12">
						<label class="control-label col-xs-3">Đơn giá</label>
						<div class="col-xs-9">
							<input type="text" name="dongia" class="form-control" placeholder="Nhập đơn giá">
						</div>
					</div>
					<div class="form-group col-xs-12">
						<label class="control-label col-xs-3" >Thời hạn sử dụng </label>
						<div class="col-xs-9">
							<input type="text" name="thoigian_sd" class="form-control"  maxlength="4" placeholder="Nhập thời gian sử dụng" >
						</div>
					</div>
					<div class="form-group col-xs-12">
						<label class="control-label col-xs-3">Nguyên giá</label>
						<div class="col-xs-9">
							<input type="text" name="nguyengia" class="form-control gia"  placeholder="Nhập nguyên giá">
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
		<div class="col-xs-12 text-center">
			<input type="submit" class="btn btn-default" name="themdanhgia" value="Lưu">
			<button  class="btn btn-default">Hủy</button>
		</div>
	</form>
</div>