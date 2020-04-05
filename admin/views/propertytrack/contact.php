

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image:url(<?= base_url('assets_web/images/hero_bg_2.jpg')?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Contact Us</h1>
          </div>
        </div>
      </div>
    </div>
    

    <div class="site-section">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
  
            <form action="<?=base_url('PropertTrack/addContactUsdetails')?>" method="post" class="p-5 bg-white border">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold"  for="fullname">Full Name</label>
                  <input type="text"  class="form-control" id="only-text" name="fullname" required placeholder="Type Alphabets Only">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="email" name="email" class="form-control" required  placeholder="Email Address">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold">Subject</label>
                  <input type="text" name="subject" class="form-control" required  placeholder="Enter Subject">
                </div>
              </div>
               <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold">Contact Number</label>
                  <input type="text" name="mobile" class="form-control" required  placeholder="Contact Number">
                </div>
              </div>
              

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Message</label> 
                  <textarea name="message" name="message" cols="30" rows="5" required  class="form-control" placeholder="Type Your Query"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <button type="submit"  class="btn btn-primary  py-2 px-4 rounded-0">Submit</buton>
                </div>
              </div>
              </form>
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class=" mb-0 font-weight-bold text-uppercase">Contact Info</h3>
              <!--<p class="mb-0 font-weight-bold">Address</p>-->
              <!--<p class="mb-4">Uttarakhand,Dehradun ,India</p>-->

              <!--<p class="mb-0 font-weight-bold">Phone</p>-->
              <!--<p class="mb-4"><a href="#">+1 232 3235 324</a></p>-->

              <p class="text-black mt-5 ">Email Address</p>
              <p class="mb-0"><a href="#">info@managedlandlord.com</a></p>

            </div>
            
          </div>
        </div>
      </div>
    </div>

  </div>
  <script>
  $("#only-text").on('keyup', function(e) {
    var val = $(this).val();
   if (val.match(/[^a-zA-Z]/g))
   {
       $(this).val(val.replace(/[^a-zA-Z]/g, ''));
   }
  
});</script>

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