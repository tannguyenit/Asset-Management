<?php 
$arsUser=$this->session->userdata('arsUser');
if ($arsUser["chuc_vu"]==3) {
    redirect('/trang-chu.html','refresh');
}
if ($arsUser["chuc_vu"]==3) {
   $url=$this->uri->segment(1);
   $arid=explode("-",$url);
   $arID=$arid[count($arid)-1];
   if ($arsUser["id_khoa"]!=$id) {
       redirect('/trang-chu.html','refresh');
   }
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
            <h2><i class="fa fa-bars"></i> <?php echo $arName["name"]?></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Tất cả tài sản</a> </li>
                    <?php if ($arsUser["chuc_vu"]==4) {?>
                    <li role="presentation" ><a href="#lop" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> Quản lý lớp</a> </li>
                    <?php }?>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <div class="x_content table-responsive">
                            <table class="table table-hover table-striped table-bordered bulk_action" id="index_cat_table">
                                <thead>
                                    <tr>
                                    	<th style="width: 7%;text-align: center;">ID</th>
                                        <th style="width: 12%;text-align: center;">Số thẻ</th>
                                        <th>Tên tài sản</th>
                                        <th>Loại tài sản</th>
                                        <th>Mục tài sản</th>
                                        <th>Lớp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                   $i=1;
                                   foreach ($arKhoa as $key => $value) {
                                      $id=$value["id_sotaisan"];
                                      ?>
                                      <tr data-id=<?=$id?>>
                                       <td style="width: 7%;text-align: center;"><?php echo $i?></td>
                                       <td style="width: 12%;text-align: center;"><?php echo $value["so_the"]?></td>
                                       <td><?php echo ($value["name"]);?></td>
                                       <td><?php echo $value["tenmuctaisan"]?></td>
                                       <td><?php echo $value["tenmuctaisancha"]?></td>
                                       <td><?php echo $value["tenlop"]?></td>
                                   </tr>
                                   <?php $i++;}?>
                               </tbody>
                           </table>
                       </div>
                   </div>
                   <div role="tabpanel" class="tab-pane fade" id="lop" aria-labelledby="profile-tab">
                    <div class="col-md-6 col-xs-12 ">
                        <div class="table-responsive">
                            <label>Tất cả lớp</label>
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên lớp</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($arLop as $key => $value) {?>
                                    <tr data-id=<?=$value['id_lop']?>>
                                        <td><?php echo $i?></td>
                                        <td><?php echo ($value["name"])?></td>
                                        <td style="width: 20%;text-align: center;">
                                            <a class="edit_lop" href="" title="Sửa" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit"></i></a>
                                            <a href="/admin/admin_khoa/del_lop/<?php echo $value["id_lop"]?>" title="Xóa" id="del"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++;}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 well">
                        <form id="index_lop" data-parsley-validate class="form-horizontal form-label-left" method="post" action="/admin/admin_khoa/add_lop">
                            <div class="form-group has-feedback">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên lớp<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="tenlop"  class="form-control col-md-7 col-xs-12">
                                    <i class='glyphicon glyphicon-ok form-control-feedback'></i> </div>
                                    <input type="hidden" name="id_khoa" value="<?php echo $arName["id_khoa"]?>"> 
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
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit"></div>