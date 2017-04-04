<style type="text/css" media="screen">
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
<link rel="stylesheet" href="<?php echo ADMIN_URL?>/build/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<div class="col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2><i class="fa fa-bars"></i> Thống kê tài sản</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content table-responsive">
			<div class="x_content">
			</div>
			<table class="table table-hover table-striped table-bordered bulk_action" id="thongke">
				<thead>
					<tr>
						<th>Số thẻ</th>
						<th>Tên</th>
						<th>Đơn giá</th>
						<th>Số lượng</th>
						<th>Khoa</th>
						<th>Lớp</th>
						<th>Danh mục</th>
						<th>Nguồn kinh phí</th>
						<th>Tình trạng</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</tfoot>
				<tbody>
					<?php 
					$i=1;
					foreach ($arAssets as $key => $value) {
						$id=$value["id_sotaisan"];
						if ($value["tinhtrang"]==1) {
							$checked='Đang sử dụng'; 
						}else{
							$checked="Thanh lý";
						}
						?>
						<tr data-id=<?=$id?>>
							<td><?php echo $value["so_the"]?></td>
							<td><?php echo $value["name"]?></td>
							<td><?php echo number_format($value["don_gia"],0,",",".")?> đ</td>
							<td><?php echo $value["so_luong"]?></td>
							<td><?php echo $value["tenkhoa"]?></td>
							<td><?php echo $value["tenlop"]?></td>
							<td><?php echo $value["tenmuctaisan"]?></td>
							<td><?php echo $value["tennguonkinhphi"]?></td>
							<td><?php echo $checked;?>
							</td>
						</tr>
						<?php $i++;}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
