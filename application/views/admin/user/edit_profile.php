<?php 
 $arsUser=$this->session->userdata("arsUser");
if ($arEdit["picture"]=="") {
    $url=FILE_UPLOAD."/upload.png";
}else{
    $url=FILES."admin/".$arEdit['picture']."";
    } ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
            <h4 class="modal-title" id="myModalLabel">Sửa User</h4> </div>
        <div class="modal-body">
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="/admin/admin_user/update_profile">
                <div class="form-group">
                <input type="hidden" name="id_user" value="<?php echo $arsUser["id_user"]?>">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" > Username<span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  required="required" class="form-control col-md-7 col-xs-12" name="username" value="<?php echo $arEdit["username"]?>" disabled="disabled"> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Password<span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password"   class="form-control col-md-7 col-xs-12" name="password" > </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Fullname<span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  required="required" class="form-control col-md-7 col-xs-12" name="fullname" value="<?php echo $arEdit["fullname"]?>"> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Địa chỉ<span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  required="required" class="form-control col-md-7 col-xs-12" name="address" value="<?php echo $arEdit["address"]?>"> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Phone<span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  required="required" class="form-control col-md-7 col-xs-12" name="phone" value="0<?php echo $arEdit["phone"]?>"> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Email<span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  required="required" class="form-control col-md-7 col-xs-12" name="email" value="<?php echo $arEdit["email"]?>"> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Giới thiệu</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="ckeditor" style="width: 100%" id="target" name="gioithieu"><?php echo $arEdit["gioithieu"]?></textarea>
                        
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
                        <input id="image2" onchange="test(this);" class="hide" type="file" name="hinhanh2" /> <a href="javascript:void(0)"  class="removefile" title="Xóa ảnh">&times;</a>
                    </label>
                </div>
                <div class="form-group text-center">
                        <input type="submit"  class="btn btn-success " name="update_profile" value="Cập Nhật">
                </div>
            </form>
        </div>
    </div>
</div>