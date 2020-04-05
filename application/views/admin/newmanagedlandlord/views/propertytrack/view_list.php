

     <div class="slide-one-item home-slider owl-carousel">
     <?php
    // print_r($fetch_building_data);
    // building_image
    foreach($buildings as $building){
        $imgArray=explode(',',$building->building_image);
        ?>
            <div class="site-blocks-cover overlay" style="background-image:url(<?=base_url().'assets/Building_image/'.$imgArray[0]?>);" data-aos="fade" data-stellar-background-ratio="0.5">
                <div class="container">
                  <div class="row align-items-center justify-content-center text-center">
                    <div class="col-md-10">
                        <?php
                        $p_buy=$building->p_buy;
                        $p_lease=$building->p_lease;
                        $p_rent=$building->p_rent;
                            if($p_buy==1){
                                // $buy="Buy";
                                echo ' <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">For Sale</span> ';
                            }else{
                                $buy="";
                            }
                            if($p_rent==1){
                                echo ' <span class="d-inline-block bg-info text-white px-3 mb-3 property-offer-type rounded">For Rent</span> ';
                            }else{
                                $rent="";
                            }
                            if($p_lease==1){
                                // $lease="Lease";
                                echo ' <span class="d-inline-block bg-danger text-white px-3 mb-3 property-offer-type rounded">For Lease</span> ';
                            }else{
                                $lease="";
                            }
                        ?>
                      <!--<span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">For Rent</span>-->
                      <h1 class="mb-2"><?=ucfirst($building->address)?></h1>
                      <p class="mb-5"><strong class="h2 text-success font-weight-bold">$<?=$building->price?></strong></p>
                      <p><!-- <a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a> --></p>
                    </div>
                  </div>
                </div>
              </div>  
        <?php
    }
    ?>   

    </div>



    <div class="site-section site-section-sm pb-0">
      <div class="container">
        <div class="row">
          <!--<form class="form-search col-md-12" style="margin-top: -100px;">-->
          <!--  <div class="row  align-items-end">-->
          <!--    <div class="col-md-3">-->
          <!--      <label for="list-types">Listing Types</label>-->
          <!--      <div class="select-wrap">-->
          <!--        <span class="icon icon-arrow_drop_down"></span>-->
          <!--        <select name="list-types" id="list-types" class="form-control d-block rounded-0">-->
          <!--          <option value="">Condo</option>-->
          <!--          <option value="">Commercial Building</option>-->
          <!--          <option value="">Land Property</option>-->
          <!--        </select>-->
          <!--      </div>-->
          <!--    </div>-->
          <!--    <div class="col-md-3">-->
          <!--      <label for="offer-types">Offer Type</label>-->
          <!--      <div class="select-wrap">-->
          <!--        <span class="icon icon-arrow_drop_down"></span>-->
          <!--        <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">-->
          <!--          <option value="">For Sale</option>-->
          <!--          <option value="">For Rent</option>-->
          <!--          <option value="">For Lease</option>-->
          <!--        </select>-->
          <!--      </div>-->
          <!--    </div>-->
          <!--    <div class="col-md-3">-->
          <!--      <label for="select-city">Select City</label>-->
          <!--      <div class="select-wrap">-->
          <!--        <span class="icon icon-arrow_drop_down"></span>-->
          <!--        <select name="select-city" id="select-city" class="form-control d-block rounded-0">-->
          <!--          <option value="">New York</option>-->
          <!--          <option value="">Brooklyn</option>-->
          <!--          <option value="">London</option>-->
          <!--          <option value="">Japan</option>-->
          <!--          <option value="">Philippines</option>-->
          <!--        </select>-->
          <!--      </div>-->
          <!--    </div>-->
          <!--    <div class="col-md-3">-->
          <!--      <input type="submit" class="btn btn-success text-white btn-block rounded-0" value="Search">-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</form>-->
        </div>  

        <div class="row">
          <div class="col-md-12">
            <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
              <div class="mr-auto">
                 <a href="<?=base_url('PropertTrack')?>" class="icon-view view-module"><span class="icon-view_module"></span></a>
                <a href="<?=base_url('PropertTrack/View_List')?>" class="icon-view view-list active"><span class="icon-view_list"></span></a>
                
              </div>
              <div class="ml-auto d-flex align-items-center">
                <div>
                   <a href="<?=base_url('PropertTrack/viewParticularPropertyAccToListing/').$id='1'?>" class="view-list px-3 border-right">Sale</a>
                  <a href="<?=base_url('PropertTrack/viewParticularPropertyAccToListing/').$id='2'?>" class="view-list px-3">Rent</a>
                  <a href="<?=base_url('PropertTrack/viewParticularPropertyAccToListing/').$id='3'?>" class="view-list px-3">Lease</a>
                </div>
                </div>


                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select class="form-control form-control-sm d-block rounded-0">
                    <option value="">Sort by</option>
                    <option value="">Price Ascending</option>
                    <option value="">Price Descending</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container">
   
          <div class="row mb-4">
              <?php
          foreach ($fetch_building_data as $building_Details) {
              // print_r($building_Details);
              $buildingimage=explode(',',$building_Details->building_image);
            
            ?>
          <div class="col-md-12">
            <div class="property-entry horizontal d-lg-flex">

              <a href="<?=base_url('PropertTrack/ViewParticularproperty/').$building_Details->building_id?>" building_id="<?=$building_Details->building_id?>" class="property-thumbnail h-100">
                <div class="offer-type-wrap">
                  <span class="offer-type bg-danger">Sale</span>
                  <span class="offer-type bg-success">Rent</span>
                  <span class="offer-type bg-success">Lease</span>
  
                </div>
                <img src="<?php echo base_url().'assets/Building_image/'.$buildingimage[0]?>" alt="Image" width="537px"; height="340px"class="img-fluid">
               
              </a>

              <div class="p-4 property-body">
                 <h5 class="text-capitalize font-weight-bold"><?=$building_Details->building_note?></h5>
                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>  <?= $building_Details->building_address ?></span>
                <strong class="property-price text-primary mb-3 d-block text-success">$<?=$building_Details->price?></strong>
                <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem dolorem tenetur magni. Aspernatur odit rem repudiandae cumque tenetur enim consequuntur esse.</p>-->
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                   <li>
                    <span class="property-specs">State</span>
                    <span class="property-specs-number"><?=$building_Details->building_state?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">City</span>
                    <span class="property-specs-number"><?=$building_Details->building_city?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Units</span>
                    <span class="property-specs-number"><?=$building_Details->number_units?></span>
                    
                  </li>
                </ul>
              </div>

            </div>
          </div>
          <?php
          }
          ?>
        </div>

        <!--<div class="row mb-4">-->
        <!--  <div class="col-md-12">-->
        <!--    <div class="property-entry horizontal d-lg-flex">-->

        <!--      <a href="#" class="property-thumbnail h-100">-->
        <!--        <div class="offer-type-wrap">-->
        <!--          <span class="offer-type bg-danger">Sale</span>-->
        <!--          <span class="offer-type bg-success">Rent</span>-->
        <!--        </div>-->
        <!--        <img src="images/img_3.jpg" alt="Image" class="img-fluid">-->
        <!--      </a>-->

        <!--      <div class="p-4 property-body">-->
        <!--        <a href="#" class="property-favorite active"><span class="icon-heart-o"></span></a>-->
        <!--        <h2 class="property-title"><a href="#">853 S Lucerne Blvd</a></h2>-->
        <!--        <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 853 S Lucerne Blvd Unit 101 Los Angeles, CA 90005</span>-->
        <!--        <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>-->
        <!--        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem dolorem tenetur magni. Aspernatur odit rem repudiandae cumque tenetur enim consequuntur esse.</p>-->
        <!--        <ul class="property-specs-wrap mb-3 mb-lg-0">-->
        <!--          <li>-->
        <!--            <span class="property-specs">Beds</span>-->
        <!--            <span class="property-specs-number">2 <sup>+</sup></span>-->
                    
        <!--          </li>-->
        <!--          <li>-->
        <!--            <span class="property-specs">Baths</span>-->
        <!--            <span class="property-specs-number">2</span>-->
                    
        <!--          </li>-->
        <!--          <li>-->
        <!--            <span class="property-specs">SQ FT</span>-->
        <!--            <span class="property-specs-number">5,500</span>-->
                    
        <!--          </li>-->
        <!--        </ul>-->
        <!--      </div>-->

        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->

        <!--<div class="row mb-4">-->
        <!--  <div class="col-md-12">-->
        <!--    <div class="property-entry horizontal d-lg-flex">-->

        <!--      <a href="#" class="property-thumbnail h-100">-->
        <!--        <div class="offer-type-wrap">-->
        <!--          <span class="offer-type bg-danger">Sale</span>-->
        <!--          <span class="offer-type bg-success">Rent</span>-->
        <!--        </div>-->
        <!--        <img src="images/img_4.jpg" alt="Image" class="img-fluid">-->
        <!--      </a>-->

        <!--      <div class="p-4 property-body">-->
        <!--        <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>-->
        <!--        <h2 class="property-title"><a href="#">853 S Lucerne Blvd</a></h2>-->
        <!--        <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 853 S Lucerne Blvd Unit 101 Los Angeles, CA 90005</span>-->
        <!--        <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>-->
        <!--        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem dolorem tenetur magni. Aspernatur odit rem repudiandae cumque tenetur enim consequuntur esse.</p>-->
        <!--        <ul class="property-specs-wrap mb-3 mb-lg-0">-->
        <!--          <li>-->
        <!--            <span class="property-specs">Beds</span>-->
        <!--            <span class="property-specs-number">2 <sup>+</sup></span>-->
                    
        <!--          </li>-->
        <!--          <li>-->
        <!--            <span class="property-specs">Baths</span>-->
        <!--            <span class="property-specs-number">2</span>-->
                    
        <!--          </li>-->
        <!--          <li>-->
        <!--            <span class="property-specs">SQ FT</span>-->
        <!--            <span class="property-specs-number">5,500</span>-->
                    
        <!--          </li>-->
        <!--        </ul>-->
        <!--      </div>-->

        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->

        <!--<div class="row mb-4">-->
        <!--  <div class="col-md-12">-->
        <!--    <div class="property-entry horizontal d-lg-flex">-->

        <!--      <a href="#" class="property-thumbnail h-100">-->
        <!--        <div class="offer-type-wrap">-->
        <!--          <span class="offer-type bg-danger">Sale</span>-->
        <!--          <span class="offer-type bg-success">Rent</span>-->
        <!--        </div>-->
        <!--        <img src="images/img_5.jpg" alt="Image" class="img-fluid">-->
        <!--      </a>-->

              <!--<div class="p-4 property-body">-->
              <!--  <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>-->
              <!--  <h2 class="property-title"><a href="#">853 S Lucerne Blvd</a></h2>-->
              <!--  <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 853 S Lucerne Blvd Unit 101 Los Angeles, CA 90005</span>-->
              <!--  <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>-->
              <!--  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem dolorem tenetur magni. Aspernatur odit rem repudiandae cumque tenetur enim consequuntur esse.</p>-->
              <!--  <ul class="property-specs-wrap mb-3 mb-lg-0">-->
              <!--    <li>-->
              <!--      <span class="property-specs">Beds</span>-->
              <!--      <span class="property-specs-number">2 <sup>+</sup></span>-->
                    
              <!--    </li>-->
              <!--    <li>-->
              <!--      <span class="property-specs">Baths</span>-->
              <!--      <span class="property-specs-number">2</span>-->
                    
              <!--    </li>-->
              <!--    <li>-->
              <!--      <span class="property-specs">SQ FT</span>-->
              <!--      <span class="property-specs-number">5,500</span>-->
                    
              <!--    </li>-->
              <!--  </ul>-->
              <!--</div>-->

        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->

        <!--<div class="row">-->
        <!--  <div class="col-md-12">-->
        <!--    <div class="property-entry horizontal d-lg-flex">-->

        <!--      <a href="#" class="property-thumbnail h-100">-->
        <!--        <div class="offer-type-wrap">-->
        <!--          <span class="offer-type bg-info">Lease</span>-->
        <!--        </div>-->
        <!--        <img src="images/img_1.jpg" alt="Image" class="img-fluid">-->
        <!--      </a>-->
              
              <!--<div class="p-4 property-body">-->
              <!--  <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>-->
              <!--  <h2 class="property-title"><a href="#">853 S Lucerne Blvd</a></h2>-->
              <!--  <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 853 S Lucerne Blvd Unit 101 Los Angeles, CA 90005</span>-->
              <!--  <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>-->
              <!--  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem dolorem tenetur magni. Aspernatur odit rem repudiandae cumque tenetur enim consequuntur esse.</p>-->
              <!--  <ul class="property-specs-wrap mb-3 mb-lg-0">-->
              <!--    <li>-->
              <!--      <span class="property-specs">Beds</span>-->
              <!--      <span class="property-specs-number">2 <sup>+</sup></span>-->
                    
              <!--    </li>-->
              <!--    <li>-->
              <!--      <span class="property-specs">Baths</span>-->
              <!--      <span class="property-specs-number">2</span>-->
                    
              <!--    </li>-->
              <!--    <li>-->
              <!--      <span class="property-specs">SQ FT</span>-->
              <!--      <span class="property-specs-number">5,500</span>-->
                    
              <!--    </li>-->
              <!--  </ul>-->
              <!--</div>-->

        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
        

        <div class="row mt-5">
          <div class="col-md-12 text-center">
            <div class="site-pagination">
              <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <span>...</span>
              <a href="#">10</a>
            </div>
          </div>  
        </div>
        
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            <div class="site-section-title">
              <h2>Why Choose Us?</h2>
            </div>
            <p>The land on which the cattle grazed was communal property. It was owned by no one. It was nobody's private farm. It was the common property of the people, shared by the people. So the practice of sharing was central to the concept of ownership of property.</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4">
            <a href="#" class="service text-center">
              <span class="icon flaticon-house"></span>
              <h2 class="service-heading">Research Subburbs</h2>
              <p>No power on earth has a right to take our property from us without our consent.</p>
              <!--<p><span class="read-more">Read More</span></p>-->
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="#" class="service text-center">
              <span class="icon flaticon-sold"></span>
              <h2 class="service-heading">Sold Houses</h2>
              <p>There is only one party in the United States: the Property party... and it has two right wings: Republican and Democrat.</p>
              <!--<p><span class="read-more">Read More</span></p>-->
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="#" class="service text-center">
              <span class="icon flaticon-camera"></span>
              <h2 class="service-heading">Security Priority</h2>
              <p>I don't want to write an autobiography because I would become public property with no privacy left.</p>
              <!--<p><span class="read-more">Read More</span></p>-->
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <div class="site-section-title">
              <h2>Recent Blog</h2>
            </div>
            <p>Nature is ever at work building and pulling down, creating and destroying, keeping everything whirling and flowing, allowing no rest but in rhythmical motion, chasing everything in endless song out of one beautiful form into another.</p>
          </div>
        </div>
        <div class="row">
          
         <?php
        foreach ($fetch_blogs_data as $blogData) 
        {
          // print_r($blogData);
        ?>

          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <?php
              $img=$blogData->blog_image;
              $break=explode(',', $img);
           ?>
           
            <a href=" <?=base_url('PropertTrack/ViewParticularBlog/').$blogData->blog_id?>">
              <img src="<?php echo base_url().'assets/blog_image/'.$break[0]?>"alt="Image" width="350px" height="218px"class="img-fluid"></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase"><?=$blogData->date?></span>
              <h2 class="h5 text-black mb-3"><a href="#"><?=$blogData->blog_name?></a></h2>
              <p><?=$blogData->blog_content?></p>
            </div>
          </div>
          <?php
         }
         ?>

        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <!--<div class="row justify-content-center mb-5">-->
        <!--  <div class="col-md-7 text-center">-->
        <!--    <div class="site-section-title">-->
        <!--      <h2>Frequently Ask Questions</h2>-->
        <!--    </div>-->
        <!--    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe architecto error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur corporis, eaque, deleniti cupiditate officia.</p>-->
        <!--  </div>-->
        <!--</div>-->

        <!--<div class="row justify-content-center" data-aos="fade" data-aos-delay="100">-->
        <!--  <div class="col-md-8">-->
        <!--    <div class="accordion unit-8" id="accordion">-->
        <!--    <div class="accordion-item">-->
        <!--      <h3 class="mb-0 heading">-->
        <!--        <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">What is the name of your company<span class="icon"></span></a>-->
        <!--      </h3>-->
        <!--      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">-->
        <!--        <div class="body-text">-->
        <!--          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cumque perspiciatis aperiam accusantium facilis provident aspernatur nisi optio debitis dolorum, est eum eligendi vero aut ad necessitatibus nulla sit labore doloremque magnam! Ex molestiae, dolor tempora, ad fuga minima enim mollitia consequuntur, necessitatibus praesentium eligendi officia recusandae culpa tempore eaque quasi ullam magnam modi quidem in amet. Quod debitis error placeat, tempore quasi aliquid eaque vel facilis culpa voluptate.</p>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--    </div> <!-- .accordion-item -->-->
            
        <!--    <div class="accordion-item">-->
        <!--      <h3 class="mb-0 heading">-->
        <!--        <a class="btn-block" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">How much pay for 3  months?<span class="icon"></span></a>-->
        <!--      </h3>-->
        <!--      <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">-->
        <!--        <div class="body-text">-->
        <!--          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--    </div> <!-- .accordion-item -->

        <!--    <div class="accordion-item">-->
        <!--      <h3 class="mb-0 heading">-->
        <!--        <a class="btn-block" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">Do I need to register?  <span class="icon"></span></a>-->
        <!--      </h3>-->
        <!--      <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">-->
        <!--        <div class="body-text">-->
        <!--          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--    </div> <!-- .accordion-item -->

        <!--    <div class="accordion-item">-->
        <!--      <h3 class="mb-0 heading">-->
        <!--        <a class="btn-block" data-toggle="collapse" href="#collapseFour" role="button" aria-expanded="false" aria-controls="collapseFour">Who should I contact in case of support.<span class="icon"></span></a>-->
        <!--      </h3>-->
        <!--      <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">-->
        <!--        <div class="body-text">-->
        <!--          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--    </div> <!-- .accordion-item -->

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