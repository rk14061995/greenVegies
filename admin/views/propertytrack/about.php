

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image:url(<?=base_url('assets_web/images/hero_bg_2.jpg')?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">About Manage LandLord</h1>
          </div>
        </div>
      </div>
    </div>
    

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <img src="<?=base_url('assets_web/images/about.jpg')?>" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-5 ml-auto"  data-aos="fade-up" data-aos-delay="200">
            <div class="site-section-title">
              <h2>Our Company</h2>
            </div>
            <p class="lead">The land on which the cattle grazed was communal property. It was owned by no one. It was nobody's private farm. It was the common property of the people, shared by the people. So the practice of sharing was central to the concept of ownership of property.</p>
            <!-- <p><a href="#" class="btn btn-outline-primary rounded-0 py-2 px-5">Read More</a></p> -->
          </div>
        </div>
      </div>
    </div>

 <!--    <div class="site-section">
    <div class="container">
      <div class="row mb-5 justify-content-center"  data-aos="fade-up" >
        <div class="col-md-7">
          <div class="site-section-title text-center">
            <h2>Leadership</h2>
            <p>No power on earth has a right to take our property from us without our consent.</p>
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5"  data-aos="fade-up" data-aos-delay="200">
            <div class="team-member">

              <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded mb-4">

              <div class="text">

                <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. Totam atque corporis nisi, veniam non. Tempore cupiditate, vitae minus obcaecati provident beatae!</p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>

            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5"  data-aos="fade-up" data-aos-delay="300">
            <div class="team-member">

              <img src="images/person_2.jpg" alt="Image" class="img-fluid rounded mb-4">

              <div class="text">

                <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cumque vitae voluptates culpa earum similique corrupti itaque veniam doloribus amet perspiciatis recusandae sequi nihil tenetur ad, modi quos id magni!</p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>

            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5"  data-aos="fade-up" data-aos-delay="400">
            <div class="team-member">

              <img src="images/person_3.jpg" alt="Image" class="img-fluid rounded mb-4">

              <div class="text">

                <h2 class="mb-2 font-weight-light text-black h4">Philip Martin</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores illo iusto, inventore, iure dolorum officiis modi repellat nobis, praesentium perspiciatis, explicabo. Atque cupiditate, voluptates pariatur odit officia libero veniam quo.</p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>

            </div>
          </div>



        </div>
    </div>
    </div> -->


    <div class="site-section bg-light">
      <div class="container" data-aos="fade">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7">
            <div class="site-section-title text-center">
              <h2>Our Owners</h2>
            <p>Truth is the property of no individual but is the treasure of all men.</p>
            </div>
          </div>
        </div>
        <div class="row">
         <?php
      foreach ($fetch_owners_data as $Owners_Details) 
      {
        $myimages=explode(',', $Owners_Details->owner_image);

       ?>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">
              <!-- <img src="<?=base_url()?>assets_web/images/person_1.jpg" alt="Image" class="img-fluid rounded mb-4"> -->
               <img src="<?php echo base_url().'assets/Owner_image/'.$myimages[0]?>" alt="Image"  width="340px" height="243px" alt="Image" >
              <div class="text">
                <h2 class="mb-2 font-weight-light text-black h4"><?=$Owners_Details->fname.' '.$Owners_Details->lname?></h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Owners</span>
                <p><?=$Owners_Details->note?></p>
                <!-- <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p> -->
              </div>
            </div>
          </div>
          <?php
     }

      ?>
         
    </div>

        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <div class="site-section-title">
              <h2>Frequently Ask Questions</h2>
            </div>
            <p>No power on earth has a right to take our property from us without our consent.</p>
          </div>
        </div>

        <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
          <div class="col-md-8">
            <div class="accordion unit-8" id="accordion">
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">What is the name of your company<span class="icon"></span></a>
              </h3>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Manage LandLord</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->
            
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">How much pay for 3  months?<span class="icon"></span></a>
              </h3>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>According To The Property</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">Do I need to register?  <span class="icon"></span></a>
              </h3>
              <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Yes You Need </p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseFour" role="button" aria-expanded="false" aria-controls="collapseFour">Who should I contact in case of support.<span class="icon"></span></a>
              </h3>
              <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>Click To The Contact Links</p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

          </div>
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