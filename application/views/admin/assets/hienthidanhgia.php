
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
			<h4 class="modal-title" id="myModalLabel">Thông tin tài sản đã đánh giá</h4> </div>
			<div class="modal-body">
				<form method="post" action="/admin/admin_assets/adddanhgialai">
					<div class="col-md-6 col-xs-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Thông tin tài sản cần đánh giá</h3>
							</div>
							<div class="panel-body">

								<div class="form-group col-xs-12">
									<label class="control-label col-xs-3" >Tên tài sản </label>
									<div class="col-xs-9">
										<input type="text" class="form-control"  disabled="disabled" value="<?=$arShowdanhgia["name"]?>" >
									</div>
								</div>
								<div class="form-group col-xs-12">
									<label class="control-label col-xs-3">Đơn vị sử dụng </label>
									<div class="col-xs-9">
										<input type="text" class="form-control" disabled="disabled" value="<?=$arShowdanhgia["namekhoa"]?>">
									</div>
								</div>
								<div class="form-group col-xs-12">
									<label class="control-label col-xs-3" >Số lượng </label>
									<div class="col-xs-9">
										<input type="text"  class="form-control" disabled="disabled" value="<?=$arShowdanhgia["soluongcu"]?>" >
									</div>
								</div>
								<div class="form-group col-xs-12">
									<label class="control-label col-xs-3">Đơn giá</label>
									<div class="col-xs-9">
										<input type="text" class="form-control" disabled="disabled" value="<?=number_format($arShowdanhgia["dongiacu"],0,",",",")." đ"?>">
									</div>
								</div>
								<div class="form-group col-xs-12">
									<label class="control-label col-xs-3" >Thời hạn sử dụng </label>
									<div class="col-xs-9">
										<input type="text" class="form-control" disabled="disabled" value="<?=$arShowdanhgia["thoigian_sd"]?> năm"  >
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Thông tin tài sản đã đánh giá</h3>
							</div>
							<div class="panel-body">

								<div class="form-group col-xs-12">
									<label class="control-label col-xs-3" >Ngày đánh giá </label>
									<div class="col-xs-9">
										<input type="text" name="ngaydanhgia" disabled="disabled" class="form-control ngay" placeholder="Chọn ngày đánh giá" value="<?=date('d-m-Y', strtotime(str_replace('/', '-',$arShowdanhgia["ngaydanhgia"])))?>">
									</div>
								</div>
								<div class="form-group col-xs-12">
									<label class="control-label col-xs-3" >Số lượng </label>
									<div class="col-xs-9">
										<input type="text" name="soluong" class="form-control" disabled="disabled" value="<?=$arShowdanhgia["soluong"]?>">
									</div>
								</div>
								<div class="form-group col-xs-12">
									<label class="control-label col-xs-3">Đơn giá</label>
									<div class="col-xs-9">
										<input type="text" name="dongia" class="form-control" disabled="disabled"   value="<?php echo number_format($arShowdanhgia["dongia"],0,',',',') ?> đ ">
									</div>
								</div>
								<div class="form-group col-xs-12">
									<label class="control-label col-xs-3" >Thời hạn sử dụng </label>
									<div class="col-xs-9">
										<input type="text" name="thoigian_sd" class="form-control" disabled="disabled"    value="<?=$arShowdanhgia["thoihansudung"]?> năm">
									</div>
								</div>
								<div class="form-group col-xs-12">
									<label class="control-label col-xs-3">Nguyên giá</label>
									<div class="col-xs-9">
										<input type="text" name="nguyengia" class="form-control gia" disabled="disabled"   value="<?=$arShowdanhgia["nguyengia"]?> VNĐ">
									</div>
								</div>
								

							</div>
						</div>
					</div>
					<div class="col-xs-12 text-center">
						<button data-dismiss="modal" class="btn btn-success">Hủy</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>