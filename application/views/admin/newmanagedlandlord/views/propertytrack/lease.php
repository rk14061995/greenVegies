
 <div class="slide-one-item home-slider owl-carousel">
      <!--<div class="site-blocks-cover overlay" style="background-image:url(<?= base_url('assets_web/images/hero_bg_1.jpg')?>);" data-aos="fade" data-stellar-background-ratio="0.5">-->
      <!--  <div class="container">-->
      <!--    <div class="row align-items-center justify-content-center text-center">-->
      <!--      <div class="col-md-10">-->
      <!--        <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">For Rent</span>-->
      <!--        <h1 class="mb-2">871 Crenshaw Blvd</h1>-->
      <!--        <p class="mb-5"><strong class="h2 text-success font-weight-bold">$2,250,500</strong></p>-->
      <!--        <p><!-- <a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a> --></p>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>  -->

      <!--<div class="site-blocks-cover overlay" style="background-image:url(<?=base_url('assets_web/images/hero_bg_2.jpg')?>);" data-aos="fade" data-stellar-background-ratio="0.5">-->
      <!--  <div class="container">-->
      <!--    <div class="row align-items-center justify-content-center text-center">-->
      <!--      <div class="col-md-10">-->
      <!--        <span class="d-inline-block bg-danger text-white px-3 mb-3 property-offer-type rounded">For Sale</span>-->
      <!--        <h1 class="mb-2">625 S. Berendo St</h1>-->
      <!--        <p class="mb-5"><strong class="h2 text-success font-weight-bold">$1,000,500</strong></p>-->
              <!--<p><a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a></p>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>  -->
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
          <!-- <form class="form-search col-md-12" style="margin-top: -100px;">
            <div class="row  align-items-end">
              <div class="col-md-3">
                <label for="list-types">Listing Types</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="list-types" id="list-types" class="form-control d-block rounded-0">
                    <option value="">Condo</option>
                    <option value="">Commercial Building</option>
                    <option value="">Land Property</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="offer-types">Offer Type</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                    <option value="">For Sale</option>
                    <option value="">For Rent</option>
                    <option value="">For Lease</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="select-city">Select City</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="select-city" id="select-city" class="form-control d-block rounded-0">
                    <option value="">New York</option>
                    <option value="">Brooklyn</option>
                    <option value="">London</option>
                    <option value="">Japan</option>
                    <option value="">Philippines</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <input type="submit" class="btn btn-success text-white btn-block rounded-0" value="Search">
              </div>
            </div>
          </form> -->
        </div>  

        <div class="row">
          <div class="col-md-12">
            <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
              <div class="mr-auto">
                <a href="javascript:void(0)" id="showvertical" class="icon-view view-module active "><span id="showvertical" class="icon-view_module"></span></a>
                <a href="javascript:void(0)" id="showhorizntl" class="icon-view view-list "><span id="showhorizntl" class="icon-view_list"></span></a>
                
              </div>
              <div class="ml-auto d-flex align-items-center">
                <div>
                   <a href="<?=base_url('PropertTrack/ViewSaleData')?>" class="view-list px-3 border-right">Sale</a>
                  <a href="<?=base_url('PropertTrack/ViewRentData')?>" class="view-list px-3">Rent</a>
                  <a href="<?=base_url('PropertTrack/ViewLeaseData')?>" class="view-list px-3">Lease</a>
                </div>


               <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sort By
                 </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="javascript:void(0)" id="ShowLEASEAscending"><label>Price Ascending</label></a>
    <a class="dropdown-item" href="javascript:void(0)" id="ShowLEASEDescending"><strong>Price Descending</strong></a>
    <!--<a class="dropdown-item" href="#">Something else here</a>-->
  </div>
</div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>
       <!--starting horizontal structure -->
 <div class="site-section site-section-sm bg-light" id="horizontal_struct">
        <div class="section-title text-center">
		    <h3>Featured Listings</h3>
            <p>Browse houses and flats for sale and to rent in your area</p>
		</div>
        <div class="container">
              <?php
        foreach ($fetch_LeaseBuilding_Data as $Lease_Details) {
              // print_r($building_Details);
              $buildingimage=explode(',',$Lease_Details->building_image);
            
            ?>

            <div class="row mb-4">
              <div class="col-md-12">
                <div class="property-entry horizontal d-lg-flex">
    
                <a href="<?=base_url('PropertTrack/ViewParticularproperty/').$Lease_Details->building_id?>" building_id="<?=$Lease_Details->building_id?>" class="property-thumbnail h-100">
                <div class="offer-type-wrap">
                                   <span class="offer-type bg-danger">Sale</span>
  
                </div>
                <img src="<?php echo base_url().'assets/Building_image/'.$buildingimage[0]?>" alt="Image" width="537px"; height="350px"class="img-fluid">
               
              </a>
    
                  <div class="p-4 property-body">
                
                       <h5 class="text-capitalize font-weight-bold"><?=$Lease_Details->building_note?></h5>
                    <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> <?= $Lease_Details->address ?></span>
                    <strong class="property-price text-primary mb-3 d-block text-success">$<?=$Lease_Details->price?></strong>
                    <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem dolorem tenetur magni. Aspernatur odit rem repudiandae cumque tenetur enim consequuntur esse.</p>-->
                    <ul class="property-specs-wrap mb-3 mb-lg-0">
                     <li>
                    <span class="property-specs">Country</span>
                    <span class="property-specs-number"><?=$Lease_Details->country_name?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">State</span>
                    <span class="property-specs-number"><?=$Lease_Details->state_name?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">City</span>
                    <span class="property-specs-number"><?=$Lease_Details->city_name?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Units</span>
                    <span class="property-specs-number"><?=$Lease_Details->number_units?></span>
                    
                  </li>
                    </ul>
                    <br>
                     <a href="<?=base_url('PropertTrack/ViewParticularproperty/').$Lease_Details->building_id?>"><div class="price-label" style="background-color: #0d2f66 !important"> <span style="#fff074 !important">$<?=$Lease_Details->price?></span></div></a>
                  </div>
    
                </div>
              </div>
            </div>
             <?php
          }
          ?>
            
            
            
            
        </div>
    </div>
 <!--ending of horizontal structure-->
 
<!--starting of vertical structure-->
 <div class="site-section site-section-sm bg-light" id="leasedata">
      <div class="container">
      
       <div class="row mb-5">
           <?php
          foreach ($fetch_LeaseBuilding_Data as $Lease_Details) {
              // print_r($building_Details);
              $buildingimage=explode(',',$Lease_Details->building_image);
            
            ?>

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="property-entry h-100 ">
              <a href="<?=base_url('PropertTrack/ViewParticularproperty/').$Lease_Details->building_id?>"  building_id="<?=$Lease_Details->building_id?>" class="property-thumbnail particularid ">
                <div class="offer-type-wrap">
                  <span class="offer-type bg-danger">Lease</span>
                 <!--  <span class="offer-type bg-success">Rent</span>
                   <span class="offer-type bg-info">Lease</span> -->
                </div>
                <img src="<?php echo base_url().'assets/Building_image/'.$buildingimage[0]?>" alt="Image"  width="340px" height="243px" alt="Image" >
                <!-- <input class="form-control"  type="hidden" value="<?=$building_Details->building_id?>">  -->

              </a>
              <!-- <span class="icon-heart-o" class="property-favorite"></span> -->
              <div class="p-4 property-body">
                <a href="#" ></a>
                <h2 class="property-title"><a href=""><?=$Lease_Details->note?></a></h2>
                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> <?= $Lease_Details->address ?></span>
               <hr>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                    <li>
                    <span class="property-specs">Country</span>
                    <span class="property-specs-number"><?=$Lease_Details->country_name?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">State</span>
                    <span class="property-specs-number"><?=$Lease_Details->state_name?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">City</span>
                    <span class="property-specs-number"><?=$Lease_Details->city_name?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Units</span>
                    <span class="property-specs-number"><?=$Lease_Details->number_units?></span>
                    
                  </li>
                </ul>
                <br>
                  <div class="price-label" style="background-color: #0d2f66 !important"> <span style="#fff074 !important">$<?=$Lease_Details->price?></div>
              </div>
            </div>
          </div>
           <?php
          }
          ?>
 
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
           <!--  <div class="site-pagination">
              <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <span>...</span>
              <a href="#">10</a>
            </div> -->
          </div>  
        </div>
        
      </div>
    </div>
<!--ending of vertical structure-->
   
        <!--starting of lease ascending-->
           <div class="site-section site-section-sm bg-light" id="leaseascending">
      <div class="container">
      
       <div class="row mb-5">
           <?php
          foreach ($fetch_leaseBuilding_Ascending as $Lease_ASCDetails) {
              // print_r($building_Details);
              $buildingimage=explode(',',$Lease_ASCDetails->building_image);
            
            ?>

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="property-entry h-100 ">
              <a href="<?=base_url('PropertTrack/ViewParticularproperty/').$Lease_ASCDetails->building_id?>"  building_id="<?=$Lease_ASCDetails->building_id?>" class="property-thumbnail particularid ">
                <div class="offer-type-wrap">
                  <span class="offer-type bg-danger">Lease</span>
                 <!--  <span class="offer-type bg-success">Rent</span>
                   <span class="offer-type bg-info">Lease</span> -->
                </div>
                <img src="<?php echo base_url().'assets/Building_image/'.$buildingimage[0]?>" alt="Image"  width="340px" height="243px" alt="Image" >
                <!-- <input class="form-control"  type="hidden" value="<?=$Lease_ASCDetails->building_id?>">  -->

              </a>
              <!-- <span class="icon-heart-o" class="property-favorite"></span> -->
              <div class="p-4 property-body">
                <a href="#" ></a>
                <h2 class="property-title"><a href=""><?=$Lease_ASCDetails->note?></a></h2>
                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> <?= $Lease_ASCDetails->address ?></span>
               <hr>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                    <li>
                    <span class="property-specs">Country</span>
                    <span class="property-specs-number"><?=$Lease_ASCDetails->country_name?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">State</span>
                    <span class="property-specs-number"><?=$Lease_ASCDetails->state_name?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">City</span>
                    <span class="property-specs-number"><?=$Lease_ASCDetails->city_name?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Units</span>
                    <span class="property-specs-number"><?=$Lease_ASCDetails->number_units?></span>
                    
                  </li>
                </ul>
                <br>
                  <div class="price-label" style="background-color: #0d2f66 !important"> <span style="#fff074 !important">$<?=$Lease_ASCDetails->price?></div>
              </div>
            </div>
          </div>
           <?php
          }
          ?>
 
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
           <!--  <div class="site-pagination">
              <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <span>...</span>
              <a href="#">10</a>
            </div> -->
          </div>  
        </div>
        
      </div>
    </div>
        <!--ending of lease ascending-->
        
        <!--starting of lease descending-->
              <div class="site-section site-section-sm bg-light" id="leasedescending">
      <div class="container">
      
       <div class="row mb-5">
           <?php
          foreach ($fetch_leaseBuilding_Descending as $Lease_DESCDetails) {
              // print_r($building_Details);
              $buildingimage=explode(',',$Lease_DESCDetails->building_image);
            
            ?>

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="property-entry h-100 ">
              <a href="<?=base_url('PropertTrack/ViewParticularproperty/').$Lease_DESCDetails->building_id?>"  building_id="<?=$Lease_DESCDetails->building_id?>" class="property-thumbnail particularid ">
                <div class="offer-type-wrap">
                  <span class="offer-type bg-danger">Lease</span>
                 <!--  <span class="offer-type bg-success">Rent</span>
                   <span class="offer-type bg-info">Lease</span> -->
                </div>
                <img src="<?php echo base_url().'assets/Building_image/'.$buildingimage[0]?>" alt="Image"  width="340px" height="243px" alt="Image" >
                <!-- <input class="form-control"  type="hidden" value="<?=$Lease_DESCDetails->building_id?>">  -->

              </a>
              <!-- <span class="icon-heart-o" class="property-favorite"></span> -->
              <div class="p-4 property-body">
                <a href="#" ></a>
                <h2 class="property-title"><a href=""><?=$Lease_DESCDetails->note?></a></h2>
                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> <?= $Lease_DESCDetails->address ?></span>
               <hr>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                    <li>
                    <span class="property-specs">Country</span>
                    <span class="property-specs-number"><?=$Lease_DESCDetails->country_name?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">State</span>
                    <span class="property-specs-number"><?=$Lease_DESCDetails->state_name?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">City</span>
                    <span class="property-specs-number"><?=$Lease_DESCDetails->city_name?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Units</span>
                    <span class="property-specs-number"><?=$Lease_DESCDetails->number_units?></span>
                    
                  </li>
                </ul>
                <br>
                  <div class="price-label" style="background-color: #0d2f66 !important"> <span style="#fff074 !important">$<?=$Lease_DESCDetails->price?></div>
              </div>
            </div>
          </div>
           <?php
          }
          ?>
 
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
           <!--  <div class="site-pagination">
              <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <span>...</span>
              <a href="#">10</a>
            </div> -->
          </div>  
        </div>
        
      </div>
    </div>
        <!--ending of lease descendng-->
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
              <!-- <p><span class="read-more">Read More</span></p> -->
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="#" class="service text-center">
              <span class="icon flaticon-sold"></span>
              <h2 class="service-heading">Sold Houses</h2>
              <p>There is only one party in the United States: the Property party... and it has two right wings: Republican and Democrat.</p>
              <!-- <p><span class="read-more">Read More</span></p> -->
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="#" class="service text-center">
              <span class="icon flaticon-camera"></span>
              <h2 class="service-heading">Security Priority</h2>
              <p>I don't want to write an autobiography because I would become public property with no privacy left.</p>
              <!-- <p><span class="read-more">Read More</span></p> -->
            </a>
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

  <script src="js/main.js"></script>
    
  </body>
</html>
<script>
     $(window).load(function(){
       $("#leaseascending").css("display", "none");
    });
    
     $(window).load(function(){
       $("#leasedescending").css("display", "none");
    });
    $(document).on('click','#ShowLEASEAscending',function()
            {
                 $("#leasedescending").hide();
                  $("#horizontal_struct").hide();
                  $("#leasedata").hide();
                // $("#vertical_struc").hide();
                 $("#leaseascending").show();
            });
             $(document).on('click','#ShowLEASEDescending',function()
            {
                 $("#leasedata").hide();
                  $("#horizontal_struct").hide();
                 $("#leaseascending").hide();
                // $("#vertical_struc").hide();
                 $("#leasedescending").show();
            });
        
     </script>
      <script type="text/javascript">
 $(window).load(function() {
       $("#horizontal_struct").css("display", "none");
});
// $(window).load(function() {
//       $("#Ascendingprice").css("display", "none");
// });
       
   
    $(document).on('click','#showhorizntl',function()
    {
        $("#horizontal_struct").show();
          $("#leaseascending").hide();
        $("#leasedata").hide();
         $("#leasedescending").hide();
        
        
        
    });
     $(document).on('click','#showvertical',function()
    {   
         $("#leasedata").show();
        $("#horizontal_struct").hide();
          $("#leaseascending").hide();
         $("#leasedescending").hide();
       
        
    });
     </script> 