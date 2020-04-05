<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Pannel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <style>
    .login-div
    {
      width:50%;
      margin:50px auto;
      background: linear-gradient(to bottom right, #ff6600ba 0%, #000099a8 100%);
    }
    
    .text
    {
        margin:14px auto;
    }
    .login-butn
    {
      width:45%;
      padding:12px;
      background: linear-gradient(to right, #0c2646 0%, #204065 60%, #2a5788 100%);
    }
​
    .input-icons i { 
            position: absolute; 
        } 
          
        .input-icons { 
            width: 100%; 
            margin-bottom: 10px; 
        } 
          
        .icon 
        {
            padding: 10px;
            color: #204065;
            min-width: 185px;
            margin-top: 5px;
            text-align: center;
        }
          
        
        @media only screen and (max-width: 600px) 
        {
            .login-div
            {
               width:100%;
            }
            .icon 
            {
                min-width: 125px;
            }
        }
  </style>
</head>
<body class="bg-light">
  <div class="container">
     <div class="row">
        <div class="login-div shadow p-5">
          <div class=" text-center">
            <i class='fas fa-users' style='font-size:120px;color:#204065;'></i>
          </div>
          <div class="mt-4">
          <?php
              if($this->session->flashdata('msg'))
              {
                 echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
                
              }
            ?>
            <form action="<?=base_url('Login/login_validate')?>" method="post" class="login100-form validate-form">
              <div class="input-icons"> 
                <i class="fa fa-user icon"></i> 
                 <input type="text" required name="email" placeholder="useremail" class=" w-75 p-4 form-control rounded-pill text-center  border-0 m-auto shadow">
              </div> 
              <div class="input-icons"> 
                <i class="fa fa-key icon"></i> 
                <input type="password" required name="password" placeholder="********" class="form-control rounded-pill w-75 text-center p-4 text border-0 shadow">
              </div> 
  
               <div class="mt-5 text-center">
               <button type="submit" class="rounded-pill font-weight-bold border-0 text-white login-butn ">Login
               </button>
               </div>
            </form>
          </div>
        </div>
     </div>
  </div>
</body>
</html>
