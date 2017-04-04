 <!DOCTYPE html>
 <html >
 <head>
  <meta charset="UTF-8">
  <title>Đăng nhập hệ thống</title>
  <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/login/css/css.css">
  <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/login/css/normalize.css">
  <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/login/css/style.css">
  <style type="text/css" media="screen">
    .error{
      font-size: 13px;color: red;
    }
  </style>
</head>
<?php 
$message=$this->session->userdata("kt");
$kt=$message["msg"];
if ($kt!="") {
 echo "<script type='text/javascript'> alert('$kt')</script>";
}

$this->session->unset_userdata('kt');
?>
<body>


  <div class="form">

    <ul class="tab-group">
     <li class="tab active"><a href="#login" >Log In</a></li>
     <li class="tab "><a href="#signup" disabled="disabled">Register</a></li>
   </ul>
   <div class="tab-content">
     <div id="login">   
      <h1>Welcome Back!</h1>

      <form action="../admin/admin_login/login" method="post">

        <div class="field-wrap">
          <label>
            Username<span class="req">*</span>
          </label>
          <input type="text" required autocomplete="off" name="username"/>
        </div>

        <div class="field-wrap">
          <label>
            Password<span class="req">*</span>
          </label>
          <input type="password" required autocomplete="off" name="password"/>
        </div>

        <!--   <p class="forgot"><a href="/admin/admin_login/forgot">Forgot Password?</a></p> -->

        <input type="submit" class="button button-block" name="login" value="Log In" />

      </form>

    </div>
    <div id="signup">   
      <h1>Sign Up for Free</h1>

      <form action="../admin/admin_login/register" method="post" id="register">



        <div class="field-wrap">
          <label>
            Username<span class="req">*</span>
          </label>
          <input type="text" required autocomplete="off" name="username" />
        </div>
        <div class="field-wrap">
          <label>
            Set A Password<span class="req">*</span>
          </label>
          <input type="password" required autocomplete="off" name="password" />
        </div>
        <div class="field-wrap">
          <label>
            Email Address<span class="req">*</span>
          </label>
          <input type="email" required autocomplete="off" name="email" />
        </div>
        <div class="field-wrap">
          <label>
            Fullname<span class="req">*</span>
          </label>
          <input type="text" required autocomplete="off" name="fullname" />
        </div>
        



        <input type="submit" class="button button-block" name="Register" value="Register" />

      </form>

    </div>



  </div><!-- tab-content -->

</div> <!-- /form -->
<script src="<?php echo ADMIN_URL ?>/login/js/jquery.min.js"></script>
<script src="<?php echo ADMIN_URL ?>/login/js/index.js"></script> 
<script src="<?php echo ADMIN_URL ?>/js/jquery.validate.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
        $.validator.addMethod("letters", function(value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z_0-9]+$/);
    }, "Tên đăng nhập chỉ được nhập ký tự, số hoặc ký tự gạch dưới");
    $.validator.addMethod("checkUserNames", function(value, element) {
        var result = false;
        $.ajax({
            type: "POST",
            async: false,
            url: "admin/admin_login/check_user",
            data: {
                username: value
            },
            success: function(data) {
                console.log(data)
                if (data == true) {
                    result = false;
                } else {
                    result = true;
                }
            }
        });
        return result;
    }, "Tên đăng nhập đã tồn tại, Vui lòng nhập tên khác");
    $("#register").validate({
        rules: {
            username: {
                required: true,
                minlength: 8,
                maxlength: 36,
                checkUserNames: true,
                letters: true,
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 36
            },
            fullname: {
                required: true,
                minlength: 8,
                maxlength: 36
            },
            mail: {
                required: true,
                mail:true,
            },
        },
       
        messages: {
            username: {
                required: "<span class='validate'>Hãy nhập Tên Đăng Nhập của bạn !</span>",
                minlength: "<span class='validate'>Ít nhất là 8 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                checkUserNames: "<span class='validate'>Tên đăng nhập đã tồn tại</span>",
                letters: "<span class='validate'>Tên đăng nhập chỉ được nhập ký tự, số và dấu gạch dưới</span>"
            },
            password: {
                required: "<span class='validate'>Hãy nhập Mật khẩu của bạn !</span>",
                minlength: "<span class='validate'>Ít nhất là 8 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>"
            },
            fullname: {
                required: "<span class='validate'>Hãy nhập Họ Tên của bạn !</span>",
                minlength: "<span class='validate'>Ít nhất là 8 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>"
            },
            mail: {
                required: "<span class='validate'>Hãy nhập số điện thoại !</span>",
                mail: "<span class='validate'>Mail phải đúng định dạng</span>",
                
            },
            
        }
    });
          });
        </script>
        
      </body>
      </html>


