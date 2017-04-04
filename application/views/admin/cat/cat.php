
<?php 
$arsUser=$this->session->userdata('arsUser');
if ($arsUser["chuc_vu"]!=1&&$arsUser["chuc_vu"]!=4) {
    echo '<script> window.location.href="/admin/admin_index"</script>' ; 
 }
?>
<div class="x_content bs-example-popovers">
<div class="col-xs-12" id="message">
    <?php $this->load->view('templates/admin/thongbao');?>
</div>
</div>
<div class="col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i> <i>Quản lý danh mục</i>  <i style="text-transform: lowercase;"><?php echo $arNameCat["tenmuctaisancha"]?></i></small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><?php echo $arNameCat["tenmuctaisancha"]?></a> </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> Thêm <?php echo $arNameCat["tenmuctaisancha"]?></a> </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <div class="x_content table-responsive">
                            <table class="table table-hover table-striped table-bordered bulk_action" id="cat_table">
                                <thead>
                                    <tr>
                                    	<th style="width: 7%;text-align: center;">ID</th>
                                        <th style="width: 12%;text-align: center;">Mã danh mục</th>
										<th>Tên danh mục</th>
                                        <th>Chức năng</th>
                                        <!-- <th><input type="checkbox" id="check_all_cat" ><a href="" title="">  Xóa tất cả</a></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                               <?php 
                                    $i=1;
									foreach ($arCat as $key => $value) {
										$id=$value["id_muctaisan"];
										?>
										<tr data-id=<?=$id?>>
											<td style="width: 7%;text-align: center;"><?php echo $i?></td>
                                            <td style="width: 12%;text-align: center;"><?php echo $value["mamuctaisan"]?></td>
											<td><?php echo $value["tenmuctaisan"]?></td>
										
											<td style="width: 12%;text-align: center;">
												<a class="edit_cat" href="" title="Sửa" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit"></i></a>
                                                <a href="/admin/admin_cat/del_cat/<?php echo $arCat[0]['id_muctaisancha']?>/<?php echo $value["id_muctaisan"]?>" title="Xóa" id="del"><i class="fa fa-trash"></i></a>
											</td>
                                          <!--   <td style="width: 12%;text-align: center;"><input type="checkbox" id="check_cat"  name="table_records"></td> -->
										</tr>
									<?php $i++;}?>
								</tbody>
						    </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <form id="index_cat" data-parsley-validate class="form-horizontal form-label-left" method="post" action="/admin/admin_cat/add_cat">
                            <div class="form-group has-feedback">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên danh mục<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="tendm" id="tendm_check" class="form-control col-md-7 col-xs-12">
                                    <i class='glyphicon glyphicon-ok form-control-feedback'></i> </div>

                                    
                            </div>
                            <div class="form-group has-feedback">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mã danh mục <span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="madm" class="form-control col-md-7 col-xs-12">
                                    <i class='glyphicon glyphicon-ok form-control-feedback'></i> </div>
                                    <input type="hidden" name="id_dm_cha" id="id_dm_cha" value="<?php echo $arCat[0]["id_muctaisancha"]?>">

                                    
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