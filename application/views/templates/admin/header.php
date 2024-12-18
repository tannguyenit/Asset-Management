<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="<?php echo FILES?>/admin/logo.ico" type="image/x-icon" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hệ thống quản lý cơ sở vật chất trường Đại Học Quảng Nam</title>
  <link href="<?php echo ADMIN_URL?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
  <link href="<?php echo ADMIN_URL?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/vendors/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/vendors/starrr/dist/starrr.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/build/css/custom.min.css" rel="stylesheet">
  <link href="<?php echo ADMIN_URL?>/build/css/star-rating.css" rel="stylesheet">

</head>
<?php $arsUser=$this->session->userdata('arsUser');
$name=$arsUser["username"];
$fullname=$arsUser["fullname"];
if ($arsUser["picture"]=="") {
  $picture=FILES.'/admin/user.png';
}else{
  $url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/files/admin/".$arsUser["picture"];
    if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
     $picture=FILES.'/admin/'. $arsUser["picture"];
   }else{
    $picture=FILES.'/admin/user.png';
  }


}
?>
<body class="nav-md ">
  <div class="container body ">
    <div class="main_container">
      <div class="col-md-3 left_col ">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="/admin" class="site_title"><i class="fa fa-globe"></i> <span style="text-transform: uppercase;"><?php echo $name?></span></a>
          </div>

          <div class="clearfix"></div>
          <!-- menu profile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="<?php echo $picture ?>" alt="<?php echo ADMIN_URL?>" class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $fullname?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Mananger</h3>
              <ul class="nav side-menu">
                <li><a href="/trang-chu.html"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                </li>
                <!-- User -->
                <?php if ($arsUser["chuc_vu"]==4) {?>
                <li><a><i class="fa fa-user"></i> User <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="/quan-ly-nguoi-dung">Quản lý user</a></li>
                  </ul>
                </li>
                <?php }?>
                <!-- Khoa -->
                <?php  if ($arsUser["chuc_vu"]==1||$arsUser["chuc_vu"]==4) {
                  $khoaname="Khoa";
                }else{
                  $khoaname="Lớp";
                }?>
                <li><a><i class="fa fa-university"></i> <?php echo $khoaname;?> <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <?php if ($arsUser["chuc_vu"]==1||$arsUser["chuc_vu"]==4) {
                     foreach ($this->arKhoa as $key => $value) {?>
                     <li><a href="/<?php echo SEO_URL($value['name']) ?>-<?php echo $value['id_khoa']?>"><?php echo $value["name"]?></a></li>
                     <?php } }else if ($arsUser["chuc_vu"]==2){
                      foreach ($this->arLop as $key => $value) {?>
                      <li><a href="/Lop-<?php echo $value['name'] ?>-<?php echo $value['id_lop']?>.html"><?php echo $value["name"]?></a></li>
                      <?php } }else if ($arsUser["chuc_vu"]==3) {
                        foreach ($this->arLopofKhoa as $key => $value) {?>
                        <li><a href="/Lop-<?php echo $value['name'] ?>-<?php echo $value['id_lop']?>.html"><?php echo $value["name"]?></a></li>
                        <?php } }?>
                      </ul>
                    </li>
                    <!-- Danh mục -->
                    <?php if ($arsUser["chuc_vu"]==4) {?>
                    <li><a><i class="fa fa-table"></i>Danh mục <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="/quan-ly-danh-muc">Quản lý danh mục</a></li>

                        <?php foreach ($this->arCat as $key => $value) {?>
                        <li><a href="/danh-muc/<?php echo SEO_URL($value["tenmuctaisancha"])?>-<?php echo $value['id_muctaisancha']?>"><?php echo $value["tenmuctaisancha"]?></a></li>
                        <?php }?>
                        <li><a href="/nguon-kinh-phi">Nguồn kinh phí</a></li>
                        <li><a href="/nha-cung-cap">Nhà cung cấp</a></li>
                        <li><a href="/nuoc">Nước</a></li>
                      </ul> 
                    </li>
                    <?php }?>
                    <!-- Tài sản -->
                    <?php if ($arsUser["chuc_vu"]!=3) {?>
                    <li><a><i class="fa fa-cubes"></i> Tài sản<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                       <?php if ($arsUser["chuc_vu"]==4) {?>
                       <li><a href="/quan-ly-tai-san.html">Quản lý tài sản</a></li>
                       <li><a href="/dieu-chuyen-tai-san.html">Điều chuyển tài sản</a></li>
                       <li><a href="/thanh-ly-tai-san.html">Thanh lý tài sản</a></li>
                       <?php }?>
                     </ul>
                   </li>
                   <?php }?>
                   <li><a href="/thong-ke-tai-san.html"><i class="fa fa-home"></i> Thống kê <span class="fa fa-chevron-down"></span></a>
                </li>
                   <li><a><i class="fa fa-paint-brush"></i> Đánh giá <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/danh-gia-tai-san.html"> Đánh giá tài sản</a></li>
                      <?php if ($arsUser["chuc_vu"]==4) {?>
                      <li><a href="/danh-gia-lai-tai-san.html"> Đánh giá lại tài sản</a></li>
                      <?php }?>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-envelope-o"></i> Liên hệ <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/lien-he-nguoi-dung">Liên hệ user</a></li>
                      <?php if ($arsUser["chuc_vu"]!=3) {?>
                      <li><a href="/lien-he-khoa">Liên hệ khoa</a></li>
                      <?php }?>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small" style="display: none">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">

            <nav>
              <div class="nav toggle col-xs-1">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div >
              <div class="col-xs-11 col-sm-3 col-sm-offset-2">
                <form class="search-form" method="get" id="form_search" action="/tim-kiem">
                  <?php if (isset($_GET["search"])) {$searchtext= $_GET["search"]; }else{ $searchtext=""; }?>
                  <input type="text" name="search" required="required" value="<?php echo $searchtext?>"  placeholder="Search" class="search-input" id="search">
                  <button type="submit" class="search-button">
                    <svg class="submit-button">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#search"></use>
                    </svg>
                  </button>
                  <div class="search-option">
                    <div>
                      <input name="type" type="radio" value="1"  id="type-users" <?php if (isset($_GET["type"]) &&$_GET["type"]==1) {echo "checked='checked'";}else{ echo "checked='checked'";     }?>>
                      <label for="type-users">
                        <svg class="edit-pen-title">
                          <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use>
                        </svg>
                        <span>Users</span>
                      </label>
                    </div>  
                    <div>
                      <input name="type" type="radio" value="2" id="type-posts" <?php if (isset($_GET["type"]) &&$_GET["type"]==2) {
                       echo "checked='checked'";
                     }?> >
                     <label for="type-posts">
                      <svg class="edit-pen-title">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#post"></use>
                      </svg>
                      <span>Assets</span>
                    </label>
                  </div>
                </div>
              </form>
            </div>
            <ul class="nav navbar-nav navbar-right col-xs-12 col-sm-6">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo $picture ?>" alt=""><?php echo $fullname?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="/trang-ca-nhan/<?php echo $arsUser["id_user"]?>">Profile</a></li>
                  <li><a href="/admin/Admin_logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green"><?php $count=count($this->arMessage); if ($count>0) {
                    echo $count;
                  }  ?></span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <?php foreach ($this->arMessage as $key => $value) {?>
                  <li>
                    <a href="/read-mail/<?php echo $value["id_mail"]?>" onclick="read_mail(<?php echo $value["id_mail"] ?>)">
                      <span>
                        <span><?php echo $value["fullname"]?></span>
                        <span class="time"><?php echo $value["date"]?></span>
                      </span>
                      <span class="message">
                        <?php echo $value["title_mail"]?>
                      </span>
                    </a>
                  </li>
                  <?php } if ($count>0) {?>
                  <li>
                    <div class="text-center">
                      <a href="/lien-he-khoa">
                        <strong>Xem tất cả</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                  <?php }?>
                </ul>
              </li>
              <?php if ($arsUser["username"]=="admin") {?>
              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-money"></i>
                  <span class="badge bg-green"><?php $count=count($this->arBosungKP); if ($count>0) {
                    echo $count;
                  }  ?></span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <?php foreach ($this->arBosungKP as $key => $value) {
                    ?>
                    <li>
                      <a href="" onclick="check_kinhphi(<?php echo $value["id_nguonkinhphi"] ?>)">
                        <span>
                          <span>Bổ sung kinh phí</span>

                        </span>
                        <span class="message">
                         Nguồn kinh phí <?php echo $value["tennguonkinhphi"]?> được bổ sung thêm <?php echo number_format($value["tien_themmoi"],0,",",".")."đ" ?>. Click để xác nhận bổ sung 
                       </span>
                     </a>
                     <a href="" onclick="huy_kinhphi(<?php echo $value["id_nguonkinhphi"] ?>)" title="Hủy">Hủy bổ sung nguồn kinh phí <?php echo $value["tennguonkinhphi"]?></a>
                   </li>
                   <?php }?>
                 </ul>
               </li>

               <?php }?>
               <li >
                <div id="clock">loading ...</div>
              </li>
            </ul>

          </nav>
        </div>
      </div>
    </div>
    <input type="hidden" id="usserlogin" name="" value="<?php echo $arsUser["username"]?>">
    <input type="hidden" id="fullnamelogin" name="" value="<?php echo $arsUser["fullname"]?>">
    <div class="right_col" role="main">

      <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" display="none">
        <symbol id="search" viewBox="0 0 32 32">
          <path d="M 19.5 3 C 14.26514 3 10 7.2651394 10 12.5 C 10 14.749977 10.810825 16.807458 12.125 18.4375 L 3.28125 27.28125 L 4.71875 28.71875 L 13.5625 19.875 C 15.192542 21.189175 17.250023 22 19.5 22 C 24.73486 22 29 17.73486 29 12.5 C 29 7.2651394 24.73486 3 19.5 3 z M 19.5 5 C 23.65398 5 27 8.3460198 27 12.5 C 27 16.65398 23.65398 20 19.5 20 C 15.34602 20 12 16.65398 12 12.5 C 12 8.3460198 15.34602 5 19.5 5 z" />
        </symbol>
        <symbol id="user" viewBox="0 0 32 32">
          <path d="M 16 4 C 12.145852 4 9 7.1458513 9 11 C 9 13.393064 10.220383 15.517805 12.0625 16.78125 C 8.485554 18.302923 6 21.859881 6 26 L 8 26 C 8 21.533333 11.533333 18 16 18 C 20.466667 18 24 21.533333 24 26 L 26 26 C 26 21.859881 23.514446 18.302923 19.9375 16.78125 C 21.779617 15.517805 23 13.393064 23 11 C 23 7.1458513 19.854148 4 16 4 z M 16 6 C 18.773268 6 21 8.2267317 21 11 C 21 13.773268 18.773268 16 16 16 C 13.226732 16 11 13.773268 11 11 C 11 8.2267317 13.226732 6 16 6 z" /></symbol>
          <symbol id="images" viewbox="0 0 32 32">
            <path d="M 2 5 L 2 6 L 2 26 L 2 27 L 3 27 L 29 27 L 30 27 L 30 26 L 30 6 L 30 5 L 29 5 L 3 5 L 2 5 z M 4 7 L 28 7 L 28 20.90625 L 22.71875 15.59375 L 22 14.875 L 21.28125 15.59375 L 17.46875 19.40625 L 11.71875 13.59375 L 11 12.875 L 10.28125 13.59375 L 4 19.875 L 4 7 z M 24 9 C 22.895431 9 22 9.8954305 22 11 C 22 12.104569 22.895431 13 24 13 C 25.104569 13 26 12.104569 26 11 C 26 9.8954305 25.104569 9 24 9 z M 11 15.71875 L 20.1875 25 L 4 25 L 4 22.71875 L 11 15.71875 z M 22 17.71875 L 28 23.71875 L 28 25 L 23.03125 25 L 18.875 20.8125 L 22 17.71875 z" />
          </symbol>
          <symbol id="post" viewbox="0 0 32 32">
            <path d="M 3 5 L 3 6 L 3 23 C 3 25.209804 4.7901961 27 7 27 L 25 27 C 27.209804 27 29 25.209804 29 23 L 29 13 L 29 12 L 28 12 L 23 12 L 23 6 L 23 5 L 22 5 L 4 5 L 3 5 z M 5 7 L 21 7 L 21 12 L 21 13 L 21 23 C 21 23.73015 21.221057 24.41091 21.5625 25 L 7 25 C 5.8098039 25 5 24.190196 5 23 L 5 7 z M 7 9 L 7 10 L 7 13 L 7 14 L 8 14 L 18 14 L 19 14 L 19 13 L 19 10 L 19 9 L 18 9 L 8 9 L 7 9 z M 9 11 L 17 11 L 17 12 L 9 12 L 9 11 z M 23 14 L 27 14 L 27 23 C 27 24.190196 26.190196 25 25 25 C 23.809804 25 23 24.190196 23 23 L 23 14 z M 7 15 L 7 17 L 12 17 L 12 15 L 7 15 z M 14 15 L 14 17 L 19 17 L 19 15 L 14 15 z M 7 18 L 7 20 L 12 20 L 12 18 L 7 18 z M 14 18 L 14 20 L 19 20 L 19 18 L 14 18 z M 7 21 L 7 23 L 12 23 L 12 21 L 7 21 z M 14 21 L 14 23 L 19 23 L 19 21 L 14 21 z" />
          </symbol>
          <symbol id="special" viewbox="0 0 32 32">
            <path d="M 4 4 L 4 5 L 4 27 L 4 28 L 5 28 L 27 28 L 28 28 L 28 27 L 28 5 L 28 4 L 27 4 L 5 4 L 4 4 z M 6 6 L 26 6 L 26 26 L 6 26 L 6 6 z M 16 8.40625 L 13.6875 13.59375 L 8 14.1875 L 12.3125 18 L 11.09375 23.59375 L 16 20.6875 L 20.90625 23.59375 L 19.6875 18 L 24 14.1875 L 18.3125 13.59375 L 16 8.40625 z M 16 13.3125 L 16.5 14.40625 L 17 15.5 L 18.1875 15.59375 L 19.40625 15.6875 L 18.5 16.5 L 17.59375 17.3125 L 17.8125 18.40625 L 18.09375 19.59375 L 17 19 L 16 18.40625 L 15 19 L 14 19.59375 L 14.3125 18.40625 L 14.5 17.3125 L 13.59375 16.5 L 12.6875 15.6875 L 13.90625 15.59375 L 15.09375 15.5 L 15.59375 14.40625 L 16 13.3125 z" />
          </symbol>
        </svg>