<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Đăng nhập hệ thống</title>
    <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/login/css/css.css">
    <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/login/css/normalize.css">
      <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/login/css/style.css">
</head>
<?php if (isset($_GET['kt'])) {
  $kt=$_GET['kt'];
  echo "<script type='text/javascript'> alert('$kt')</script>";
} ?>
  <body style="font-family: Time News Roman">
    
    <div class="form">
   
      
       <div id="login">
       <?php if ($kt=="") {
         echo '<h1>Vui lòng nhập email để khôi phục mật khẩu</h1>';
       }else{
        echo '<h1>'.$kt.'</h1>';
        }?> 
          
          
          <form action="/admin/admin_login/forgot" method="post">
          
            <div class="field-wrap">
            <label>
              Nhập Email của bạn<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="name_forgot"/>
          </div>
          <input type="submit" class="button " name="back_user" value="Lấy lại mật khẩu" style="font-size:16px;" />
          <a href="/admin/admin_login" style="float: right">Quay về màn hình chính</a>
          </form>

        </div>
        
       
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
        <script src="<?php echo ADMIN_URL ?>/login/js/jquery.min.js"></script>
        <script src="<?php echo ADMIN_URL ?>/login/js/index.js"></script> 
  </body>
</html>


