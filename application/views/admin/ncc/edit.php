<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
           <h4 class="modal-title" id="myModalLabel">Sửa Nhà Cung Cấp</h4> </div>
           <div class="modal-body">
            <form id="edit_ncc" data-parsley-validate class="form-horizontal form-label-left" method="post" action="/admin/admin_ncc/edit_ncc">
                <input type="hidden" name="id_nhacungcap" value="<?php echo $arEdit["id_nhacungcap"]?>">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mã NCC <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="macongty" class="form-control col-md-7 col-xs-12" value="<?php echo $arEdit['macongty']?>"> </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên NCC<span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="tencongty" value="<?php echo $arEdit['tencongty']?>"  class="form-control col-md-7 col-xs-12"> 
                        </div> 
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Địa chỉ<span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="diachi" value="<?php echo $arEdit['diachi']?>"  class="form-control col-md-7 col-xs-12"> 
                        </div> 
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" name="email" value="<?php echo $arEdit['email']?>"  class="form-control col-md-7 col-xs-12"> 
                        </div> 
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Số điện thoại<span class="required">*</span> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="sdt"  minlength="10" maxlength="11" value="<?php echo $arEdit['sdt']?>" class="form-control col-md-7 col-xs-12"> 
                        </div> 
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group text-center">
                        <input type="submit"  class="btn btn-success " name="update" value="Cập Nhật">
                    </div>
                </form>
            </div>
        </div>
    </div>