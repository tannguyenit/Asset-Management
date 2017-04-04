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
			<h2><i class="fa fa-bars"></i> Thanh lý tài sản</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<div class="" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
					<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Tất cả tài sản</a> </li>
					<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> Danh sách tài sản thanh lý</a> </li>
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
										<th> <input type="checkbox" name="" class="thanhly" id="thanhly_ts" value="" style="width: 10%"><a href="javascript:;" title="Sửa" data-toggle="modal" data-target=".bs-example-modal-lg"  title="" id="thanhlyts" style="display: none"> Thanh lý</a> <span id="andi">Chức năng</span>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i=1;
									foreach ($arThanhly as $key => $value) {
										$id=$value["id_sotaisan"];
										?>
										<tr data-id=<?=$id?> data-name="<?php echo $value["name"]?>">
											<td><?php echo $i?></td>
											<td><?php echo $value["so_the"]?></td>
											<td><?php echo $value["name"]?></td>
											<td><?php echo $value["short_name"]?></td>
											<td><?php echo $value["tenlop"]?></td>
											<td>
												<input type="checkbox" name="thanhly[]" id="thanhly" class="thanhly"  value="">
												<a href="/thanh-ly/<?=$id?>" title="Thanh lý"> <i class="fa fa-mail-forward"></i> </a>
											</td>
										</tr>
										<?php $i++;}?>
									</tbody>
								</table>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
							<table class="table table-hover table-striped table-bordered bulk_action" >
								<thead>
									<tr>
										<th>ID</th>
										<th style="width: 10%;">Số thẻ</th>
										<th>Tên</th>
										<th>Đơn vị</th>
										<th>Số lượng</th>
										<th>Người thanh lý</th>
										<th>Lý do</th>
										<th>Ảnh minh họa</th>
										<th>Ngày thanh lý</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i=1;
									foreach ($arShowthanhly as $key => $value) {
										$id=$value["id_sotaisan"];
										if ($value["anhminhhoa"]=="") {
											$picture="Không có hình"; 
										}else{ 
											$url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/files/admin/".$value["anhminhhoa"]; 
				                         if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update 
				                         	$picture=' <img style="border-radius: 5px;" src="'.FILES.'admin/'. $value["anhminhhoa"].' " alt="" width="100px" height="100px" " />';
				                         }else{
				                         	$picture="Lỗi ảnh gốc "; 
				                         }
				                     }
				                     ?>
				                     <tr data-id=<?=$id?> >
				                     	<td><?php echo $i?></td>
				                     	<td><?php echo $value["so_the"]?></td>
				                     	<td><?php echo $value["name"]?></td>
				                     	<td><?php $namekhoa=$this->khoa_model->get_namekhoa($value["id_khoa"]);
				                     		echo $namekhoa["name"];?></td>
				                     		<td><?php echo $value["soluong"]?></td>
				                     		<td><?php echo $value["fullname"]?></td>
				                     		<td><?php echo $value["lydo"]?></td>
				                     		<td><?php echo $picture?></td>
				                     		<td><?php echo date("d/m/Y",strtotime($value["ngaythanhly"]))?></td>
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
							<h4 class="modal-title" id="myModalLabel">Thanh ly tài sản</h4> </div>
							<div class="modal-body">
								<form id="dieuchuyentaisannhieu" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="/admin/admin_assets/thanhlynhieu">
									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên tài sản<span class="required">*</span> </label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input type="text" class="form-control col-md-7 col-xs-12" id="tentaisan" name="" value="" >
											
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lý do <span class="required">*</span> </label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input type="text" class="form-control col-md-7 col-xs-12"  name="lydo" value="" >
										</div>

									</div>
									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Số lượng thanh lý <span class="required">*</span> </label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<select class="select2_single form-control"  tabindex="-1" name="soluongthanhly" >
												<option value="1">Tất cả</option>
												<option value="2">50%</option>
												
											</select>
										</div>

									</div>
									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ngày thanh lý <span class="required">*</span> </label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input type="text" class="form-control ngay" name="ngaythanhly" value="<?php echo date("d/m/Y")?>" >
										</div>
										<?php $arsUser=$this->session->userdata('arsUser'); ?>
										<input type="hidden"  name="id_canbothanhly" value="<?=$arsUser["id_user"]?>">
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
				
