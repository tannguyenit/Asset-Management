<?php 
$arsUser=$this->session->userdata('arsUser');
if ($arsUser["chuc_vu"]!=4) {
	redirect('/trang-chu.html','refresh');
}
?>
<div class=" row">
	<form method="post" action="/admin/admin_assets/thanhly" enctype="multipart/form-data" id="thanhlytaisan">
		<div class="col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Thông tin thanh lý</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-6 col-xs-12">
						<div class="form-group col-xs-12">
							<label class="control-label col-xs-3" >Số thẻ </label>
							<div class="col-xs-9">
								<input type="text"  class="form-control" disabled="disabled" value="<?=$arDetail["so_the"]?>" >
							</div>
						</div>
						<div class="form-group col-xs-12">
							<label class="control-label col-xs-3" >Tên tài sản </label>
							<div class="col-xs-9">
								<input type="hidden" name="id_sotaisan" value="<?=$arDetail["id_sotaisan"]?>">
								<input type="hidden" name="id_kinhphi" value="<?=$arDetail["id_kinhphi"]?>">
								<input type="text" class="form-control"  disabled="disabled" value="<?=$arDetail["name"]?>" >
							</div>
						</div>

						<div class="form-group col-xs-12">
							<label class="control-label col-xs-3">Đơn vị </label>
							<div class="col-xs-9">
								<input type="text" class="form-control"  disabled="disabled" value="<?=$arDetail["namekhoa"]?>">
								<input type="hidden"  name="khoagiao" value="<?=$arDetail["id_khoa"]?>">
							</div>
						</div>
						<div class="form-group col-xs-12">
							<label class="control-label col-xs-3" >Người thanh lý </label>
							<div class="col-xs-9">
								<?php $arsUser=$this->session->userdata('arsUser'); ?>
								<input type="hidden"  name="nguoigiao" value="<?=$arsUser["id_user"]?>">
								<input type="text"  class="form-control" disabled="disabled"  value="<?=$arsUser["fullname"]?>" >
							</div>
						</div>
						
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group has-feedback col-xs-12">
							<label class="control-label col-xs-3">Ngày thanh lý</label>
							<div class="col-xs-9">
								<input type="text" class="form-control ngay" name="ngaythanhly" value="<?php echo date("d/m/Y")?>" >
								<i class='glyphicon glyphicon-ok form-control-feedback'></i>
							</div>
						</div>
						<div class="form-group has-feedback col-xs-12">
							<label class="control-label col-xs-3" >Lý do thanh lý </label>
							<div class="col-xs-9">
								<input type="text" class="form-control" name="lydo" value="" placeholder="Nhập lý do thanh lý">
								<i class='glyphicon glyphicon-ok form-control-feedback'></i>
							</div>
						</div>

						<div class="form-group has-feedback col-xs-12">
							<label class="control-label col-xs-3"> Số lượng </label>
							<div class="col-xs-9">
							<input type="hidden" id="soluong" value="<?php echo $arDetail["so_luong"]?>">
								<input type="tel" class="form-control" name="soluong" value="" placeholder="Nhập số lượng cần thanh lý">
								<i class='glyphicon glyphicon-ok form-control-feedback'></i>
							</div>
						</div>
						
						<div class="form-group col-xs-12">
							<label for="middle-name" class="control-label col-xs-3">Hình ảnh</label>
							<div class="col-xs-9">
								<label for="image" class="uploadimg">
									<div id="anhxoa" style="display: none"></div> <img id="datafile" src="<?php echo FILE_UPLOAD.'/upload.png'?>" data-img="<?php echo FILE_UPLOAD.'/upload.png'?>" />
									<input id="image" class="hide" type="file" name="hinhanh"  /> <a href="javascript:void(0)" class="removefile" title="Xóa ảnh">&times;</a> </label>
								</div>
							</div>

						</div>
						<div class="col-xs-12 text-center">
							<input type="submit" class="btn btn-success" name="thanhly" value="Thanh lý">
						</div>
					</div>

				</div>

			</div>

		</form>
	</div>