                    

<style type="text/css">
	tfoot {
		display: table-header-group;
	}
</style>
<?php 
$arsUser=$this->session->userdata('arsUser');
if ($arsUser["chuc_vu"]!=4) {
	redirect('/trang-chu.html','refresh');
}
?>
<div class="x_content bs-example-popovers">
	<div class="col-xs-12" id="message">
		<?php $this->load->view('templates/admin/thongbao');?>
	</div>
</div>
<link rel="stylesheet" href="<?php echo ADMIN_URL?>/build/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<div class="col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2><i class="fa fa-bars"></i> Điều chuyển tài sản</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<div class="" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
					<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Tất cả tài sản</a> </li>
					<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> Danh sách tài sản điều chuyển</a> </li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
						<div class="x_content table-responsive">
							<table class="table table-hover table-striped table-bordered bulk_action" id="index_translate_assets">
								<thead>
									<tr>
										<th>ID</th>
										<th>Số thẻ</th>
										<th>Tên</th>
										<th>Khoa</th>
										<th>Lớp</th>
										<th><input type="checkbox" name="" class="chuyentaisan" id="translate_ts" value="" style="width: 10%"><a href="javascript:;" title="Sửa" data-toggle="modal" data-target=".bs-example-modal-lg" title="" id="chuyents" style="display: none">Chuyển</a> <span id="andi">Chức năng</span> </th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i=1;
									foreach ($arAssets as $key => $value) {
										$id=$value["id_sotaisan"];
										?>
										<tr data-id=<?=$id?> data-name="<?php echo $value["name"]?>" >
											<td><?php echo $i?></td>
											<td><?php echo $value["so_the"]?></td>
											<td><?php echo $value["name"]?></td>
											<td><?php echo $value["short_name"]?></td>
											<td><?php echo $value["tenlop"]?></td>
											<td>
												<input type="checkbox" name="chuyentaisan[]" id="taisandieuchuyen" class="chuyentaisan"  value="">
												<a href="/dieu-chuyen-tai-san/<?=$id?>" title="Điều chuyển"> <i class="fa fa-mail-forward"></i> </a>
											</td>
										</tr>
										<?php $i++;}?>
									</tbody>
								</table>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
							<table class="table table-hover table-striped table-bordered bulk_action" id="index_danhgia" >
								<thead>
									<tr>
										<th>ID</th>
										<th style="width: 10%;">Số thẻ</th>
										<th>Tên</th>
										<th>Đơn vị giao</th>
										<th>Đơn vị nhận</th>
										<th>Người giao</th>
										<th>Người nhận</th>
										<th>Ngày giao</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i=1;
									foreach ($arDieuchuyen as $key => $value) {
										$id=$value["id_sotaisan"];
										?>
										<tr data-id=<?=$id?>>
											<td><?php echo $i?></td>
											<td><?php echo $value["so_the"]?></td>
											<td><?php echo $value["name"]?></td>
											<td><?php $namekhoa=$this->khoa_model->get_namekhoa($value["khoagiao"]);
												echo $namekhoa["name"];?>
											</td>
											<td><?php $namekhoa=$this->khoa_model->get_namekhoa($value["khoanhan"]);
												echo $namekhoa["name"];?>
											</td>
											<td><?php $nameuser=$this->user_model->get_nameuser($value["id_canbogiao"]);
												echo $nameuser["fullname"];?>
											</td>
											<td><?php $nameuser=$this->user_model->get_nameuser($value["id_canbonhan"]);
												echo $nameuser["fullname"];?>
											</td>
											<td><?php echo date("d/m/Y",strtotime($value["ngaygiao"]))?>
											</td>
										</tr>
										<?php $i++;}?>
									</tbody>
								</table>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit">

			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
						<h4 class="modal-title" id="myModalLabel">Điều chuyển tài sản</h4> </div>
						<div class="modal-body">
							<form id="dieuchuyentaisannhieu" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="/admin/admin_assets/dieuchuyennhieu">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên tài sản<span class="required">*</span> </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" class="form-control col-md-7 col-xs-12" id="tentaisan" name="tennguonkinhphi" value="" >
										
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Đơn vị nhận <span class="required">*</span> </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select class="select2_single form-control" id="khoa" tabindex="-1" name="khoanhan" >
											<option></option>
											<?php foreach ($arKhoa as $key => $value) {?>
											<option value="<?php echo $value['id_khoa']?>"><?php echo $value["name"]?></option>
											<?php }?>
										</select>
									</div>

								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Người nhận <span class="required">*</span> </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select class="select2_single form-control"  tabindex="-1" name="nguoinhan" >
											<option></option>
											<?php foreach ($arUser as $key => $value) {?>
											<option value="<?php echo $value['id_user']?>"><?php echo $value["fullname"]?></option>
											<?php }?>
										</select>
									</div>

								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ngày nhận <span class="required">*</span> </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" class="form-control ngay" name="ngaynhan" value="<?php echo date("d/m/Y")?>" >
									</div>
									<?php $arsUser=$this->session->userdata('arsUser'); ?>
									<input type="hidden"  name="nguoigiao" value="<?=$arsUser["id_user"]?>">
									<input type="hidden" class="form-control col-md-7 col-xs-12" id="id_dieuchuyen" name="id_dieuchuyen" value="" >
								</div>
								<div class="form-group text-center">
									<input type="submit"  class="btn btn-success " name="update" value="Chuyển">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>




