
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
            <h4 class="modal-title" id="myModalLabel">Sửa Lớp</h4> </div>
        <div class="modal-body">
            <form id="edit_cat" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="/admin/admin_khoa/update_lop">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên lớp<span class="required">*</span> </label>
                    <input type="hidden" name="id_lop" value="<?php echo $arEdit["id_lop"]?>">
                    <input type="hidden" name="id_khoa" value="<?php echo $arEdit["id_khoa"]?>">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control col-md-7 col-xs-12" name="tenlop" value="<?php echo $arEdit['name']?>" > </div>
                </div>
                <div class="form-group text-center">
                        <input type="submit"  class="btn btn-success " name="update" value="Cập Nhật">
                </div>
            </form>
        </div>
    </div>
</div>