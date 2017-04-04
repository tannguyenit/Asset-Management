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
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
            <h4 class="modal-title" id="myModalLabel">Sửa User</h4> </div>
        <div class="modal-body">
            <form id="edit_users" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="/admin/admin_user/update">
                <div class="form-group">
                <input type="hidden" name="id_user" value="<?php echo $arEdit["id_user"]?>">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Username<span class="required">*</span> </label>
                    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  required="required" class="form-control col-md-7 col-xs-12" name="username" value="<?php echo $arEdit["username"]?>"  disabled="disabled"> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fullname<span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  required="required" class="form-control col-md-7 col-xs-12" name="fullname" value="<?php echo $arEdit["fullname"]?>"> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Địa chỉ<span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="diachi"  class="form-control col-md-7 col-xs-12" value="<?php echo $arEdit["address"]?>"> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Số điện thoại<span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="tel" name="phone"  class="form-control col-md-7 col-xs-12" value="<?php echo $arEdit["phone"]?>"> </div>
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
                        <input id="image2" onchange="test(this);" class="hide" type="file" name="hinhanh2" /> <a href="javascript:void(0)" onclick="xoaanh_user()" class="removefile" title="Xóa ảnh">&times;</a>
                    </label>
                </div>
                <div class="form-group text-center">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>