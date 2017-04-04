<style type="text/css">
	tfoot {
		display: table-header-group;
	}
</style>
<?php 
$arsUser=$this->session->userdata('arsUser');
?>
<div class="x_content bs-example-popovers">
	<div class="col-xs-12" id="message">
		<?php $this->load->view('templates/admin/thongbao');?>
	</div>
</div>
<input type="hidden" id="id_user" value="<?php echo $arsUser["id_user"]?>">
<link rel="stylesheet" href="<?php echo ADMIN_URL?>/build/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<div class="col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2><i class="fa fa-bars"></i> Đánh giá tài sản</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<div class="" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
					<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Tất cả tài sản</a> </li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
						<div class="x_content table-responsive">
							<table class="table table-hover table-striped table-bordered bulk_action" id="index_translate">
								<thead>
									<tr>
										<th>Số thẻ</th>
										<th>Tên</th>
										<th>Khoa</th>
										<th>Lớp</th>
										<th>Đánh giá</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i=1;
									foreach ($arAssets as $key => $value) {
										$id=$value["id_sotaisan"];
										?>
										<tr data-id=<?=$id?>>
											<td><?php echo $value["so_the"]?></td>
											<td><?php echo ($value["name"])?></td>
											<td><?php echo $value["short_name"]?></td>
											<td><?php echo $value["tenlop"]?></td>
											<td data-id=<?=$id?> id=<?=$id?>>
												<input  value="<?php echo $value["sosao"]?>" type="number" class="rating danhgia" min=0 max=5 step=1  >
											</td>
										</tr>
										<?php $i++;}?>
									</tbody>
								</table>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
							<form id="index_assets" data-parsley-validate class="form-horizontal form-label-left" method="post" action="/admin/admin_assets/add_assets">
								<div class="form-group has-feedback">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" >Tên tài sản<span class="required">*</span> </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="tentaisan" placeholder="Vui lòng nhập tên tài sản"  class="form-control col-md-7 col-xs-12" >
										<i class='glyphicon glyphicon-ok form-control-feedback'></i>
									</div>
								</div>
								<div class="form-group has-feedback">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" >Công ty cung cấp <span class="required">*</span> </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select class="select2_single form-control" tabindex="-1" name="nhacungcap" >
											<option></option>
											<?php foreach ($arNhacungcap as $key => $value) {?>
											<option value="<?php echo $value['id_nhacungcap']?>"><?php echo $value["tencongty"]?></option>
											<?php }?>
										</select>
										<i class='glyphicon glyphicon-ok form-control-feedback'></i>
									</div>
								</div>

								<div class="form-group has-feedback">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" >Nước sản xuất <span class="required">*</span> </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select class="select2_single form-control" tabindex="-1" name="nuocsanxuat" >
											<option></option>
											<?php foreach ($arNuoc as $key => $value) {?>
											<option value="<?php echo $value['id_nuoc']?>"><?php echo $value["tennuoc"]?></option>
											<?php }?>
										</select>
										<i class='glyphicon glyphicon-ok form-control-feedback'></i>
									</div>
								</div>
								<div class="form-inline form-group ">
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-6  col-xs-12" >Số thẻ <span class="required">*</span></label>
										<div class="col-md-6  col-xs-12">
											<input type="text" placeholder="Nhập số thẻ" name="sothe" value="" class="form-control  col-xs-12">
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-3  col-xs-12" >Số chứng từ <span class="required">*</span> </label>
										<div class="col-md-6  col-xs-12">
											<input type="text" placeholder="Nhập số chứng từ" name=sochungtu value="" class="form-control  col-xs-12">
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
								</div>
								<div class="form-inline form-group ">
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-6 col-xs-12" > Khoa <span class="required">*</span></label>
										<div class="col-md-6 col-xs-12">
											<select class="select2_single form-control" id="khoa" tabindex="-1" name="khoa" onchange="idkhoa()">
												<option></option>
												<?php foreach ($arKhoa as $key => $value) {?>
												<option value="<?php echo $value['id_khoa']?>"><?php echo $value["name"]?></option>
												<?php }?>
											</select>
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-3 col-xs-12" > Lớp <span class="required">*</span> </label>
										<div class="col-md-6 col-xs-12">
											<select class="select2_single form-control" id="lop" tabindex="-1" name="lop" >

											</select>
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
								</div>
								<div class="form-inline form-group ">
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-6 col-xs-12" >Loại tài sản <span class="required">*</span></label>
										<div class="col-md-6 col-xs-12">
											<select class="select2_single form-control" id="loaitaisan" tabindex="-1" name="loaitaisan" onchange="idloaitaisan()">
												<option></option>
												<?php foreach ($arLoaitaisan as $key => $value) {?>
												<option value="<?php echo $value['id_muctaisancha']?>"><?php echo $value["tenmuctaisancha"]?></option>
												<?php }?>
											</select>
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-3 col-xs-12" > Mục tài sản <span class="required">*</span></label>
										<div class="col-md-6 col-xs-12">
											<select class="select2_single form-control" tabindex="-1" id="muctaisan" name="muctaisan" >
											</select>
										</div>
									</div>
								</div>
								<div class="form-inline form-group ">
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-6 col-xs-12" >Năm sản xuất <span class="required">*</span></label>
										<div class="col-md-6 col-xs-12">
											<input type="text" placeholder="Nhập năm sản xuất" name="namsanxuat" value="" minlength="3" maxlength="4" class="form-control col-xs-12">
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-3 col-xs-12" >Đơn giá <span class="required">*</span> </label>
										<div class="col-md-6 col-xs-12">
											<input type="text" placeholder="Nhập đơn giá" name="dongia" value="" class="form-control gia col-xs-12">
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
								</div>
								<div class="form-inline form-group ">
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-6 col-xs-12" >Số lượng <span class="required">*</span></label>
										<div class="col-md-6 col-xs-12">
											<input type="text" placeholder="Nhập số lượng" name="soluong" value="" class="form-control  col-xs-12">
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-3 col-xs-12" > Nguyên giá <span class="required">*</span> </label>
										<div class="col-md-6 col-xs-12">
											<input type="text" placeholder="nhập nguyên giá" name="nguyengia" value="" class="form-control gia col-xs-12">
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
								</div>
								<div class="form-inline form-group ">
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-6 col-xs-12" >Nguồn kinh phí <span class="required">*</span></label>
										<div class="col-md-6 col-xs-12">
											<select class="select2_single form-control"  tabindex="-1" name="nguonkinhphi" >
												<option></option>
												<?php foreach ($arNguonkinhphi as $key => $value) {?>
												<option value="<?php echo $value['id_nguonkinhphi']?>"><?php echo $value["tennguonkinhphi"]?></option>
												<?php }?>
											</select>
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-3 col-xs-12" > Thời gian SD <span class="required">*</span> </label>
										<div class="col-md-6 col-xs-12">
											<input type="text" name="thoigiansudung" value="" class="form-control  col-xs-12">
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
								</div>
								<div class="form-inline form-group ">
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-6 col-xs-12" >Ngày mua <span class="required">*</span></label>
										<div class="col-md-6 col-xs-12">
											<input type="text" name="ngaymua" value="" class="ngay form-control  col-xs-12">
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-3 col-xs-12" > Năm sử dụng <span class="required">*</span> </label>
										<div class="col-md-6 col-xs-12">
											<input type="tel" maxlength="4" name="namsudung" value="" class="form-control  col-xs-12 ">
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
								</div>
								<div class="form-inline form-group ">
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-6 col-xs-12" > Tỷ lệ hao mòn <span class="required">*</span></label>
										<div class="col-md-6 col-xs-12">
											<input type="text" name="tylehaomon" value="" class=" form-control  col-xs-12">
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-3 col-xs-12" > Giá trị hao mòn <span class="required">*</span> </label>
										<div class="col-md-6 col-xs-12">
											<input type="tel"  name="giatrihaomon" value="" class="form-control  col-xs-12">
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
								</div>
								<div class="form-inline form-group ">
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-6 col-xs-12" > Giá trị hao mòn lũy kế <span class="required">*</span></label>
										<div class="col-md-6 col-xs-12">
											<input type="text" name="haomonluyke" value="" class=" form-control  col-xs-12">
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
									<div class="form-group has-feedback col-md-6 ">
										<label class="control-label col-md-3 col-xs-12" > Giá trị còn lại <span class="required">*</span> </label>
										<div class="col-md-6 col-xs-12">
											<input type="tel"  name="giatriconlai" value="" class="form-control  col-xs-12">
											<i class='glyphicon glyphicon-ok form-control-feedback'></i>
										</div>
									</div>
								</div>

								<div class="form-group has-feedback">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" >Ghi chú <span class="required">*</span> </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="ghichu" class=" form-control col-md-7 col-xs-12">
										<i class='glyphicon glyphicon-ok form-control-feedback'></i>
									</div>
								</div>
								<div class="ln_solid"></div>
								<div class="form-group has-feedback">
									<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
										<input type="submit" class="btn btn-primary" name="them" value="Thêm">
										<input type="reset" class="btn btn-success" value="Nhập lại">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit"></div>
