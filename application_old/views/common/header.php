<?php
    $webDetail=$this->db->get('website_name_logo')->row();
    // print_r($webDetail);
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title><?=ucwords($webDetail->website_name)?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?=base_url('assets/')?>images/logo/<?=$webDetail->logo_?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?=base_url('assets/')?>images/logo/<?=$webDetail->logo_?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>css/custom.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- swal("Good job!", "You clicked the button!", "success"); -->
<!-- swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
}); -->
</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +91 - <?=$webDetail->contact_no?></a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <?php
                                 if($this->session->userdata('logged_user')){
                                    ?>
                                        <li><a href="<?=base_url('User')?>"><i class="fa fa-user s_color"></i> My Account</a></li>
                                    <?php
                                 }

                            ?>
                            
                            <!-- <li><a href="#"><i class="fas fa-location-arrow"></i> Our location</a></li> -->
                            <!-- <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li> -->
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="login-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
                            <option>Register Here</option>
                            <option>Sign In</option>
                        </select>
                    </div>
                    
                </div> -->
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 offset-md-3">
                    <div class="login-box">
                        <?php
                            // print_r(unserialize($this->session->userdata('logged_user')));
                            if($this->session->userdata('logged_user')){
                                echo '<a href="'.base_url('API/logOut').'" id="log_out" class="btn btn-danger">Log Out</a>';
                            }else{
                                echo '<button class="log_in" class="selectpicker show-tick ">Log In</button><button id="sign_in" class="selectpicker show-tick ">Sign Up</button>';
                            }
                        ?>
                        
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->

                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <h1><a class="navbar-brand" href="<?=base_url('Home')?>"><?=ucwords($webDetail->website_name)?></a></h1>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
						<li class="nav-item"><a class="nav-link" href="<?=base_url('Home')?>">Home</a></li>
						<!-- <li class="nav-item"><a class="nav-link" href="<?=base_url('About')?>">About Us</a></li> -->
						<!-- <li class="dropdown">
							<a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
							<ul class="dropdown-menu">
								<li><a href="shop.html">Sidebar Shop</a></li>
								<li><a href="shop-detail.html">Shop Detail</a></li>
								<li><a href="cart.html">Cart</a></li>
								<li><a href="checkout.html">Checkout</a></li>
								<li><a href="my-account.html">My Account</a></li>
								<li><a href="wishlist.html">Wishlist</a></li>
							</ul>
						</li> -->
                        
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Category</a>
                            <ul class="dropdown-menu">
                                <?php foreach($categories as $cat): ?>
                                    <li><a href="<?=base_url('Shop/').$cat->category;?>"><?=ucwords($cat->category)?></a></li>
                                <?php endforeach; ?>
                                    <!-- <li><a href="shop-detail.html">Shop Detail</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li> -->
                            </ul>
                        </li>
                        
						<li class="nav-item"><a class="nav-link" href="<?=base_url('Gallery')?>">Gallery</a></li>
						<li class="nav-item active"><a class="nav-link" href="<?=base_url('Contact')?>">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge"><?php count($this->cart->contents());?></span>
							<p>My Cart</p>
					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <?php
                            $arrayItems=$this->cart->contents();
                            
                        ?>
                         <?php $totalPrice=0;?>
                        <?php foreach ($arrayItems as $items) : ?>
                        <li>
                            <a href="#" class="photo"><img src="<?=base_url('assets/products_image/').$items['options']['image'];?>" class="cart-thumb rounded-circle" alt="" /></a>
                            <h6><a href="#"><?=ucwords($items['name']);?></a></h6>
                            <p><?=$items['qty']?> x - <span class="price"><?=$webDetail->currency_?> <?=$items['price'];?></span></p>
                        </li>
                        <?php $to=($items['price']) * ($items['qty']);?>
                        <?php $totalPrice+=$to;?>
                    <?php endforeach; ?>
                    <?php $tax=(0.18 * $totalPrice);  ?>
                    <?php $totalPrice + $tax?> 
                        <!-- <li>
                            <a href="#" class="photo"><img src="<?=base_url('assets/')?>images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="<?=base_url('assets/')?>images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li> -->
                        <li class="total">
                            <a href="<?=base_url('Cart')?>" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: <?=$webDetail->currency_?>  <?=$totalPrice + $tax?></span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->
    <!-- Modal -->
    <div id="loginModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <!-- <p>Some text in the modal.</p> -->
            <div class="col-sm-12 col-lg-12 mb-3">
                <div class="title-left">
                    <h3>Account Login</h3>
                </div>
                <form class="mt-3  review-form-box" id="formLogin">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="InputEmail" class="mb-0">Email Address</label>
                            <input type="email" class="form-control" name="em_ail" placeholder="Enter Email"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword" class="mb-0">Password</label>
                            <input type="password" class="form-control" name="pass_w" placeholder="Password"> </div>
                    </div>
                    <button type="submit" class="btn hvr-hover">Login</button>
                </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div id="signModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <!-- <p>Some text in the modal.</p> -->
            <div class="col-sm-12 col-lg-12 mb-3">
                <div class="title-left">
                    <h3>Create New Account</h3>
                </div>
                
                <form class="mt-3  review-form-box" id="formRegister">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="InputName" class="mb-0">First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First Name"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputLastname" class="mb-0">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputEmail1" class="mb-0">Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword1" class="mb-0">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password"> </div>
                    </div>
                    <input type="submit" class="btn hvr-hover">Register</button>
                </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    <script type="text/javascript">
        $(document).on('click','.log_in',function(){
            $('#loginModal').modal('show');
        });
        $(document).on('click','#sign_in',function(){
            $('#signModal').modal('show');
        });
        $(document).on('submit','#formLogin',function(e){
            e.preventDefault();
            var formData= new FormData($(this)[0]);
            $.ajax({
                url:"<?=base_url('API/loginValidate')?>",
                type:"post",
                cache:false,
                processData:false,
                contentType:false,
                data:formData,
                success:function(res){
                    console.log(res);
                    res=JSON.parse(res);
                    if(res.code==1){
                        location.reload();
                    }else{
                        swal("Ooops..!", "Invalid Email or Password", "error");
                    }
                }
            });
        });
        $(document).on('submit','#formRegister',function(e){
            e.preventDefault();
            var formData= new FormData($(this)[0]);
            $.ajax({
                url:"<?=base_url('API/regNewUser')?>",
                type:"post",
                cache:false,
                processData:false,
                contentType:false,
                data:formData,
                success:function(res){
                    // console.log(res);
                    res=JSON.parse(res);
                    if(res.code==1){
                        swal("Great..!", "Registered Successfully.", "success");
                        location.reload();
                    }else{
                        swal("Ooops..!", res.msg, "error");
                    }
                }
            });
        });
        
        $(document).on('click','#log_out',function(){
            $.ajax({
                url:"<?=base_url('API/logOut')?>",
                type:"post",
                success:function(res){
                    console.log(res);
                }
            });
        });
        
    </script>