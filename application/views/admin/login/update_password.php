<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Cập nhật mật khẩu</title>
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
      <h1>Vui lòng nhập mật khẩu mới</h1>
          
          <form action="/admin/admin_login/update_password" method="post">
          <input type="hidden" name="id_user" value="<?php echo $arsForgot["id_user"]?>">
            <div class="field-wrap">
            <label>
              Nhập mật khẩu của bạn<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" id="password" name="passnews"/>
          </div>
           <div class="field-wrap">
            <label>
              Nhập mật lại khẩu của bạn<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" id="confirm_password"/>
          </div>
          <input type="submit" class="button " name="finish" value="Lấy lại mật khẩu" style="font-size:16px;" />
          
          </form>

        </div>
        <script type="text/javascript">
          var password = document.getElementById("password")
          , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Mật khẩu không giống nhau! Vui lòng nhập lại");
          } else {
            confirm_password.setCustomValidity('');
          }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
        </script>
        
       
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
        <script src="<?php echo ADMIN_URL ?>/login/js/jquery.min.js"></script>
        <script src="<?php echo ADMIN_URL ?>/login/js/index.js"></script> 
  </body>
</html>


