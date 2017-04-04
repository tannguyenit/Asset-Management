<?php 
$arsUser=$this->session->userdata('arsUser');
if ($arsUser["chuc_vu"]!=4) {
	redirect('/trang-chu.html','refresh');
}
?>
<div class=" row">
	<form method="post" action="/admin/admin_assets/chuyen">
		<div class="col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Thông tin điều chuyển</h3>
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
								<input type="text" class="form-control"  disabled="disabled" value="<?=$arDetail["name"]?>" >
							</div>
						</div>

						<div class="form-group col-xs-12">
							<label class="control-label col-xs-3">Đơn vị giao/Khoa</label>
							<div class="col-xs-9">
								<input type="text" class="form-control"  disabled="disabled" value="<?=$arDetail["namekhoa"]?>">
								<input type="hidden"  name="khoagiao" value="<?=$arDetail["id_khoa"]?>">
							</div>
						</div>
						<input type="hidden"  name="lopgiao" value="<?=$arDetail["id_lop"]?>">
						<?php if ($arDetail["id_lop"]>0) {?>
						<div class="form-group col-xs-12">
							<label class="control-label col-xs-3">Lớp </label>
							<div class="col-xs-9">
							
								<input type="text" class="form-control"  disabled="disabled" value="<?=$arDetail["tenlop"]?>">
							</div>
						</div>
						<?php }?>

						<div class="form-group col-xs-12">
							<label class="control-label col-xs-3">Đơn vị nhận</label>
							<div class="col-xs-9">
								<select class="select2_single form-control" id="khoa" tabindex="-1" name="khoanhan" onchange="idkhoa()">
									<option></option>
									<?php foreach ($arKhoa as $key => $value) {?>
									<option value="<?php echo $value['id_khoa']?>"><?php echo $value["name"]?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-group col-xs-12">
							<label class="control-label col-xs-3" >Lớp nhận </label>
							<div class="col-xs-9">
								<select class="select2_single form-control" id="lop" tabindex="-1" name="lopnhan" >

								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group col-xs-12">
							<label class="control-label col-xs-3" >Mục tài sản </label>
							<div class="col-xs-9">
								<input type="text" class="form-control" disabled="disabled" value="<?=$arDetail["tenmuctaisancha"]?>">
							</div>
						</div>

						<div class="form-group col-xs-12">
							<label class="control-label col-xs-3"> Loại tài sản</label>
							<div class="col-xs-9">
								<input type="text" class="form-control" disabled="disabled" value="<?=$arDetail["tenmuctaisan"]?>">
							</div>
						</div>
						<div class="form-group col-xs-12">
							<label class="control-label col-xs-3" >Người giao </label>
							<div class="col-xs-9">
								<?php $arsUser=$this->session->userdata('arsUser'); ?>
								<input type="hidden"  name="nguoigiao" value="<?=$arsUser["id_user"]?>">
								<input type="text"  class="form-control" disabled="disabled"  value="<?=$arsUser["fullname"]?>" >
							</div>
						</div>
						<div class="form-group col-xs-12">
							<label class="control-label col-xs-3">Người nhận</label>
							<div class="col-xs-9">
								<select class="select2_single form-control"  tabindex="-1" name="nguoinhan" >
									<option></option>
									<?php foreach ($arUser as $key => $value) {?>
									<option value="<?php echo $value['id_user']?>"><?php echo $value["fullname"]?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-group col-xs-12">
							<label class="control-label col-xs-3">Ngày nhận</label>
							<div class="col-xs-9">
								<input type="text" class="form-control ngay" name="ngaynhan" value="<?php echo date("d/m/Y")?>" >
							</div>
						</div>
					</div>
					<div class="col-xs-12 text-center">
						<input type="submit" class="btn btn-success" name="chuyen" value="Điều chuyển">
					</div>
				</div>

			</div>

		</div>
		
	</form>
</div>