<?php 
$arsUser=$this->session->userdata('arsUser');
if ($arsUser["chuc_vu"]!=4) {
    redirect('/trang-chu.html','refresh');
}
?>

<div class="container">
    <form id="edit_assets" data-parsley-validate class="form-horizontal form-label-left" method="post" action="/admin/admin_assets/update/<?php echo $arDetail["id_sotaisan"]?>">
        <div class="form-group has-feedback">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tên tài sản<span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="tentaisan" placeholder="Vui lòng nhập tên tài sản"  class="form-control col-md-7 col-xs-12" value="<?php echo htmlspecialchars($arDetail["name"]);?>" >
                <i class='glyphicon glyphicon-ok form-control-feedback'></i>
            </div>
        </div>
        <div class="form-group has-feedback">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Công ty cung cấp <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" name="nhacungcap" >
                    <option></option>
                    <?php foreach ($arNhacungcap as $key => $value) {
                        if ($value["id_nhacungcap"]==$arDetail["id_nhacungcap"]) {
                            $select="selected=selected";
                        }else{
                            $select="";
                        }
                        ?>
                        <option <?=$select?> value="<?php echo $value['id_nhacungcap']?>"><?php echo $value["tencongty"]?></option>
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
                        <?php foreach ($arNuoc as $key => $value) {
                            if ($value["id_nuoc"]==$arDetail["id_nuoc"]) {
                                $select="selected=selected";
                            }else{
                                $select="";
                            }
                            ?>
                            <option <?=$select?> value="<?php echo $value['id_nuoc']?>"><?php echo $value["tennuoc"]?></option>
                            <?php }?>
                        </select>
                        <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                    </div>
                </div>
                <div class="form-group has-feedback ">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Số thẻ <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" placeholder="Nhập số thẻ" name="sothe" value="<?=$arDetail["so_the"]?>" class="form-control  col-xs-12">
                        <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                    </div>
                </div>
                <div class="form-inline form-group ">
                    <div class="form-group has-feedback col-md-6 col-xs-12  ">
                        <label class="control-label col-md-6 col-xs-12" > Khoa <span class="required">*</span></label>
                        <div class="col-md-6 col-xs-12">
                            <select class="select2_single form-control" id="khoa" tabindex="-1" name="khoa" onchange="idkhoa()">
                                <option></option>
                                <?php foreach ($arKhoa as $key => $value) {
                                    if ($value["id_khoa"]==$arDetail["id_khoa"]) {
                                        $select="selected=selected";
                                    }else{
                                        $select="";
                                    }
                                    ?>
                                    <option <?=$select?> value="<?php echo $value['id_khoa']?>"><?php echo $value["name"]?></option>
                                    <?php }?>
                                </select>
                                <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                            </div>
                        </div>
                        <div class="form-group has-feedback col-md-6 col-xs-12  ">
                            <label class="control-label col-md-3 col-xs-12" > Lớp <span class="required">*</span> </label>
                            <div class="col-md-6 col-xs-12">
                                <select class="select2_single form-control" id="lop" tabindex="-1" name="lop" >
                                    <?php 
                                    foreach ($arLop as $key => $value) {
                                        if ($value["id_lop"]==$arDetail["id_lop"]) {
                                            $select="selected=selected";
                                        }else{
                                            $select="";
                                        }
                                        ?>
                                        <option <?=$select?> value="<?php echo $value['id_khoa']?>"><?php echo $value["name"]?></option>
                                        <?php }?>
                                    </select>
                                    <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-inline form-group ">
                            <div class="form-group has-feedback col-md-6 col-xs-12  ">
                                <label class="control-label col-md-6 col-xs-12" >Loại tài sản <span class="required">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="select2_single form-control" id="loaitaisan" tabindex="-1" name="loaitaisan" onchange="idloaitaisan()">
                                        <option></option>
                                        <?php foreach ($arLoaitaisan as $key => $value) {
                                            if ($value["id_muctaisancha"]==$arDetail["id_muctaisancha"]) {
                                                $select="selected=selected";
                                            }else{
                                                $select="";
                                            }
                                            ?>
                                            <option <?=$select?> value="<?php echo $value['id_muctaisancha']?>"><?php echo $value["tenmuctaisancha"]?></option>
                                            <?php }?>
                                        </select>
                                        <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                    </div>
                                </div>
                                <div class="form-group has-feedback col-md-6 col-xs-12  ">
                                   <label class="control-label col-md-3 col-xs-12" > Mục tài sản <span class="required">*</span></label>
                                   <div class="col-md-6 col-xs-12">
                                       <?php ?>
                                       <select class="select2_single form-control" tabindex="-1" id="muctaisan" name="muctaisan" >
                                           <option></option>
                                           <?php foreach ($arMuctaisan as $key => $value) {
                                            if ($value["id_muctaisan"]==$arDetail["id_muctaisan"]) {
                                                $select="selected=selected";
                                            }else{
                                                $select="";
                                            }
                                            ?>
                                            <option <?=$select?> value="<?php echo $value["id_muctaisan"]?>"><?php echo $value["tenmuctaisan"]?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-inline form-group ">
                                <div class="form-group has-feedback col-md-6 col-xs-12  ">
                                    <label class="control-label col-md-6 col-xs-12" >Năm sản xuất <span class="required">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <input type="text" placeholder="Nhập năm sản xuất" name="namsanxuat" value="<?=$arDetail["nam_sx"]?>" minlength="3" maxlength="4" class="form-control col-xs-12">
                                        <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                    </div>
                                </div>
                                <div class="form-group has-feedback col-md-6 col-xs-12  ">
                                    <label class="control-label col-md-3 col-xs-12" >Đơn giá <span class="required">*</span> </label>
                                    <div class="col-md-6 col-xs-12">
                                        <input type="text" placeholder="Nhập đơn giá" name="dongia" value="<?=$arDetail["don_gia"]?>" class="form-control  col-xs-12">
                                        <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-inline form-group ">
                                <div class="form-group has-feedback col-md-6 col-xs-12  ">
                                    <label class="control-label col-md-6 col-xs-12" >Số lượng <span class="required">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <input type="text" placeholder="Nhập số lượng" name="soluong" value="<?=$arDetail["so_luong"]?>" class="form-control  col-xs-12">
                                        <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                    </div>
                                </div>
                                <div class="form-group has-feedback col-md-6 col-xs-12  ">
                                    <label class="control-label col-md-3 col-xs-12" > Nguyên giá <span class="required">*</span> </label>
                                    <div class="col-md-6 col-xs-12">
                                        <input type="text" placeholder="nhập nguyên giá" name="nguyengia" value="<?=$arDetail["nguyen_gia"]?>" class="form-control  col-xs-12">
                                        <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-inline form-group ">
                                <div class="form-group has-feedback col-md-6 col-xs-12  ">
                                    <label class="control-label col-md-6 col-xs-12" >Nguồn kinh phí <span class="required">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <select class="select2_single form-control"  tabindex="-1" name="nguonkinhphi" >
                                            <option></option>
                                            <?php foreach ($arNguonkinhphi as $key => $value) {
                                                if ($value["id_nguonkinhphi"]==$arDetail["id_kinhphi"]) {
                                                    $select="selected=selected";
                                                }else{
                                                    $select="";
                                                }
                                                ?>
                                                <option <?=$select?> value="<?php echo $value['id_nguonkinhphi']?>"><?php echo $value["tennguonkinhphi"]?></option>
                                                <?php }?>
                                            </select>
                                            <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback col-md-6 col-xs-12  ">
                                        <label class="control-label col-md-3 col-xs-12" > Thời gian SD <span class="required">*</span> </label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="text" name="thoigiansudung" value="<?=$arDetail["thoigian_sd"]?>" class="form-control  col-xs-12">
                                            <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-inline form-group ">
                                    <div class="form-group has-feedback col-md-6 col-xs-12  ">
                                        <label class="control-label col-md-6 col-xs-12" >Ngày mua <span class="required">*</span></label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="text" name="ngaymua" value="<?=$arDetail["ngay_mua"]?>" class="ngay form-control  col-xs-12">
                                            <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback col-md-6 col-xs-12  ">
                                        <label class="control-label col-md-3 col-xs-12" > Năm sử dụng <span class="required">*</span> </label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="tel" maxlength="4" name="namsudung" value="<?=$arDetail["nam_sd"]?>" class="form-control  col-xs-12 ">
                                            <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-inline form-group ">
                                    <div class="form-group has-feedback col-md-6 ">
                                        <label class="control-label col-md-6 col-xs-12" >Ghi chú <span class="required">*</span></label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="text" name="ghichu" value="<?php echo htmlspecialchars($arDetail["ghichu"])?>" class="ngay form-control  col-xs-12">
                                            <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback col-md-6 ">
                                        <label class="control-label col-md-3 col-xs-12" > Người mua <span class="required">*</span> </label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="select2_single form-control" tabindex="-1" name="nguoimua" >

                                             <option></option>
                                             <?php foreach ($arNguoimua as $key => $value) {

                                                if ($value["id_user"]==$arDetail["id_user_mua"]) {
                                                 $selected=' selected="selected"'; 
                                             }else{
                                                $selected='';
                                            }
                                            ?>
                                            <option <?php echo $selected?> value="<?php echo $value['id_user']?>"><?php echo $value["fullname"]?></option>
                                            <?php }?>
                                        </select>
                                        <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group has-feedback">
                                <div class=" col-xs-12 text-center">
                                    <input type="submit" class="btn btn-primary" name="update" value="Cập nhật">
                                    <input type="reset" class="btn btn-success" value="Nhập lại">
                                </div>
                            </div>
                        </form>
                    </div>
