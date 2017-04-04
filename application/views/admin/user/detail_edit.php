<?php 
if ($arEdit[ "picture"]!="" ) {
    $url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/files/admin/".$arEdit['picture'];
    if(file_exists($url_pic)){
        $url=FILES. "/admin/".$arEdit[ 'picture']. "";
    }else{
        $url=FILE_UPLOAD. "/upload.png"; 
    }
}else{  $url=FILE_UPLOAD. "/upload.png"; 
} 
if (count($arHT)>0) {
    echo '<input type="hidden" id="anHT" value="1">';
}else{
    echo '<input type="hidden" id="anHT" value="0">';
    }
?>

<form id="edit_users" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="/admin/admin_user/update_edit">
    <input type="hidden" name="id_user" value="<?php echo $arEdit["id_user"]?>">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username<span class="required">*</span> </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="username" disabled="disabled"  class="form-control col-md-7 col-xs-12" value="<?php echo $arEdit["username"]?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password<span class="required">*</span> </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="password" name="password"  class="form-control col-md-7 col-xs-12"> </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fullname<span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="fullname"  class="form-control col-md-7 col-xs-12" value="<?php echo $arEdit["fullname"]?>"> </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Địa chỉ<span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="diachi"  class="form-control col-md-7 col-xs-12" value="<?php echo $arEdit["address"]?>"> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Số điện thoại<span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="tel" minlength="10" maxlength="11"  title="10 numeric characters only"  name="phone"  class="form-control col-md-7 col-xs-12" value="<?php echo $arEdit["phone"]?>"> </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Chức vụ<span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single form-control" tabindex="-1" id="chucvu" name="chucvu" onchange="showchucvu()">
                                <option></option>
                                <?php foreach ($arChucvu as $key => $value) {
                                    if ($value["id_chucvu"]==$arEdit["chuc_vu"]) {
                                        $selected="selected='selected'";
                                    }else{
                                        $selected='';
                                    }
                                    ?>
                                    <option value="<?php echo $value["id_group"]?>" <?php echo $selected?> id="chucvu_<?php echo $value["id_group"]?>" > <?php echo $value["name"]?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <?php 
                        $style="";
                        if ($arEdit["id_khoa"]==0) {
                         $style='style="display: none"';
                     }?>
                     <div class="form-group" class="showkhoa" id="khoa" <?php echo $style?>>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Khoa<span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single form-control" id="khoa_user" tabindex="-1" name="khoa" onchange="idkhoa_user()" >
                                <option></option>
                                <?php foreach ($arKhoa as $key => $value) {

                                 if ($value["id_khoa"]==$arEdit["id_khoa"]) {
                                    $selected="selected='selected'";
                                }else{
                                    $selected='';
                                }
                                ?>
                                <option <?php echo $selected?> value="<?php echo $value['id_khoa']?>"><?php echo $value["name"]?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <?php 
                    $style="";
                    if ($arEdit["id_lop"]==0) {
                     $style='style="display: none"';
                 }?>
                 <div class="form-group" class="showkhoa" id="lop" <?php echo $style?>>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lớp<span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single form-control" id="lop_user" tabindex="-1" name="lop" >
                            <?php foreach ($arLop as $key => $value) {

                             if ($value["id_lop"]==$arEdit["id_lop"]) {
                                $selected="selected='selected'";
                            }else{
                                $selected='';
                            }
                            ?>
                            <option <?php echo $selected?> value="<?php echo $value['id_khoa']?>"><?php echo $value["name"]?></option>
                            <?php }?>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh</label>
                    <label for="image2" class="uploadimg">
                        <!-- lấy id -->
                        <input type="hidden" id="id_user" value="<?php echo $arEdit["id_user"]?>">
                        <!-- lấy name_pic -->
                        <input type="hidden" id="namepic_user" value="<?php echo $arEdit["picture"]?>">
                        <!-- hiển thị -->
                        <div id="anhxoa_user" style="display: none"></div>
                        <img id="datafile_user" style="width:348px;height: 168px" src="<?php echo $url ?>" data-img="<?php echo FILE_UPLOAD.'/upload.png'?>" />
                        <input id="image2" onchange="test(this);" class="hide" type="file" name="hinhanh2" /> 
                    </label>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <input type="submit" class="btn btn-primary" name="update" value="Cập nhật">
                        <button type="reset" class="btn btn-success">Nhập lại</button>
                    </div>
                </div>
            </form>