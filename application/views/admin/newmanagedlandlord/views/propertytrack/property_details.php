<?php 
define("API_KEY","AIzaSyBLSKdLzA9GWn7Pmxzng-iOCE8cay1QDhs") ?>
<script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
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
.carousel-inner img {
      width: 100%;
      height: 100%;
  }
  .butn {
    width:100%;
    background: linear-gradient(to right, #0066ff 0%, #6600ff 100%);
    height: 45px;
    border: none;
    color: white;
    margin-top:-13px;
    font-weight: 600;
    border-radius: 20px;
}
.input-style 
{
  
    border-radius: 3px;
    width: 100%;
    border: none;
    height: 45px;
    font-weight: 500;
   box-shadow: 0px 2px 0px #2f2d2d29;
}
.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.column {
  float: left;
  width: 25%;
}

.modal {
  padding-top: 40px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: #131212;
}

.modal-content {
   margin: auto;
    padding: 0;
    width: 70%;
}

.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

.mySlides {
  display: none;
}

.cursor {
  cursor: pointer;
}

.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

img {
  margin-bottom: -4px;
}

.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}


.demo {
  opacity: 0.6;
}
a:not([href]):not([tabindex]) {
     color: white; 
    font-size: 45px;
    text-decoration: none;
}
a:not([href]):not([tabindex]):hover, a:not([href]):not([tabindex]):focus {
    color:white;
    text-decoration: none;
}
.active,
.demo:hover {
  opacity: 1;
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
    </div>
    <div class="site-section  bg-color site-section-sm">
      <div class="container-fluid">
        <div class="row">
             <?php
              foreach ($fetch_particular_property as $Paticular_Property)
               {

                //  print_r($Paticular_Property);
                
                ?>
        
          <div class="offset-1 col-lg-6 ">
              
              <div class="row card p-1 bg-light" style="height:408px">
                  <div id="demo" class="carousel slide" data-ride="carousel">
    
                  <!-- Indicators -->
                  <ul class="carousel-indicators">
                      <?php
                                $i=0;
                                $myImages=explode(',',$Paticular_Property->building_image);
                                    
                                    foreach($myImages as $img){
                                        if($i==0){
                                            $act="active";
                                        }else{
                                            $act="";
                                        }
                                            echo '<li data-target="#demo" data-slide-to="'.$i.'" class="'.$act.'"></li>';
                                        $i++;
                                    }
                                    
                               
                               
                            ?>
                       
                    <!--<li data-target="#demo" data-slide-to="0" class="active"></li>-->
                    
                    
                    <!--<li data-target="#demo" data-slide-to="1"></li>-->
                    
                    
                    
                    
                    <!--<li data-target="#demo" data-slide-to="2"></li>-->
                  </ul>
                  
                  <!-- The slideshow -->
                   
                  <div class="carousel-inner "  >
                    <?php
                        $myImages=explode(',',$Paticular_Property->building_image);
                        for($i=0; $i<count($myImages);$i++)
                        {
                             if($i==0)
                             {
                                $st="active";
                            }
                            else{
                                $st=" ";
                            }
                            ?>  
                       
                            <div class="carousel-item  <?=$st?>">
                               
                              <img src="<?=base_url().'assets/Building_image/'.$myImages[$i]?>" alt=" Image" style="height:400px">
                            </div>
                            <?php
                                    
                        }
                    ?>
                  
                    
                  </div>
                 
                 
                  
                  <!-- Left and right controls -->
                  <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                  </a>
                  <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                  </a>
                </div>
             </div> 
             <div class="row mt-4 card p-4 border border-secondary">
                 <div class="row  bg-light outline w-100 m-auto">
                     <div class="col-sm-12">
                        <h4 class="font-weight-bold">Amenities</h4> 
                    </div>
                    <div class="col-sm-12 p-0">
                        <div class="">
                            <ul style="list-style:none" class="d-flex">
                                <?php

                              foreach($ameDetails as $amenities)
                              {
                                //   print_r($amenities);
                                ?>   
                                <li class="p-1">
                                   <h5 class="bg-secondary p-3 text-white"><span> <?=$amenities[0]->amenities_name?> </span><span><img src="<?=base_url('assets/amenities_image/').$amenities[0]->amenities_image?>" alt="Image"  style="width:2em;"  alt="Image" ></span></h5>
                                </li>
                                <?php
                              }
                            ?>
                                <!--<li class="">-->
                                <!--    <h4 class="bg-secondary p-3 text-white"> <i class='fa fa-male' style="font-size:20px;color:white"></i> Meditation & Yoga Center</h4>-->
                                <!--</li>-->
                                <!--<li class="p-1">-->
                                <!-- <h4 class="bg-secondary p-3 text-white"><i class='fas fa-running' style="font-size:20px;color:white"></i> Gym</h4>-->
                                <!--</li>-->
                                <!--<li class="p-1">-->
                                <!--   <h4 class="bg-secondary p-3 text-white"><i class='fas fa-swimming-pool' style="font-size:20px;color:white"></i> Swimming Pool </h4> -->
                                <!--</li>-->
                                <!--<li class="p-1">-->
                                <!--    <h4 class="bg-secondary p-3 text-white"> <i class='fa fa-male' style="font-size:20px;color:white"></i> Meditation & Yoga Center</h4>-->
                                <!--</li>-->
                                <!--<li class="p-1">-->
                                <!-- <h4 class="bg-secondary p-3 text-white"><i class='fas fa-running' style="font-size:20px;color:white"></i> Gym</h4>-->
                                <!--</li>-->
                                <!--<li class="p-1">-->
                                <!--   <h4 class="bg-secondary p-3 text-white"><i class='fas fa-swimming-pool' style="font-size:20px;color:white"></i> Swimming Pool </h4> -->
                                <!--</li>-->
                                <!--<li class="p-1">-->
                                <!--    <h4 class="bg-secondary p-3 text-white"> <i class='fa fa-male' style="font-size:20px;color:white"></i> Meditation & Yoga Center</h4>-->
                                <!--</li>-->
                            </ul>
                        </div> 
                    </div>
                 </div> 
             </div>
          </div>
          
          <div class="col-lg-4">
              <div class="card p-5 border border-secondary">
                <div class="row bg-light outline">
                    <div class="col-sm-6">
                        <h4 class="font-weight-bold">Price:</h4> 
                    </div>
                    <div class="col-sm-6">
                        <h4 class="bg-success p-2 text-white text-center">$<?=$Paticular_Property->price?></h4>
                    </div>
                </div>
                <div class="row bg-light outline mt-3">
                     <div class="col-sm-6">
                        <h4 class="font-weight-bold">Registration Number:</h4> 
                    </div>
                    <div class="col-sm-6">
                        <h4 class="bg-danger p-2 text-white text-center"><?=$Paticular_Property->registration_num?></h4>
                    </div>
                 </div> 
                 <div class="row bg-light outline mt-3">
                     <div class="col-sm-12">
                        <h4 class="font-weight-bold">Overview:</h4> 
                    </div>
                    <div class="col-sm-12">
                        <h5 class="bg-info p-2 text-white text-center"><?=$Paticular_Property->buildnote?></h5>
                    </div>
                 </div> 
                 <div class="row bg-light outline mt-3">
                     <div class="col-sm-6">
                        <h4 class="font-weight-bold">Address:</h4> 
                    </div>
                    <div class="col-sm-6">
                        <h4 class="bg-dark p-2 text-white text-center"><?=$Paticular_Property->buildaddress?></h4>
                    </div>
                 </div> 
                 <div class="row bg-light outline mt-3">
                     <div class="col-sm-4">
                        <h4 class="font-weight-bold text-center">Country</h4>
                        <h4 class="bg-warning p-2 text-white text-center"><?=$Paticular_Property->country_name?></h4>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="font-weight-bold text-center">State</h4>
                         <h4 class="bg-warning p-2 text-white text-center"><?=$Paticular_Property->state_name?></h4>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="font-weight-bold text-center">City</h4>
                         <h4 class="bg-warning p-2 text-white text-center"><?=$Paticular_Property->city_name?></h4>
                    </div>
                 </div> 
                 <div class="row bg-light outline mt-3">
                     <div class="col-sm-9">
                        <h4 class="font-weight-bold">Units:</h4> 
                    </div>
                    <div class="col-sm-3">
                        <h4 class="bg-white p-2 text-dark border border-secondary text-center"><?=$Paticular_Property->number_units?></h4>
                    </div>
                 </div> 
                 <div class="row bg-light outline mt-3 p-2">
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
                     
                    <!-- <div class="col-sm-4">-->
                    <!--    <button type="button" class="btn btn-danger">Rented property</button>-->
                    <!--</div>-->
                    <!--<div class="col-sm-4">-->
                    <!--    <button type="button" class="btn btn-success">Buy property</button>-->
                    <!--</div>-->
                    <!--<div class="col-sm-4">-->
                    <!--   <button type="button" class="btn btn-primary">Lease property</button> -->
                    <!--</div>-->
                 </div> 
              </div>
          </div>
          <?php
          }
          ?>
        </div>
        
      </div>
    </div>
    
    <div class="site-section site-section-sm">
      <div class="container" style="margin-top:-30px">

        <div class="row">
          <div class="col-12">
            <div class="site-section-title">
              <h2>Gallery</h2>
              <hr>
            </div>
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
                      <div class="column">
                         <div class="property-entry h-100 p-2 bg-secondary">
                            <img src="<?=base_url().'assets/Building_image/'.$myImg[$i]?>" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor img-fluid">
                         </div>
                      </div>
                       <?php
                }
                                
              }
            ?>
          <!--<div class="column">-->
          <!--    <div class="property-entry h-100 p-2 bg-secondary">-->
          <!--      <img src="<?=base_url('assets_web/images/img_7.jpg')?>" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor img-fluid">-->
          <!--   </div>-->
          <!--</div>-->
          <!--<div class="column">-->
          <!--   <div class="property-entry h-100 p-2 bg-secondary">-->
          <!--      <img src="<?=base_url('assets_web/images/img_6.jpg')?>" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor img-fluid">-->
          <!--   </div>-->
          <!--</div>-->
          <!--<div class="column">-->
          <!--   <div class="property-entry h-100 p-2 bg-secondary">-->
          <!--      <img src="<?=base_url('assets_web/images/img_5.jpg')?>" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor img-fluid">-->
          <!--   </div>-->
          <!--</div>-->
        </div>

        <div id="myModal" class="modal">
          <span class="close cursor" onclick="closeModal()">&times;</span>
          <div class="modal-content">
             
             <?php
                $myImg=explode(',',$Property_image->building_image);
                for($i=0; $i<count($myImg);$i++)
                {
                    
                    ?>
                    <div class="mySlides">
                       <img src="<?=base_url().'assets/Building_image/'.$myImg[$i]?>" style="width:100%">
                    </div>
                    <?php
                }
             
             ?>
        
            
        
            <!--<div class="mySlides">-->
            <!--   <img src="<?=base_url('assets_web/images/img_6.jpg')?>" style="width:100%">-->
            <!--</div>-->
            
            <!--<div class="mySlides">-->
            <!--   <img src="<?=base_url('assets_web/images/img_5.jpg')?>" style="width:100%">-->
            <!--</div>-->
            
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
           
          </div>
        </div>
        <!--<div class="row">-->
        <!--  <div class="col-md-6 col-lg-3 mb-4">-->
        <!--    <div class="property-entry h-100 p-2 bg-secondary">-->
        <!--      <a href="property-details.html" class="property-thumbnail">-->
        <!--        <img src="<?=base_url('assets_web/images/img_8.jpg')?>" alt="Image" class="img-fluid">-->
        <!--      </a>-->
        <!--    </div>-->
        <!--  </div>-->

        <!--  <div class="col-md-6 col-lg-3 mb-4">-->
        <!--    <div class="property-entry h-100 p-2 bg-secondary">-->
        <!--      <a href="property-details.html" class="property-thumbnail">-->
        <!--        <img src="<?=base_url('assets_web/images/img_7.jpg')?>" alt="Image" class="img-fluid">-->
        <!--      </a>-->
        <!--    </div>-->
        <!--  </div>-->

        <!--  <div class="col-md-6 col-lg-3 mb-4">-->
        <!--    <div class="property-entry h-100 p-2 bg-secondary">-->
        <!--      <a href="property-details.html" class="property-thumbnail">   -->
        <!--          <img src="<?=base_url('assets_web/images/img_6.jpg')?>" alt="Image" class="img-fluid">-->
        <!--      </a>-->
        <!--    </div>-->
        <!--  </div>-->
          
        <!--  <div class="col-md-6 col-lg-3 mb-4">-->
        <!--    <div class="property-entry h-100 p-2 bg-secondary">-->
        <!--      <a href="property-details.html" class="property-thumbnail">   -->
        <!--          <img src="<?=base_url('assets_web/images/img_5.jpg')?>" alt="Image" class="img-fluid">-->
        <!--      </a>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
       </div>
    </div>

    <!--<div class="site-section site-section-sm bg-light">-->
    <!--  <div class="container">-->

        <!-- <div class="row">-->
        <!--  <div class="col-12">-->
        <!--    <div class="site-section-title">-->
        <!--      <h2>Related Properties</h2>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
       
        <!-- <div class="row ">-->
        <!--  <div class="col-md-6 col-lg-4">-->
        <!--    <div class="property-entry ">-->
        <!--      <a href="property-details.html" class="property-thumbnail">-->
        <!--        <div class="offer-type-wrap">-->
        <!--          <span class="offer-type bg-danger">Sale</span>-->
        <!--          <span class="offer-type bg-success">Rent</span>-->
        <!--        </div>-->
        <!--        <img src="<?=base_url('assets_web/images/img_4.jpg')?>" alt="Image" class="img-fluid">-->
        <!--      </a>-->
        <!--      <div class="p-4 property-body">-->
        <!--        <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>-->
        <!--        <h2 class="property-title"><a href="property-details.html">625 S. Berendo St</a></h2>-->
        <!--        <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 625 S. Berendo St Unit 607 Los Angeles, CA 90005</span>-->
        <!--        <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>-->
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
        <!--            <span class="property-specs-number">7,000</span>-->
                    
        <!--          </li>-->
        <!--        </ul>-->

        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->

        <!--  <div class="col-md-6 col-lg-4 ">-->
        <!--    <div class="property-entry h-100">-->
        <!--      <a href="property-details.html" class="property-thumbnail">-->
        <!--        <div class="offer-type-wrap">-->
        <!--          <span class="offer-type bg-danger">Sale</span>-->
        <!--          <span class="offer-type bg-success">Rent</span>-->
        <!--        </div>-->
        <!--        <img src="<?=base_url('assets_web/images/img_2.jpg')?>" alt="Image" class="img-fluid">-->
        <!--      </a>-->
        <!--      <div class="p-4 property-body">-->
        <!--        <a href="#" class="property-favorite active"><span class="icon-heart-o"></span></a>-->
        <!--        <h2 class="property-title"><a href="property-details.html">871 Crenshaw Blvd</a></h2>-->
        <!--        <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 1 New York Ave, Warners Bay, NSW 2282</span>-->
        <!--        <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>-->
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
        <!--            <span class="property-specs-number">1,620</span>-->
                    
        <!--          </li>-->
        <!--        </ul>-->

        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->

        <!--  <div class="col-md-6 col-lg-4">-->
        <!--    <div class="property-entry h-100">-->
        <!--      <a href="property-details.html" class="property-thumbnail">-->
        <!--        <div class="offer-type-wrap">-->
        <!--          <span class="offer-type bg-info">Lease</span>-->
        <!--        </div>-->
        <!--        <img src="<?=base_url('assets_web/images/img_3.jpg')?>" alt="Image" class="img-fluid">-->
        <!--      </a>-->
        <!--      <div class="p-4 property-body">-->
        <!--        <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>-->
        <!--        <h2 class="property-title"><a href="property-details.html">853 S Lucerne Blvd</a></h2>-->
        <!--        <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 853 S Lucerne Blvd Unit 101 Los Angeles, CA 90005</span>-->
        <!--        <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>-->
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
    <!--   </div>-->
    <!--</div>-->
    
   <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
              <div class="bg-light widget border rounded shadow">
              <h1 class=" text-black widget-title  bg-white p-3 text-center">Send Us Your Rating</h1>
              <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }?>
                <form action="<?=base_url('PropertTrack/addUserReview')?>" method="post"  class="form-contact-agent">
                   <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group mt-2">
                              <label for="name">Name</label>
                               <i class="fa fa-user"></i>
                                <?php
                                     $myDetails=$this->session->login;
                                ?>
                               <input type="text"  name="uname" value="<?=$myDetails[0]->u_name?>"class="form-control input-style" required>
                              <input type="hidden" value="<?=$Paticular_Property->building_id;?>"name="build_id" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group">
                               <label for="email">Email</label>
                               <i class="fa fa-envelope"></i>
                               <input type="email"  value="<?=$myDetails[0]->u_email?>"name="email" class="form-control input-style" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                 <label for="phone">Phone</label>
                                 <i class="fa fa-phone"></i> <input type="text" name="phone" class="form-control input-style" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Review</label>
                                <i class="fa fa-phone"></i> <textarea type="text" rows="50" cols="10" name="review" class="form-control input-style" required  placeholder="Enter Review"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="stars">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-5">
                            <div class="form-group ">
                               <button type="submit" class=" butn">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
          <div class="col-lg-4 card bg-secondary">
             <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center  text-white">Reviews</h1>
                    
                    
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                         
                        <ol class="carousel-indicators">
                            <?php
                                $i=0;
                                foreach($All_Review_Data as $review)
                                {
                                    if($i==0){
                                        $active="active";
                                    }else{
                                        $active="";
                                    }
                                    echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" class="'.$active.'"></li>';
                               
                                }
                            ?>
                            <!--<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>-->
                            <!--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>-->
                            <!--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
                        </ol>
                          
                      <!-- <ol class="carousel-indicators">-->
                      <!--  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>-->
                      <!--  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>-->
                      <!--  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
                      <!--</ol>-->
                      
                      <div class="carousel-inner mt-5">
                        <!--<div class="carousel-item text-center active">-->
                        <!--    <div class="row">-->
                               
                        <!--        <div class="offset-1 col-sm-4">-->
                        <!--            <div class="img-box p-1 border rounded-circle m-auto">-->
                        <!--                <img class="d-block w-100 rounded-circle" src="http://nicesnippets.com/demo/profile-1.jpg" alt="First slide">-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="col-sm-7">-->
                        <!--            <h4 class="mt-4 text-left"><strong class="text-info text-uppercase"><?=$review->user_name?></strong></h4>-->
                        <!--            <h5 class=" text-left text-white font-weight-bold"><?=$review->user_email?></h5>-->
                        <!--             <h5 class=" text-left text-white font-weight-bold"><?=$review->user_phn?></h5>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="row bg-light mt-4 p-5 ">-->
                        <!--        <p class="text-dark fs-review"><?=$review->user_review?></p>-->
                        <!--    </div>-->
                            
                        <!--</div>-->
                         <?php
                                $i=0;
                                foreach($All_Review_Data as $review)
                                {
                                    if($i==0){
                                        $active="active";
                                    }else{
                                        $active=" ";
                                    }
                                    ?>
                                    <div class="carousel-item text-center <?=$active?>">
                                        <div class="row">
                                            <div class="offset-1 col-sm-4">
                                                <div class="img-box p-1 border rounded-circle m-auto">
                                                    <img class="d-block w-100 rounded-circle" src="http://nicesnippets.com/demo/profile-1.jpg" alt="First slide">
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <h4 class="mt-4 text-left"><strong class="text-info text-uppercase"><?=$review->user_name?></strong></h4>
                                                <h5 class=" text-left text-white font-weight-bold"><?=$review->user_email?></h5>
                                                 <h5 class=" text-left text-white font-weight-bold"><?=$review->user_phn?></h5>
                                            </div>
                                        </div>
                                        <div class="row bg-light mt-4 p-5">
                                            <p class="text-dark fs-review"><?=$review->user_review?></p>
                                        </div>
                                    </div>
                                    <?php
                                $i++;
                                }
                            ?>
                        <!--<div class="carousel-item text-center">-->
                        <!--    <div class="row">-->
                        <!--        <div class="offset-1 col-sm-4">-->
                        <!--            <div class="img-box p-1 border rounded-circle m-auto">-->
                        <!--                <img class="d-block w-100 rounded-circle" src="http://nicesnippets.com/demo/profile-1.jpg" alt="First slide">-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="col-sm-7">-->
                        <!--            <h4 class="mt-4 text-left"><strong class="text-info text-uppercase">sssPaul Mitchel</strong></h4>-->
                        <!--            <h5 class=" text-left text-white font-weight-bold">paul@gmail.com</h5>-->
                        <!--             <h5 class=" text-left text-white font-weight-bold">+0912456786</h5>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="row bg-light mt-4 p-5">-->
                        <!--        <p class="text-dark fs-review">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. </p>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="carousel-item text-center">-->
                        <!--    <div class="row">-->
                        <!--        <div class="offset-1 col-sm-4">-->
                        <!--            <div class="img-box p-1 border rounded-circle m-auto">-->
                        <!--                <img class="d-block w-100 rounded-circle" src="http://nicesnippets.com/demo/profile-1.jpg" alt="First slide">-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="col-sm-7">-->
                        <!--            <h4 class="mt-4 text-left"><strong class="text-info text-uppercase">Pssfsdsaul Mitchel</strong></h4>-->
                        <!--            <h5 class=" text-left text-white font-weight-bold">paul@gmail.com</h5>-->
                        <!--             <h5 class=" text-left text-white font-weight-bold">+0912456786</h5>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="row bg-light mt-4 p-5">-->
                        <!--        <p class="text-dark fs-review ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. </p>-->
                        <!--    </div>-->
                        <!--</div>-->
                      </div>
                      
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="background:blue;max-height:50px;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="background:blue;max-height:50px;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                       
                    </div>
                   
                </div>            
             </div>
          </div>
        </div>
      </div>
    </div>

<script>
    function openModal() {
      document.getElementById("myModal").style.display = "block";
    }
    
    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }
    
    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      captionText.innerHTML = dots[slideIndex-1].alt;
    }
</script>
    
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