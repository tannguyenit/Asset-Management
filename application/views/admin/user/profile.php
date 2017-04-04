<?php $arsUser=$this->session->userdata("arsUser");?>
<?php 
  if ($arUser["picture"]=="") {
  $picture=FILES.'/admin/user.png';
}else{
      $url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/files/admin/".$arUser["picture"];
    if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
     $picture=FILES.'/admin/'. $arUser["picture"];
    }else{
      $picture=FILES.'/admin/user.png';
    }
  $url=$this->uri->segment(2);
 $id_user=$arsUser["id_user"];
 if ($url==$id_user) {
   
 }else  if ($arsUser["chuc_vu"]!=4) {
    echo '<script> window.location.href="/trang-ca-nhan/'.$id_user.'"</script>' ; 
  }
}
?>
<script>window.loaction</script>
<div class="">
<div class="col-xs-12" id="message">
    <?php $this->load->view('templates/admin/thongbao');?>
</div>
    <input type="hidden" id="id_user" value="<?php echo $arsUser["id_user"]?>">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Trang cá nhân</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <img class="img-responsive avatar-view" src="<?php echo $picture?>" alt="Avatar" title="Change the avatar" style="border-radius: 5px">
                </div>
              </div>
              <h3><?php echo $arUser["fullname"]?></h3>

              <ul class="list-unstyled user_data">
                <li><i class="fa fa-map-marker user-profile-icon"></i> Địa chỉ <?php echo $arUser["address"]?>
                </li>

                <li>
                  <i class="fa fa-envelope user-profile-icon"></i> Email: <?php echo $arUser["email"]?>
                </li>

                <li class="m-top-xs">
                  <i class="fa fa-phone user-profile-icon"></i>
                  <a href="tel: 0<?php echo $arUser["phone"]?>"  >Phone: 0<?php echo $arUser["phone"]?></a>
                </li>
              </ul>
<?php
  $url=$this->uri->segment(2);
 $id_user=$arsUser["id_user"];

  if ($url!=$id_user) {
    echo '' ; 
  }else{
    echo '<a class="btn btn-success edit_profile" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>';
  }

?>
              
              <br />
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Giới thiệu</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
                    <p><?php echo $arUser["gioithieu"]?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit">
            </div>