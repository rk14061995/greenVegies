<?php 
define("API_KEY","AIzaSyBLSKdLzA9GWn7Pmxzng-iOCE8cay1QDhs") ?>
<script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</script>
<style>
    .amnt {
  padding: 50px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.amnties {
  list-style: order;
}
</style>
<style>
body {
	font-family :Arial;
}
#map-layer {
	margin: 20px 0px;
	max-width: 600px;
	min-height: 400;
}
#btnAction {
	background: #3878c7;
    padding: 10px 40px;
    border: #3672bb 1px solid;
    border-radius: 2px;
    color: #FFF;
    font-size: 0.9em;
    cursor:pointer;
    display:block;
}
#btnAction:disabled {
    background: #6c99d2;
}
</style>


    <div class="site-blocks-cover inner-page-cover overlay" style="background-image:url(<?=base_url('assets_web/images/hero_bg_2.jpg')?>);" data-aos="fade" data-stellar-background-ratio="0.5">
   <?php
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

    <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div>
              <?php
              foreach ($fetch_particular_property as $Paticular_Property)
               {

                //  print_r($Paticular_Property);
                
                ?>
              <div class="slide-one-item home-slider owl-carousel">
                <?php
                    $myImages=explode(',',$Paticular_Property->building_image);
                    for($i=0; $i<count($myImages);$i++)
                    {
                      ?>
                <div>  
                  <img src="<?php echo base_url().'assets/Building_image/'.$myImages[$i]?>" alt="Image"  width="730px" height="487px" alt="Image" >              
                </div>
                <?php       
                    }
                  ?>
                <!-- <div><img src="images/hero_bg_2.jpg" alt="Image" class="img-fluid"></div>
                <div><img src="images/hero_bg_3.jpg" alt="Image" class="img-fluid"></div> -->
              </div>
            </div>
            <div class="bg-white property-body border-bottom border-left border-right">
              <div class="row mb-5">
                <div class="col-md-6">
                  <strong class="text-success h1 mb-3">$<?=$Paticular_Property->price?></strong><br><br>
                    <strong class="d-inline-block text-white mb-0 caption-text bg-danger p-2"><span>Registration Number : </span>  <span class="d-block"><?=$Paticular_Property->registration_num?></span></strong>
                   
               
                   
                   
                    <!--<span class="property-specs-number"><?=$fgk[0]->rating?></span>-->
                  
                </div>
                <div class="col-md-6">
                  <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                       <li>
                    <span class="property-specs">Country</span>
                    <span class="property-specs-number"><strong><?=$Paticular_Property->country_name?></strong><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">State</span>
                    <span class="property-specs-number"><strong><?=$Paticular_Property->state_name?></strong><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">City</span>
                    <span class="property-specs-number"><strong><?=$Paticular_Property->city_name?></strong></span>
                    
                  </li>
                  <li>
                     <span class="property-specs">Units</span>
                    <span class="property-specs-number"><strong><?=$Paticular_Property->number_units?></strong></span>
                  </li>
                  <li>
                     <span class="property-specs">Address</span>
                    <span class="property-specs-number"><strong><?=$Paticular_Property->buildaddress?></strong></span>
                  </li>
                   
                </ul>
                </div>
              </div>

              
              <h2 class="h4 text-black">Overview</h2>
              <p class=" "><strong><?=$Paticular_Property->buildnote?></strong></p>
                
              <div>
                  <?php
            }
              ?>
                   <?php
                        $particular_buy=$Paticular_Property->p_buy;
                        $particular_lease=$Paticular_Property->p_lease;
                        $particular_rent=$Paticular_Property->p_rent;
                            if($particular_buy==1){
                                // $buy="Buy";
                                if($this->session->userdata('login'))
					                {
                                echo '<a href="'.base_url("PropertTrack/Payments").'" class="btn btn-danger finalproperty" customer_build_id="'.$Paticular_Property->building_id.'" style="margin: 5px;">Buy Property</a>';
					                }
					                else{
					                     echo '<a href="'.base_url("PropertTrack/Login").'" class="btn btn-danger" style="margin: 5px;">Buy Property</a>';
					                   
					                }
                            }else{
                                $particular_buy="";
                            }
                            if($particular_rent==1){
                                if($this->session->userdata('login'))
                                {
                                echo '<a href="'.base_url("PropertTrack/Payments").'" class="btn btn-success finalproperty" customer_build_id="'.$Paticular_Property->building_id.'" style="margin: 5px;">Rent Property</a>';
                                }
                                else
                                {
                                    echo '<a href="'.base_url("PropertTrack/Login").'" class="btn btn-success" style="margin: 5px;">Rent Property</a>';
                                }
                            }else{
                                $particular_rent="";
                            }
                            if($particular_lease==1){
                                if($this->session->userdata('login'))
                                {
                                    echo '<a href="'.base_url("PropertTrack/Payments").'" class="btn btn-info finalproperty" customer_build_id="'.$Paticular_Property->building_id.'" style="margin: 5px;">Lease Property</a>';
                                }
                                else
                                {
                                     echo '<a href="'.base_url("PropertTrack/Login").'" class="btn btn-info " style="margin: 5px;">Lease Property</a>';
                                }
                                
                                
                            }else{
                                $particular_lease="";
                            }
                        ?>
                
               </div>
               <style>
                   .amen{
                          padding: 10px;
                            background: gainsboro;
                            margin: 5px;
                            list-style: none;
                            display: inline;
                            font-size: 12px;
                            font-family: sans-serif;
                   }
                       .flour{margin-left: 42px;}
               </style>
                 <div class="row no-gutters mt-5 " >
                     <div class="col">
                         <h2 class="h4 text-black mb-3  ">Amenities</h2>
                         <ul class="d-inline-flex">
                          <?php

                              foreach($ameDetails as $amenities)
                              {
                                //   print_r($amenities);
                                ?>   
                                <li class="amen">
                                  <span> <?=$amenities[0]->amenities_name?> </span><span><img src="<?=base_url('assets/amenities_image/').$amenities[0]->amenities_image?>" alt="Image"  style="width:2em;"  alt="Image" ></span>
                                </li>
                                <?php
                              }
                            ?>
                            </ul>
                     </div>
                 </div>
                  <div class="row no-gutters mt-5 " >
                      <div class="col">
                          <h2 class="h4 text-black mb-3">Flour Plan</h2>
                           <table class="table table-hover" width="100%">
                                <thead style="background: #6a27aa;">
                                    <tr style="color: #FFFFFF">
                                  <th>Property Type</th>
                                  <th>Area</th>
                                  <th>Rate</th>
                                  </tr>
                                </thead>
                                <tbody class="card-header">
                                    <tr>
                                  <td><?=$Paticular_Property->number_units?></td>
                                  <td><?=$Paticular_Property->area?></td>
                                  <td>$<?=$Paticular_Property->price?></td>
                                  </tr>
                                </tbody>
                             </table>
                      </div>
                        
                       
            
                 </div>
                 <!-- <div class="row no-gutters mt-5 " >-->
                 <!--       <h2 class="h4 text-black mb-3  ">Map Location</h2>-->
                 <!--       <input type="hidden" latitude="<?=$Paticular_Property->latitude?>" longitude="<?=$Paticular_Property->longitude?>">-->
                        <!--<div id="button-layer">-->
                        <!--	<button id="btnAction" onClick="locate()">My Current Location</button>-->
                        <!--</div>-->
                        <!--    <div id="map-layer"></div>-->
                                          
                 <!--</div>-->
                 
                <script
                src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&callback=initMap"
                async defer>
                </script>
<script type="text/javascript">
var map;
function initMap() {
	var mapLayer = document.getElementById("map-layer");
	var centerCoordinates = new google.maps.LatLng(37.6, -95.665);
	var defaultOptions = { center: centerCoordinates, zoom: 4 }

	map = new google.maps.Map(mapLayer, defaultOptions);
}

function locate(){
	document.getElementById("btnAction").disabled = true;
	document.getElementById("btnAction").innerHTML = "Processing...";
	if ("geolocation" in navigator){
		navigator.geolocation.getCurrentPosition(function(position){ 
			var currentLatitude = position.coords.latitude;
			var currentLongitude = position.coords.longitude;

			var infoWindowHTML = "Latitude: " + currentLatitude + "<br>Longitude: " + currentLongitude;
			var infoWindow = new google.maps.InfoWindow({map: map, content: infoWindowHTML});
			var currentLocation = { lat: currentLatitude, lng: currentLongitude };
			infoWindow.setPosition(currentLocation);
			document.getElementById("btnAction").style.display = 'none';
		});
	}
}
</script>  
               
                 	
              

              <div class="row no-gutters mt-5">
                  
                  
                <div class="col-12">
                    
                    <div class="row">
                        <div class="col">
                              <h2 class="h4 text-black mb-3">Gallery</h2>
                        </div>
                    </div>
                     <div class="row">
                         <?php
                 
                              foreach ($fetch_particular_property as $Property_image)
                              {
                                //   print_r($Property_image);
                                
                                $myImg=explode(',',$Property_image->building_image);
                                for($i=0; $i<count($myImg);$i++)
                                {
                                    
                                    ?>
                                        <div class="col">
                                            <a href="<?= base_url().'assets/Building_image/'.$myImg[$i]?>" class="image-popup gal-item">
                                            <img src="<?php echo base_url().'assets/Building_image/'.$myImg[$i]?>" alt="Image" width="100%" height="150px" class="img-fluid">
                                            </a>
                                        </div>
                                    <?php
                                }
                                
                              }
                              ?>
                           
                    </div>
                
                </div>
                
               
                          
               
               
                 
              </div>
             
             
            </div>
          </div>
          <div class="col-lg-4">

            <div class="bg-white widget border rounded">

              <h3 class="h4 text-black widget-title mb-3 btn btn-primary">Send Us Your Rating</h3>
               <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
              <form action="<?=base_url('PropertTrack/addUserReview')?>" method="post"  class="form-contact-agent">
                   <?php
              foreach ($fetch_particular_property as $Paticular_Property)
               {
                // print_r( $Paticular_Property);
            //   $building_id=$Paticular_Property->building_id;
            //   print_r( $building_id);
               }
                ?>
                <?php
                    // $alluserdata=$this->session->login['u_email'];
                    // print_r($this->session->login);
                    $myDetails=$this->session->login;
                    //  print($myDetails[0]->u_email);
                    
                   
               ?>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text"  name="uname" value="<?=$myDetails[0]->u_name?>"class="form-control" required>
                  <input type="hidden" value="<?=$Paticular_Property->building_id;?>"name="build_id" class="form-control" >
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                 
                  <input type="email"  value="<?=$myDetails[0]->u_email?>"name="email" class="form-control" required>
                   
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" name="phone" class="form-control" required>
                </div>
                 <div class="form-group">
                   <label class="font-weight-bold">Review</label>
                   <textarea type="text" rows="50" cols="10" name="review" class="form-control" required  placeholder="Enter Review"></textarea>
                </div>
                 <div class="form-group">
                 <!--<div class="stars">-->
                    <input class="star star-5 stars" value="5"id="star-5" type="radio" name="star"/>
                    <label class="star star-5"  for="star-5"></label>
                    <input class="star star-4 stars" value="4"id="star-4" type="radio" name="star"/>
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3 stars" value="3"id="star-3" type="radio" name="star"/>
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2 stars" value="2"id="star-2" type="radio" name="star"/>
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1 stars" value="1"id="star-1" type="radio" name="star"/>
                    <label class="star star-1" for="star-1"></label>
                <!--</div>-->
                </div>
                <div class="form-group">
                 <button type="submit"  class="btn btn-success  py-2 px-4 rounded-0">Submit</buton>
                </div>
              </form>
            </div>

            

          </div>
          
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container">

       <!--  <div class="row">
          <div class="col-12">
            <div class="site-section-title mb-5">
              <h2>Related Properties</h2>
            </div>
          </div>
        </div>
       -->
        <!-- <div class="row mb-5">
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="property-entry h-100">
              <a href="property-details.html" class="property-thumbnail">
                <div class="offer-type-wrap">
                  <span class="offer-type bg-danger">Sale</span>
                  <span class="offer-type bg-success">Rent</span>
                </div>
                <img src="images/img_1.jpg" alt="Image" class="img-fluid">
              </a>
              <div class="p-4 property-body">
                <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                <h2 class="property-title"><a href="property-details.html">625 S. Berendo St</a></h2>
                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 625 S. Berendo St Unit 607 Los Angeles, CA 90005</span>
                <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                  <li>
                    <span class="property-specs">Beds</span>
                    <span class="property-specs-number">2 <sup>+</sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Baths</span>
                    <span class="property-specs-number">2</span>
                    
                  </li>
                  <li>
                    <span class="property-specs">SQ FT</span>
                    <span class="property-specs-number">7,000</span>
                    
                  </li>
                </ul>

              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="property-entry h-100">
              <a href="property-details.html" class="property-thumbnail">
                <div class="offer-type-wrap">
                  <span class="offer-type bg-danger">Sale</span>
                  <span class="offer-type bg-success">Rent</span>
                </div>
                <img src="images/img_2.jpg" alt="Image" class="img-fluid">
              </a>
              <div class="p-4 property-body">
                <a href="#" class="property-favorite active"><span class="icon-heart-o"></span></a>
                <h2 class="property-title"><a href="property-details.html">871 Crenshaw Blvd</a></h2>
                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 1 New York Ave, Warners Bay, NSW 2282</span>
                <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                  <li>
                    <span class="property-specs">Beds</span>
                    <span class="property-specs-number">2 <sup>+</sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Baths</span>
                    <span class="property-specs-number">2</span>
                    
                  </li>
                  <li>
                    <span class="property-specs">SQ FT</span>
                    <span class="property-specs-number">1,620</span>
                    
                  </li>
                </ul>

              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="property-entry h-100">
              <a href="property-details.html" class="property-thumbnail">
                <div class="offer-type-wrap">
                  <span class="offer-type bg-info">Lease</span>
                </div>
                <img src="images/img_3.jpg" alt="Image" class="img-fluid">
              </a>
              <div class="p-4 property-body">
                <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                <h2 class="property-title"><a href="property-details.html">853 S Lucerne Blvd</a></h2>
                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 853 S Lucerne Blvd Unit 101 Los Angeles, CA 90005</span>
                <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                  <li>
                    <span class="property-specs">Beds</span>
                    <span class="property-specs-number">2 <sup>+</sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Baths</span>
                    <span class="property-specs-number">2</span>
                    
                  </li>
                  <li>
                    <span class="property-specs">SQ FT</span>
                    <span class="property-specs-number">5,500</span>
                    
                  </li>
                </ul>

              </div>
            </div>
          </div>
        </div> -->
      </div>

 

  </div>
<script>
     $(document).ready(function(){
          $('.finalproperty').on('click',function(){
              var customer_build_id=$(this).attr('customer_build_id');
            //   alert(customer_build_id);
            //   $.ajax({
            //       url:"<?=base_url("PropertTrack/Payments")?>",
            //       type="post",
            //       data={},
            //       success:function(response)
            //       {
                      
            //       }
            //   });
              
             
                  
            
           
          });
     });
</script>
  <script src="<?=base_url()?>assets_web/js/jquery-3.3.1.min.js"></script>
  <script src="<?=base_url()?>assets_web/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?=base_url()?>assets_web/js/jquery-ui.js"></script>
  <script src="<?=base_url()?>assets_web/js/popper.min.js"></script>
  <script src="<?=base_url()?>assets_web/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets_web/js/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>assets_web/js/mediaelement-and-player.min.js"></script>
  <script src="<?=base_url()?>assets_web/js/jquery.stellar.min.js"></script>
  <script src="<?=base_url()?>assets_web/js/jquery.countdown.min.js"></script>
  <script src="<?=base_url()?>assets_web/js/jquery.magnific-popup.min.js"></script>
  <script src="<?=base_url()?>assets_web/js/bootstrap-datepicker.min.js"></script>
  <script src="<?=base_url()?>assets_web/js/aos.js"></script>
  <script src="<?=base_url()?>assets_web/js/circleaudioplayer.js"></script>

  <script src="<?=base_url()?>assets_web/js/main.js"></script>
    
  </body>
</html>