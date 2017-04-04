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
            <h2><i class="fa fa-bars"></i> Quản lý nguồn kinh phí</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Nguồn kinh phí </a> </li>
                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> Thêm nguồn kinh phí</a> </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> Bổ sung nguồn kinh phí</a> </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <div class="x_content table-responsive">
                            <table class="table table-hover table-striped table-bordered bulk_action" id="index_cat_table">
                                <thead>
                                    <tr>
                                        <th style="width: 7%;text-align: center;">ID</th>
                                        <th style="width: 15%;text-align: center;">Mã NKP</th>
                                        <th>Tên nguồn kinh phí</th>
                                        <th>Tổng ngân sách</th>
                                        <th>Tổng chi</th>
                                        <th>Tổng thanh lý</th>
                                        <th>Còn lại</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                    foreach ($arKinhphi as $key => $value) {
                                        $id=$value["id_nguonkinhphi"];
                                        $conlai=$value["tong_tien"]-($value["tong_chi"]);
                                        ?>
                                        <tr data-id=<?=$id?>>
                                            <td style="width: 7%;text-align: center;"><?php echo $i?></td>
                                            <td style="width: 15%;text-align: center;"><?php echo $value["manguonkinhphi"]?></td>
                                            <td><?php echo $value["tennguonkinhphi"]?></td>
                                            <td><?php echo number_format($value["tong_tien"],0,",",".")." đ";?></td>
                                            <td><?php echo number_format($value["tong_chi"],0,",",".")." đ";?></td>
                                            <td><?php echo number_format($value["tong_thanhly"],0,",",".")." đ";?></td>
                                            <td><?php echo number_format($conlai,0,",",".")." đ";?></td>
                                            <td>
                                                <a onclick="edit_kinhphi(<?php echo $id?>)" href="javascript:;" title="Sửa" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit"></i></a>
                                                <?php $arsUser=$this->session->userdata('arsUser');
                                                if ($arsUser["username"]=="admin") {?>
                                                <a href="javascript:;" title="Xóa" id="del" onclick="xoa_danhmuc(<?php echo $id?>)"><i class="fa fa-trash"></i></a>
                                                <?php }?>
                                            </td>
                                        </tr>
                                        <?php $i++;}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <form id="index_kinhphi" data-parsley-validate class="form-horizontal form-label-left" method="post" action="/admin/admin_kinhphi/add">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Mã nguồn kinh phí<span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="manguonkinhphi" placeholder="Vui lòng nhập mã nguồn kinh phí" id="tendm_check" class="form-control col-md-7 col-xs-12" >
                                        <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" > Tên nguồn kinh phí <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="tennguonkinhphi" placeholder="Vui lòng nhập tên nguồn kinh phí" id="tendm_check" class="form-control col-md-7 col-xs-12" >
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
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="/admin/admin_kinhphi/update" id="themkinhphi">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Thêm kinh phí<span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="tong_tien" placeholder="Vui lòng nhập số tiền cần bổ sung" id="tendm_check" class="form-control col-md-7 col-xs-12" >
                                        <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" > Loại kinh phí <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="select2_single form-control" tabindex="-1" name="nguonkinhphi" >
                                            <option></option>
                                            <?php foreach ($arKinhphi as $key => $value) {?>
                                            <option value="<?php echo $value['id_nguonkinhphi']?>"><?php echo $value["tennguonkinhphi"]?></option>
                                            <?php }?>
                                        </select>
                                        <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group has-feedback">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <input type="submit" class="btn btn-primary" name="update" value="Thêm">
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
