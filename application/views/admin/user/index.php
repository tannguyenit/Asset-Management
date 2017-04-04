<?php 
$arsUser=$this->session->userdata('arsUser');
if ($arsUser["chuc_vu"]!=4) {
    echo '<script> window.location.href="/trang-chu.html"</script>' ; 
 }
?>
<?php if (count($arHT)>0) {
    echo '<input type="hidden" id="anHT" value="1">';
}else{
    echo '<input type="hidden" id="anHT" value="0">';
    }
?>
<style type="text/css">
    tfoot {
    display: table-header-group;
}
</style>
<div class="x_content bs-example-popovers">
<div class="col-xs-12" id="message">
    <?php $this->load->view('templates/admin/thongbao');?>
</div>
</div>
<div class="col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i> Quản lý user</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">User</a> </li>
                    <?php if ($arsUser["id_user"]==1) {?>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> Thêm user</a> </li>
                    <?php }?>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <div class="x_content table-responsive">
                            <table class="table table-hover table-stripped table-bordered" id="example">
                                <thead>
                                    <tr>
										<th>ID</th>
										<th>Username</th>
                                        <th>Fullname</th>
                                        <th>Trạng thái</th>
										<th>Chức vụ</th>
										<th>Avatar</th>
										<th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                               <?php 
                                  $i=1;
									foreach ($arUser as $key => $value) {
										$id=$value["id_user"];
										if ($value["picture"]=="") {
												$picture="Không có hình";
											}else{
                                                $url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/files/admin/".$value['picture'];
                                              if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
                                               $picture='<img src="'.FILES.'/admin/'. $value["picture"].' " alt="" width="100px" height="100px" " style="border-radius:5px"/>';
                                              }else{
                                                $picture="Lỗi ảnh gốc"; 
                                              }
                                          }
                                            if ($value["active"]==1) {
                                                 $checked='checked'; 
                                             }else{
                                               $checked='';
                                            }
                                           if ($value["username"]=="admin") {
                                               $chucvu="Admin";
                                           }else if($value["id_lop"] >0){
                                                $chucvu="GVCN LỚP ".$value["tenlop"]." ( ".$value["short_name"].")";
                                           }else{
                                                $chucvu=$value["tenchucvu"]."  ".$value["short_name"];
                                           }
										?>
										<tr data-id=<?=$id?>>
											<td><?php echo $i?></td>
											<td><?php echo $value["username"]?></td>
											<td><?php echo $value["fullname"]?></td>
                                            <td>
                                            <input type="checkbox" name="toggle" onchange="active_users(<?php echo $value["id_user"]?>)"  id="user_<?php echo $value['id_user']?>" value=<?php echo $value["active"]?> class="js-switch"  <?php echo $checked;?>>
                                            
                                            </td>
                                            <td><?php echo $chucvu ?></td>
											<td><?php echo $picture?></td>
											<td style="width: 12%;text-align: center;">
                                                <a href="chi-tiet-nguoi-dung/<?php echo $value["id_user"]?>"> <i class="fa fa-pencil fa-fw"></i></a>
												<a href="" data-toggle="modal" data-target=".bs-example-modal-lg"  class="edit_users"><i class="fa fa-eye"></i></i></a>
                                                <?php if ($arsUser["id_user"]==1) {?>
												<a href="javascript:;" title="" onclick="xoa_user(<?php echo $value['id_user']?>)" ><i class="fa fa-trash"></i></a>
                                                <?php }?>
											</td>
										</tr>
									<?php $i++;}?>
								</tbody>
						    </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <form id="index_users" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="/admin/admin_user/add">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="username"  class="form-control col-md-7 col-xs-12">
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
                                    <input type="text" name="fullname"  class="form-control col-md-7 col-xs-12"> </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Địa chỉ<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="diachi"  class="form-control col-md-7 col-xs-12"> </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Số điện thoại<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="tel" minlength="10" maxlength="11"  title="10 numeric characters only"  name="phone"  class="form-control col-md-7 col-xs-12"> </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Chức vụ<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="select2_single form-control" tabindex="-1" id="chucvu" name="chucvu" onchange="showchucvu()">
                                        <option></option>
                                        <?php foreach ($arChucvu as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value["id_group"]?>" id="chucvu_<?php echo $value["id_group"]?>" > <?php echo $value["name"]?></option>
                                        <?php }?>
                                  </select>
                                </div>
                            </div>
                            <div class="form-group" class="showkhoa" id="khoa" style="display: none">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Khoa<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="select2_single form-control" id="khoa_user" tabindex="-1" name="khoa" onchange="idkhoa_user()" >
                                        <option></option>
                                        <?php foreach ($arKhoa as $key => $value) {?>
                                        <option value="<?php echo $value['id_khoa']?>"><?php echo $value["name"]?></option>
                                        <?php }?>
                                  </select>
                                </div>
                            </div>
                            <div class="form-group" class="showkhoa" id="lop" style="display: none">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lớp<span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="select2_single form-control" id="lop_user" tabindex="-1" name="lop" >
                                  </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh</label>
                                <label for="image" class="uploadimg">
                                    <div id="anhxoa" style="display: none"></div> <img id="datafile" src="<?php echo FILE_UPLOAD.'/upload.png'?>" data-img="<?php echo FILE_UPLOAD.'/upload.png'?>" />
                                    <input id="image" class="hide" type="file" name="hinhanh" /> <a href="javascript:void(0)" class="removefile" title="Xóa ảnh">&times;</a> </label>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input type="submit" class="btn btn-primary" name="them" value="Thêm">
                                    <button type="reset" class="btn btn-success">Nhập lại</button>
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