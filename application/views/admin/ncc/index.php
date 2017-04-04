<?php 
$arsUser=$this->session->userdata('arsUser');
if ($arsUser["chuc_vu"]!=4) {
    redirect('trang-chu','refresh');
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
            <h2><i class="fa fa-bars"></i> Quản lý nhà cung cấp</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Tất cả nhà cung cấp</a> </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> Thêm nhà cung cấp mới</a> </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <div class="x_content table-responsive">
                             <table class="table table-hover table-striped table-bordered bulk_action" id="index_cat_table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th >Mã nhà cung cấp</th>
                                        <th>Tên nhà cung cấp</th>
                                        <th>Địa chỉ</th>
                                        <th>Email</th>
                                        <th>SĐT</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                               <?php 
                                    $i=1;
                                    foreach ($arNcc as $key => $value) {
                                        $id=$value["id_nhacungcap"];
                                        ?>
                                        <tr data-id=<?=$id?>>
                                            <td ><?php echo $i?></td>
                                            <td ><?php echo $value["macongty"]?></td>
                                            <td><?php echo $value["tencongty"]?></td>
                                            <td><?php echo $value["diachi"]?></td>
                                            <td><?php echo $value["email"]?></td>
                                            <td><?php echo $value["sdt"]?></td>
                                            <td style="width: 12%;text-align: center;">
                                                <a class="edit_ncc" href="" title="Sửa" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit"></i></a>
                                                <a href="/admin/admin_ncc/del/<?php echo $value["id_nhacungcap"]?>" title="" id="del"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php $i++;}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <form id="index_ncc" data-parsley-validate class="form-horizontal form-label-left" method="post" action="/admin/admin_ncc/add">
                            <div class="form-group has-feedback">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mã NCC <span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="macongty" class="form-control col-md-7 col-xs-12">
                                    <i class='glyphicon glyphicon-ok form-control-feedback'></i> </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên NCC<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="tencongty"   class="form-control col-md-7 col-xs-12">
                                    <i class='glyphicon glyphicon-ok form-control-feedback'></i> 
                                </div> 
                            </div>
                            <div class="form-group has-feedback">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Địa chỉ<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="diachi"   class="form-control col-md-7 col-xs-12">
                                    <i class='glyphicon glyphicon-ok form-control-feedback'></i> 
                                </div> 
                            </div>
                            <div class="form-group has-feedback">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email"   class="form-control col-md-7 col-xs-12">
                                    <i class='glyphicon glyphicon-ok form-control-feedback'></i> 
                                </div> 
                            </div>
                             <div class="form-group has-feedback">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Số điện thoại<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="sdt"  minlength="10" maxlength="11" class="form-control col-md-7 col-xs-12">
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