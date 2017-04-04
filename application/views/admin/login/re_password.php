<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Khôi phục mật khẩu</title>
    <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/login/css/css.css">
    <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/login/css/normalize.css">
      <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/login/css/style.css">
</head>
<?php if (isset($_GET['kt'])) {
  $kt=$_GET['kt'];
  echo "<script type='text/javascript'> alert('$kt')</script>";
} ?>
  <body style="font-family: Time News Roman">
<?php  $arsForgot=$this->session->userdata("arsForgot");?>
    <div class="form">
   
   
       <div id="login">
      <h1>Email đã được gửi <br> Nhập mã xác nhận từ Email</h1>'
          
          
          <form action="/admin/admin_login/re_password" method="post">
          
            <div class="field-wrap">
            <input type="hidden" name="id_user" value="<?php echo $arsForgot["id_user"]?>">
            <input type="number" required autocomplete="off" name="maxacnhan"/>
          </div>
          <input type="submit" class="button " name="next" value="Next" style="font-size:16px;" />
          
          </form>

        </div>
        
       
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
        <script src="<?php echo ADMIN_URL ?>/login/js/jquery.min.js"></script>
        <script src="<?php echo ADMIN_URL ?>/login/js/index.js"></script> 
  </body>
</html>


