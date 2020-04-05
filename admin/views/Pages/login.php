<!DOCTYPE html>
<html lang="en">
<head>
  <title>Property</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="<?=base_url()?>assets_login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets_login/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets_login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets_login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets_login/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets_login/css/main.css">
<!--===============================================================================================-->
</head>
<body
  <div class="limiter">
    <div class="container-login100">
        
      <div class="wrap-login100 p-b-160 p-t-50">
           <?php
              if($this->session->flashdata('msg'))
              {
                 echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
                
              }
            ?>
        <form action="<?=base_url('Login/login_validate')?>" method="post" class="login100-form validate-form">
          <span class="login100-form-title p-b-43">
            Admin Login
          </span>
           
          
          <div class="wrap-input100 rs1 validate-input confirm-div " data-validate = "Email is required">
             
            <input class="input100 " type="text" required name="email">
            <span class="label-input100">Email</span>
          </div>
          
          
          <div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
            <input class="input100" type="password" required name="password">
            <span class="label-input100">Password</span>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Sign in
            </button>
          </div>
          
         <!--  <div class="text-center w-full p-t-23">
            <a href="#" class="txt1">
              Forgot password?
            </a>
          </div> -->
        </form>
      </div>
    </div>
  </div>
  
  

  
  
<!--===============================================================================================-->
  <script src="<?=base_url()?>assets_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url()?>assets_login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url()?>assets_login/vendor/bootstrap/js/popper.js"></script>
  <script src="<?=base_url()?>assets_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url()?>assets_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url()?>assets_login/vendor/daterangepicker/moment.min.js"></script>
  <script src="<?=base_url()?>assets_login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url()?>assets_login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url()?>assets_login/js/main.js"></script>

</body>
</html>