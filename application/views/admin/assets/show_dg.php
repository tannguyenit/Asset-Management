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
			<h2><i class="fa fa-bars"></i> Danh sách tài sản đã được đánh giá</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<div class="" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
					<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Danh sách tài sản đã được đánh giá</a> </li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
						<div class="x_content table-responsive">
							<table class="table table-hover table-striped table-bordered bulk_action" id="index_danhgia">
								<thead>
									<tr>
										<th>ID</th>
										<th>Số thẻ</th>
										<th>Tên</th>
										<th>Ngày đánh giá</th>
										<th>Xem chi tiết</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i=1;
									foreach ($arDanhgia as $key => $value) {
										$id=$value["id_danhgialaitaisan"];
										?>
										<tr data-id=<?=$id?>>
											<td><?php echo $i?></td>
											<td><?php echo $value["so_the"]?></td>
											<td><?php echo $value["name"]?></td>
											<td><?php echo $value["ngaydanhgia"]?></td>
											<td >
												<a class="show_danhgia" href="" title="Sửa" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i></a>
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
	</div>
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit"></div>
