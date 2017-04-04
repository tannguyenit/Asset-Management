
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
            <h4 class="modal-title" id="myModalLabel">Sửa nguồn kinh phí</h4> </div>
        <div class="modal-body">
            <form id="edit_cat" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="/admin/admin_kinhphi/update_nguonkinhphi">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên nguồn kinh phi<span class="required">*</span> </label>
                    <input type="hidden" name="id_nguonkinhphi" value="<?php echo $arEdit["id_nguonkinhphi"]?>">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control col-md-7 col-xs-12" name="tennguonkinhphi" value="<?php echo $arEdit['tennguonkinhphi']?>" > </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mã nguồn kinh phí <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="manguonkinhphi" class="form-control col-md-7 col-xs-12" value="<?php echo $arEdit['manguonkinhphi']?>"> </div>
                        
                </div>
                <div class="form-group text-center">
                        <input type="submit"  class="btn btn-success " name="update" value="Cập Nhật">
                </div>
            </form>
        </div>
    </div>
</div>