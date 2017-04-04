<style type="text/css" media="screen">
  .pagination a,.pagination strong{
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
  }
  .pagination a:first-child{
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px; 
  }
  .pagination a:hover{
    z-index: 2;
    color: #23527c;
    background-color: #eee;
    border-color: #ddd;
  }
  .pagination a:last-child{
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px; 
  }
  
</style>
<div class="">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_content">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
              <ul class="pagination pagination-split">

              </ul>
            </div>
            <div class="clearfix"></div>

            <?php foreach ($arUser as $key => $value) {

if ($value["picture"]=="") {
  $picture=FILES.'/admin/user.png';
}else{
  $url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/files/admin/".$value["picture"];
    if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
     $picture=FILES.'/admin/'. $value["picture"];
   }else{
    $picture=FILES.'/admin/user.png';
  }
}

              ?>
            <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
              <div class="well profile_view">
                <div class="col-sm-12">
                  <h4 class="brief"><i><?php echo $value["username"]?></i></h4>
                  <div class="left col-xs-7">
                    <h2><?php echo $value["fullname"]?></h2>
                    <p><strong>Chức vụ: </strong> <?php echo $value["tenchucvu"]?> </p>
                    <ul class="list-unstyled">
                      <li><i class="fa fa-building"></i> Address: <?php echo $value["address"]?> </li>
                      <li><i class="fa fa-phone"></i> Phone: <?php echo $value["phone"]?></li>
                      <li style="width: 150%"><i class="fa fa-phone"></i> Email: <?php echo $value["email"]?></li>
                    </ul>
                  </div>
                  <div class="right col-xs-5 text-center">
                    <img src="<?php echo $picture?>" alt="" class="img-circle img-responsive">
                  </div>
                </div>
                <div class="col-xs-12 bottom text-center">
                 <a  href="javascript:register_popup('<?php echo $value["username"]?>', '<?php echo $value["fullname"]?>');" class="btn btn-success btn-xs"> <i class="fa fa-user">
                 </i> <i class="fa fa-comments-o"></i> </a>
                 <a href="/admin/admin_user/profile/<?php echo $value["id_user"]?>" class="btn btn-primary btn-xs">
                  <i class="fa fa-user"> </i> View Profile
                </a>
              </div>
            </div>
          </div>
          <?php }?>
        </div>
        <div class="col-xs-12 text-center">
          <ul class="pagination ">
            <?php echo $pagination?>
          </ul>
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>

