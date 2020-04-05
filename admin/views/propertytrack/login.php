
<style>
.login-div
{
    height: auto;
    width: 90%;
    margin: 0px auto;
    margin-top: 80px;
    padding-top: 100px;
    padding-bottom: 100px;
    border: 0px solid;
    box-shadow: 0px 5px 5px #dfdbdb;
    background-image: url("<?=base_url()?>assets_web/images/loginimg.jpg");
    background-color: #cccccc;
   
    background-position: center;
    background-repeat: no-repeat; 
    background-size: cover;
}
.login 
{
    width: 37%;
    margin: 5px auto;
    height: auto;
    padding: 15px;
   
    border-radius: 5px;
    background-color: white;
}
.user-img
{
	width:190px;
	height:190px;
	border:1px solid;
	border-radius:50%;
	box-shadow: 0px 5px 15px #2f2d2d;
}
.input-style 
{
  
    border-radius: 3px;
    width: 90%;
    border: none;
    height: 45px;
    font-weight: 500;
   box-shadow: 0px 2px 0px #2f2d2d29;
}
.butn {
    width:82%;
    background: linear-gradient(to right, #0066ff 0%, #6600ff 100%);
    height: 45px;
    border: none;
    color: white;
    font-weight: 600;
    border-radius: 20px;
}
@media only screen and (max-width: 600px) 
{
	 .login
     {
	    width:95%;
	    margin:5px auto;
	    height:auto;
	    padding:15px;
	    box-shadow: 0px 5px 15px #2f2d2d;
	    border-radius:5px;
	    background-color:#ffffffd4;
    }
}
</style>
    <!--<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Login Page</h1>
          </div>
        </div>
      </div>
    </div>-->
    

    <div class="site-section">
       <div class="container">
	      <div class="row login-div">
		     <div class="login">
			     <h2 style="text-align:center;font-weight:500">Login</h2>
				 <hr>
				 
				  <?php
                              if($this->session->flashdata('msg'))
                              {
                               echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
                              }
                            ?>
				 <div class="row mt-5">
				     <!--<div class="col-md-1">-->
					 <!--   <div class="user-img">-->
						<!--   <img src="images/person_4.jpg" class="img-responsive" style="width:190px;border-radius:50%">-->
						<!--</div>-->
					 <!--</div>-->
					 <div class="col-md-12 text-center">
					    <form action="<?=base_url('PropertTrack/Userlogin_validate')?>" method="post">
					      <h5 class="text-left ml-4 font-weight-bold">Email</h5>
					       <i class="fa fa-user"></i><input type="email" name="uemail" required placeholder="Enter Your Email"  style="text-indent:5px" class="input-style">
					       <hr>
					        <h5 class="text-left ml-4 font-weight-bold">Password</h5>
					       <i class="fa fa-lock"></i> <input type="password" name="password" required placeholder="Enter Your Password" style="text-indent:5px" class="input-style mt-3">
						    <div class=" row d-flex justify-content-center">
						        <button type="submit" class=" butn mt-5 ">login</button>
						    </div>
						    <a href="<?=base_url('PropertTrack/registrationForUsers')?>"><h5 class="text-info font-weight-bold mt-5"><u>SIGN UP</u></h5></a>
						</form>
					 </div>
				 </div>
				 <br>
				 <br>
			 </div>
		  </div>
	   </div>
    </div>

   

	


  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/mediaelement-and-player.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/circleaudioplayer.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>