<?php 
$tongtien=0;
$tiendung=0;
$tongchi=0;
$tongthanhly=0;
foreach ($arNguonkinhphi as $key => $value) {
  $tongtien=$value["tong_tien"]+$tongtien;
  $tiendung=$tiendung+$value["tong_chi"];
  $tongchi=$tongchi+$value["tong_chi"];
  $tongthanhly=$tongthanhly+$value["tong_thanhly"];
}
?>

<!-- top tiles -->
<div class="row tile_count" style="border-bottom: 1px solid #ccc">

  <div class=" col-xs-12 col-sm-4 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Tổng kinh phí</span>
    <div class="count green"><?php echo number_format($tongtien,0,",",".")?></div>
  </div>
  <div class=" col-xs-12 col-sm-4 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Tổng chi</span>
    <div class="count green"><?php echo number_format($tongchi,0,",",".")?></div>
  </div>
  <div class=" col-xs-12 col-sm-4 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Tổng thanh lý</span>
    <div class="count green"><?php echo number_format($tongthanhly,0,",",".")?></div>
  </div>

</div>
<!-- /top tiles -->

<div class="row">
<div class="col-sm-offset-4 col-sm-4 col-xs-12">

 


</div>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="dashboard_graph">

      <div class="row x_title">
        <div class="col-md-6">
          <h3>Thống kê số lượng tài sản hằng tháng</h3>
          <?php $arThang=(",$thang0,$thang1,$thang2,$thang3,$thang4,$thang5,$thang6,$thang7,$thang8,$thang9,$thang10,$thang11");

          ?>
          <div class="bbb" data-list="<?php echo $arThang;  ?>" style="display: hidden"></div>
        </div>
      </div>

      <div class="col-md-9 col-sm-9 col-xs-12">
        <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
        <div style="width: 100%;">
          <div id="canvas_dahs" class="demo-placeholder" style="width: 100%; height:270px;"></div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3 col-xs-6 bg-white">
        <div class="x_title">
          <h2>Nguồn kinh phí</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"></a>
            </li>
            
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="dashboard-widget-content">

            <div class="sidebar-widget">
              <h4>Nguồn kinh phí </h4>
              <canvas width="150" height="80" id="foo" class="" style="width: 90%;"></canvas>
              <div class="goal-wrapper">
                <span class="gauge-value pull-left">$</span>
                <input type="hidden" id="tiendung" value="<?php echo $tiendung?>">
                <input type="hidden" id="tongtien_kp" value="<?php echo $tongtien ?>">
                <span id="gauge-text"  class="gauge-value pull-left"><?php echo number_format($tiendung,0,",",",")?></span>
                <span id="goal-text" class="goal-value pull-right">$<?php echo number_format($tongtien,0,",",",") ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>
    </div>
  </div>

</div>
<br />


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
