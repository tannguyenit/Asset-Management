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
            <h2><i class="fa fa-bars"></i> Quản lý nước</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> Nước </a> </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> Thêm nước</a> </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <div class="x_content table-responsive">
                            <table class="table table-hover table-striped table-bordered bulk_action" id="index_cat_table">
                                <thead>
                                    <tr>
                                        <th style="width: 7%;text-align: center;">ID</th>
                                        <th style="width: 15%;text-align: center;">Mã nước</th>
                                        <th>Tên nước </th>
                                        <th>Chức năng </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                    foreach ($arNuoc as $key => $value) {
                                        $id=$value["id_nuoc"];
                                        ?>
                                        <tr data-id=<?=$id?>>
                                            <td style="width: 7%;text-align: center;"><?php echo $i?></td>
                                            <td style="width: 15%;text-align: center;"><?php echo $value["manuoc"]?></td>
                                            <td><?php echo $value["tennuoc"]?></td>
                                            <td style="width: 12%;text-align: center;">
                                                <a class="edit_nuoc" href="" title="Sửa" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit"></i></a>
                                                <a href="/admin/admin_nuoc/del/<?php echo $value["id_nuoc"]?>" title="Xóa" id="del"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++;}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <form data-parsley-validate class="form-horizontal form-label-left" id="index_nuoc" method="post" action="/admin/admin_nuoc/add">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Mã nước<span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="manuoc" placeholder="Vui lòng nhập mã nước"  class="form-control col-md-7 col-xs-12" >
                                        <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" > Tên nước <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="tennuoc" placeholder="Vui lòng nhập tên nước "  class="form-control col-md-7 col-xs-12" >
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
