
    <div class="slide-one-item home-slider owl-carousel">
   
    <?php
    // print_r($fetch_building_data);
    // building_image
    foreach($buildings as $building)
    {
        $imgArray=explode(',',$building->building_image);
        base_url().'assets/Building_image/'.$imgArray[0];
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
<style>
.button1 {
  border-radius: 4px;
  /*background-color: #f4511e;*/
  background-color: #0b6dff;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 100%;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button1 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button1 span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button1:hover span {
  padding-right: 25px;
}

.button1:hover span:after {
  opacity: 1;
  right: 0;
}

/*.h1{*/
/*  font-weight: 200;*/
/*  margin: 0.4em 0;*/
/*}*/
/*.h1{ font-size: 3.5em; }*/





a {
	text-decoration: none;
}
.h1 .main, p.demos {
	-webkit-animation-delay: 18s;
	-moz-animation-delay: 18s;
	-ms-animation-delay: 18s;
	animation-delay: 18s;
}
.sp-container {
	position: relative;
	top: 0px;
	left: 0px;
	width: 100%;
	height: 100%;
	z-index: 100;
	background: -webkit-radial-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3) 35%, rgba(0, 0, 0, 0.7));
	background: -moz-radial-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3) 35%, rgba(0, 0, 0, 0.7));
	background: -ms-radial-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3) 35%, rgba(0, 0, 0, 0.7));
	background: radial-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3) 35%, rgba(0, 0, 0, 0.7));
}
.sp-content {
	position: relative;
	width: 100%;
	height: 100%;
	left: 0px;
	top: 0px;
	z-index: 1000;
}
.sp-container h2 {
	position: relative;
	top: 50%;
	line-height: 100px;
	/*height: 90px;*/
	margin-top: -50px;
	font-size: 90px;
	width: 100%;
	text-align: center;
	color: transparent;
	-webkit-animation: blurFadeInOut 3s ease-in backwards;
	-moz-animation: blurFadeInOut 3s ease-in backwards;
	-ms-animation: blurFadeInOut 3s ease-in backwards;
	animation: blurFadeInOut 3s ease-in backwards;
}
.sp-container h2.frame-1 {
	-webkit-animation-delay: 0s;
	-moz-animation-delay: 0s;
	-ms-animation-delay: 0s;
	animation-delay: 0s;
}
.sp-container h2.frame-2 {
	-webkit-animation-delay: 3s;
	-moz-animation-delay: 3s;
	-ms-animation-delay: 3s;
	animation-delay: 3s;
}
.sp-container h2.frame-3 {
	-webkit-animation-delay: 6s;
	-moz-animation-delay: 6s;
	-ms-animation-delay: 6s;
	animation-delay: 6s;
}
.sp-container h2.frame-4 {
	font-size: 100px;
	-webkit-animation-delay: 9s;
	-moz-animation-delay: 9s;
	-ms-animation-delay: 9s;
	animation-delay: 9s;
}
.sp-container h2.frame-5 {
	-webkit-animation: none;
	-moz-animation: none;
	-ms-animation: none;
	animation: none;
	color: transparent;
	text-shadow: 0px 0px 1px #fff;
}
.sp-container h2.frame-5 span {
	-webkit-animation: blurFadeIn 3s ease-in 12s backwards;
	-moz-animation: blurFadeIn 1s ease-in 12s backwards;
	-ms-animation: blurFadeIn 3s ease-in 12s backwards;
	animation: blurFadeIn 3s ease-in 12s backwards;
	color: transparent;
	text-shadow: 0px 0px 1px #fff;
}
.sp-container h2.frame-5 span:nth-child(2) {
	-webkit-animation-delay: 13s;
	-moz-animation-delay: 13s;
	-ms-animation-delay: 13s;
	animation-delay: 13s;
}
.sp-container h2.frame-5 span:nth-child(3) {
	-webkit-animation-delay: 14s;
	-moz-animation-delay: 14s;
	-ms-animation-delay: 14s;
	animation-delay: 14s;
}
.sp-globe {
	position: relative;
	width:100%;
	height:100%;
	/*width: 282px;*/
	/*height: 273px;*/
	left: 50%;
	top: 50%;
	margin: -137px 0 0 -141px;
	background:grey !important;
	/*background: transparent url(http://web-sonick.zz.mu/images/sl/globe.png) no-repeat top left;*/
	-webkit-animation: fadeInBack 3.6s linear 14s backwards;
	-moz-animation: fadeInBack 3.6s linear 14s backwards;
	-ms-animation: fadeInBack 3.6s linear 14s backwards;
	animation: fadeInBack 3.6s linear 14s backwards;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
	filter: alpha(opacity=30);
	opacity: 0.3;
	-webkit-transform: scale(5);
	-moz-transform: scale(5);
	-o-transform: scale(5);
	-ms-transform: scale(5);
	transform: scale(5);
}
.sp-circle-link {
	position: absolute;
	left: 50%;
	bottom: 100px;
	margin-left: -50px;
	text-align: center;
	line-height: 100px;
	width: 100px;
	height: 100px;
	background: #fff;
	color: #3f1616;
	font-size: 25px;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	border-radius: 50%;
	-webkit-animation: fadeInRotate 1s linear 16s backwards;
	-moz-animation: fadeInRotate 1s linear 16s backwards;
	-ms-animation: fadeInRotate 1s linear 16s backwards;
	animation: fadeInRotate 1s linear 16s backwards;
	-webkit-transform: scale(1) rotate(0deg);
	-moz-transform: scale(1) rotate(0deg);
	-o-transform: scale(1) rotate(0deg);
	-ms-transform: scale(1) rotate(0deg);
	transform: scale(1) rotate(0deg);
}
.sp-circle-link:hover {
	background: #85373b;
	color: #fff;
}
/**/

@-webkit-keyframes blurFadeInOut {
	0% {
		opacity: 0;
		text-shadow: 0px 0px 40px #fff;
		-webkit-transform: scale(1.3);
	}
	20%, 75% {
		opacity: 1;
		text-shadow: 0px 0px 1px #fff;
		-webkit-transform: scale(1);
	}
	100% {
		opacity: 0;
		text-shadow: 0px 0px 50px #fff;
		-webkit-transform: scale(0);
	}
}
@-webkit-keyframes blurFadeIn {
	0% {
		opacity: 0;
		text-shadow: 0px 0px 40px #fff;
		-webkit-transform: scale(1.3);
	}
	50% {
		opacity: 0.5;
		text-shadow: 0px 0px 10px #fff;
		-webkit-transform: scale(1.1);
	}
	100% {
		opacity: 1;
		text-shadow: 0px 0px 1px #fff;
		-webkit-transform: scale(1);
	}
}
@-webkit-keyframes fadeInBack {
	0% {
		opacity: 0;
		-webkit-transform: scale(0);
	}
	50% {
		opacity: 0.4;
		-webkit-transform: scale(2);
	}
	100% {
		opacity: 0.2;
		-webkit-transform: scale(5);
	}
}
@-webkit-keyframes fadeInRotate {
	0% {
		opacity: 0;
		-webkit-transform: scale(0) rotate(360deg);
	}
	100% {
		opacity: 1;
		-webkit-transform: scale(1) rotate(0deg);
	}
}
/**/

@-moz-keyframes blurFadeInOut {
	0% {
		opacity: 0;
		text-shadow: 0px 0px 40px #fff;
		-moz-transform: scale(1.3);
	}
	20%, 75% {
		opacity: 1;
		text-shadow: 0px 0px 1px #fff;
		-moz-transform: scale(1);
	}
	100% {
		opacity: 0;
		text-shadow: 0px 0px 50px #fff;
		-moz-transform: scale(0);
	}
}
@-moz-keyframes blurFadeIn {
	0% {
		opacity: 0;
		text-shadow: 0px 0px 40px #fff;
		-moz-transform: scale(1.3);
	}
	100% {
		opacity: 1;
		text-shadow: 0px 0px 1px #fff;
		-moz-transform: scale(1);
	}
}
@-moz-keyframes fadeInBack {
	0% {
		opacity: 0;
		-moz-transform: scale(0);
	}
	50% {
		opacity: 0.4;
		-moz-transform: scale(2);
	}
	100% {
		opacity: 0.2;
		-moz-transform: scale(5);
	}
}
@-moz-keyframes fadeInRotate {
	0% {
		opacity: 0;
		-moz-transform: scale(0) rotate(360deg);
	}
	100% {
		opacity: 1;
		-moz-transform: scale(1) rotate(0deg);
	}
}
/**/

@keyframes blurFadeInOut {
	0% {
		opacity: 0;
		text-shadow: 0px 0px 40px #fff;
		transform: scale(1.3);
	}
	20%, 75% {
		opacity: 1;
		text-shadow: 0px 0px 1px #fff;
		transform: scale(1);
	}
	100% {
		opacity: 0;
		text-shadow: 0px 0px 50px #fff;
		transform: scale(0);
	}
}
@keyframes blurFadeIn {
	0% {
		opacity: 0;
		text-shadow: 0px 0px 40px #fff;
		transform: scale(1.3);
	}
	50% {
		opacity: 0.5;
		text-shadow: 0px 0px 10px #fff;
		transform: scale(1.1);
	}
	100% {
		opacity: 1;
		text-shadow: 0px 0px 1px #fff;
		transform: scale(1);
	}
}
@keyframes fadeInBack {
	0% {
		opacity: 0;
		transform: scale(0);
	}
	50% {
		opacity: 0.4;
		transform: scale(2);
	}
	100% {
		opacity: 0.2;
		transform: scale(5);
	}
}
@keyframes fadeInRotate {
	0% {
		opacity: 0;
		transform: scale(0) rotate(360deg);
	}
	100% {
		opacity: 1;
		transform: scale(1) rotate(0deg);
	}
}
.newFnt{
    /*font-family: 'Bellota', cursive;*/
    /*font-family: 'Dancing Script', cursive;*/
    font-family: 'Bellota Text', cursive;
}
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).on('submit','#enqList',function(e){
        e.preventDefault();
        // if(){
            
        // }else{
            
        // }
        var formData=new FormData($(this)[0]);
        $.ajax({
            url:"<?=base_url('Api_contoller/submitListingQuery')?>",
            type:"post",
            cache:false,
            contentType:false,
            processData:false,
            data:formData,
            success:function(response){
                console.log(response);
                response=JSON.parse(response);
                if(response.code==1){
                     swal("Query Submitted!", "Your Dashboard Login Credential will be mailed to you soon. ", "success");
                }else{
                    swal("Oops!", response.data, "warning");
                }
                
            }
        })
        
        // $('#modalContactForm').modal('hide');
        // location.reload();
    });
    
</script>
        <div class="modal " id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="enqList">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Enquiry to List Property</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                     
                          
                      
                    <div class="md-form mb-5">
                      <i class="fa fa-user prefix grey-text"></i>
                      <input type="text" id="form34" class="form-control validate" name="owner_name" placeholder="Owner name" required>
                      <!--<label data-error="wrong" data-success="right" for="form34" ></label>-->
                    </div>
            
                    <div class="md-form mb-5">
                      <i class="fa fa-envelope prefix grey-text"></i>
                      <input type="email" id="form29" class="form-control validate" name="owner_email" placeholder="Your email" required>
                      <!--<label data-error="wrong" data-success="right" for="form29"></label>-->
                    </div>
            
            
                    <div class="md-form">
                      <i class="fa fa-pencil prefix grey-text"></i>
                      <textarea type="text" id="form8" class="md-textarea form-control" name="property_details" rows="4" required></textarea>
                      <label data-error="wrong" data-success="right" for="form8">Your Property Details</label>
                    </div>
            
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-success">Enquiry Now <i class="fa fa-paper-plane-o ml-1"></i></button>
                  </div>
              </form>
            </div>
          </div>
        </div>
     
<link href="https://fonts.googleapis.com/css?family=Bellota+Text&display=swap" rel="stylesheet">
<!--<link href="https://fonts.googleapis.com/css?family=Bellota&display=swap" rel="stylesheet">-->
<link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
<div class="container p-2" id="animatedd">
   <div class="sp-container">
    	<div class="sp-content">
    		<div class="sp-globe"></div>
    		<h2 class="frame-1 newFnt" >List</h2>
    		<h2 class="frame-2 newFnt" >Your Property</h2>
    		<h2 class="frame-3 newFnt" >On</h2>
    		<h2 class="frame-4 newFnt" >ManagedLandLord.com</h2>
    		<h2 class="frame-5 newFnt" >
    			<span>For,</span>
    			<span>Free.</span>
    			<!--<span>EXPERIANCE.</span>-->
    		</h2>
    		
    	</div>
    </div>
        <button class="button1 newFnt" data-toggle="modal" data-target="#modalContactForm"><span>Click Here To List Your Property. </span></button>
 
</div>


        <div class="site-section site-section-sm pb-0">
      <div class="container">
        <div class="row">
     <!--     <form class="form-search col-md-12" action="<?=base_url('PropertTrack/get_property')?>" method="post"style="margin-top: -100px;">-->
     <!--       <div class="row  align-items-end">-->
              <!--<div class="col-md-2">-->
              <!--  <label for="list-types">Listing Types</label>-->
              <!--  <div class="select-wrap">-->
              <!--    <span class="icon icon-arrow_drop_down"></span>-->
              <!--    <select name="list-types" id="list-types" class="form-control d-block rounded-0">-->
              <!--      <option value="">Condo</option>-->
              <!--      <option value="">Commercial Building</option>-->
              <!--      <option value="">Land Property</option>-->
              <!--    </select>-->
              <!--  </div>-->
              <!--</div>-->
              <!--<div class="col-md-2">-->
              <!--  <label for="offer-types">Offer Type</label>-->
              <!--  <div class="select-wrap">-->
              <!--    <span class="icon icon-arrow_drop_down"></span>-->
              <!--    <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">-->
              <!--      <option value="">For Sale</option>-->
              <!--      <option value="">For Rent</option>-->
              <!--      <option value="">For Lease</option>-->
              <!--    </select>-->
              <!--  </div>-->
              <!--</div>-->
          <!--    <div class="col-md-3">-->
          <!--<label for="select-city">Select Country</label>-->
          <!--      <span class="icon icon-arrow_drop_down"></span>--->
          <!--        <select name="select-city" id="select-city" class="form-control d-block rounded-0" name="country" id="countryId">-->
          <!--           	<select  class="countries form-control d-block rounded-0 " autocomplete="false" required name="country" id="countryId">-->
          <!--         <option value="">Select Country</option>-->
				
          <!--           // foreach ($fetch_countries as $FC) -->
          <!--            {-->
          <!--              echo '<option value="'.$FC->country_id.'">'.$FC->name.'</option>';-->
            
          <!--            }-->
          <!--            ?>  -->
                   
          <!--        </select>-->
          <!--      </div>-->
          <!-- </div>-->
     <!--         <div class="col-md-3">-->
     <!--           <label for="select-city">Select State</label>-->
     <!--           <div class="select-wrap">-->
     <!--             <span class="icon icon-arrow_drop_down"></span>-->
                  <!--<select name="select-city" id="select-city" class="form-control d-block rounded-0">-->
     <!--               	<select name="state" class="form-control d-block rounded-0 " autocomplete="false"  id="stateId">-->
					<!--	<option value="0" id="stateId">Select State</option>-->
					<!--</select>-->
                  <!--</select>-->
     <!--           </div>-->
     <!--         </div>-->
     <!--         <div class="col-md-3">-->
     <!--           <label for="select-city">Select City</label>-->
     <!--           <div class="select-wrap">-->
     <!--             <span class="icon icon-arrow_drop_down"></span>-->
                  <!--<select name="select-city" id="select-city" class="form-control d-block rounded-0">-->
     <!--              <select name="city" class="cities form-control d-block rounded-0 " autocomplete="false" required id="cityId">-->
					<!--	<option value="0" id="cityId">Select City</option>-->
					<!--</select>-->
                  <!--</select>-->
     <!--           </div>-->
     <!--         </div>-->
     <!--         <div class="col-md-2">-->
     <!--           <input type="submit" id="SearchBuilding" class="btn btn-success text-white btn-block rounded-0" value="Search">-->
     <!--         </div>-->
     <!--       </div>-->
     <!--     </form>-->
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
                  <!--<!--<a href="" class="view-list px-3 border-right active">All</a>-->
                  <a href="<?=base_url('PropertTrack/ViewSaleData')?>" class="view-list px-3 border-right">Sale</a>
                  <a href="<?=base_url('PropertTrack/ViewRentData')?>" class="view-list px-3">Rent</a>
                  <a href="<?=base_url('PropertTrack/ViewLeaseData')?>" class="view-list px-3">Lease</a>
                </div>
                <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sort By
                 </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="javascript:void(0)" id="showAsendingprice"><label>Price Ascending</label></a>
    <a class="dropdown-item" href="javascript:void(0)" id="ShowDescendingprice"><strong>Price Descending</strong></a>
    <!--<a class="dropdown-item" href="#">Something else here</a>-->
  </div>
</div>
                <!--<div class="select-wrap">-->
                  <!--<span class="icon icon-arrow_drop_down"></span>-->
                  <!--<select class="form-control form-control-sm d-block rounded-0">-->
                  <!--  <option value="">Sort by</option>-->
                    
                  <!--  <option value="">Price Ascending</option>-->
                  <!--  <option value="">Price Descending</option>-->
                  <!--</select>-->
                <!--</div>-->
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>

    
    <div class="site-section site-section-sm bg-light" id="vertical_struc">
      <div class="container">
        <div class="section-title text-center">
		    <h3 class="font-weight-bold">Featured Listings</h3>
            <p>Browse houses and flats for sale and to rent in your area</p>
            <hr>
		</div>
		
        <div class="row mb-5">
           <?php
          foreach ($fetch_building_data as $building_Details) {
              // print_r($building_Details);
              $buildingimage=explode(',',$building_Details->building_image);
            ?>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="property-entry h-100 ">
              <a href="<?=base_url('PropertTrack/ViewParticularproperty/').$building_Details->building_id?>" building_id="<?=$building_Details->building_id?>" class="property-thumbnail particularid ">
                <div class="offer-type-wrap">
                   <?php
                    $p_buy=$building_Details->p_buy;
                    $p_lease=$building_Details->p_lease;
                    $p_rent=$building_Details->p_rent;
                            if($p_buy==1)
                            {
                                // $buy="Buy";
                                echo ' <span class="offer-type bg-danger">Sale</span> ';
                                
                            }else{
                                $buy="";
                                
                            }
                            if($p_rent==1){
                                echo ' <span class="offer-type bg-success">Rent</span> ';
                            }else{
                                $rent="";
                            }
                            if($p_lease==1){
                                // $lease="Lease";
                                echo ' <span class="offer-type bg-info">Lease</span> ';
                            }else{
                                $lease="";
                            }
                        ?>
                </div>
                <img src="<?php echo base_url().'assets/Building_image/'.$buildingimage[0]?>" alt="Image"  width="350px" height="243px" alt="Image" >
                <!-- <input class="form-control"  type="hidden" value="<?=$building_Details->building_id?>">  -->
              </a>
              <!-- <span class="icon-heart-o" class="property-favorite"></span> -->
              <div class="p-4 property-body " style="height:190px">
      
                <h5 class="text-capitalize font-weight-bold"><?=$building_Details->building_note?></h5>
                <span class="property-location d-block mb-3" ><span class="property-icon icon-room"></span> <?= $building_Details->building_address ?></span>
               <hr>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                    <li>
                        <span class="property-specs">Country</span>
                        <span class="property-specs-number"><?=$building_Details->country_name?><sup></sup></span>
                    </li>
                    <li>
                        <span class="property-specs">State</span>
                        <span class="property-specs-number"><?=$building_Details->state_name?><sup></sup></span>
                    </li>
                    <li>
                        <span class="property-specs">City</span>
                        <span class="property-specs-number"><?=$building_Details->city_name?></span>
                    </li>
                    <li>
                        <span class="property-specs">Units</span>
                        <span class="property-specs-number"><?=$building_Details->number_units?></span>
                    </li>
                </ul>
              </div>
              <div class="p-3">
                 <a href="<?=base_url('PropertTrack/ViewParticularproperty/').$building_Details->building_id?>"><div class="price-label" style="background-color: #0d2f66 !important"> <span style="#fff074 !important">$<?=$building_Details->price?></span></div></a> 
              </div>
            </div>
          </div>
           <?php
          }
          ?>
        </div>
       <!--  <div class="row">
          <div class="col-md-12 text-center">
            <div class="site-pagination">
              <a href="<?=base_url('PropertTrack')?>" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <span>...</span>
              <a href="#">10</a>
            </div>
          </div>   -->
        </div>
        
      </div>
      
      <!--starting of asending price div-->
       <div class="site-section site-section-sm bg-light" id="Ascendingprice">
      <div class="container">
        <div class="section-title text-center">
		    <h3 class="font-weight-bold">Featured Listings </h3>
            <p>Browse houses and flats for sale and to rent in your area</p>
		</div>
        <div class="row mb-5">
           <?php
          foreach ($fetch_building_Asending as $building_In_ASC) {
            //   print_r( $building_In_ASC);
              $buildingimage=explode(',',$building_In_ASC->building_image);
            ?>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="property-entry h-100 ">
              <a href="<?=base_url('PropertTrack/ViewParticularproperty/').$building_In_ASC->building_id?>" building_id="<?=$building_In_ASC->building_id?>" class="property-thumbnail particularid ">
                <div class="offer-type-wrap">
                   <?php
                    $p_buy=$building_In_ASC->p_buy;
                    $p_lease=$building_In_ASC->p_lease;
                    $p_rent=$building_In_ASC->p_rent;
                            if($p_buy==1)
                            {
                                // $buy="Buy";
                                echo ' <span class="offer-type bg-danger">Sale</span> ';
                                
                            }else{
                                $buy="";
                                
                            }
                            if($p_rent==1){
                                echo ' <span class="offer-type bg-success">Rent</span> ';
                            }else{
                                $rent="";
                            }
                            if($p_lease==1){
                                // $lease="Lease";
                                echo ' <span class="offer-type bg-info">Lease</span> ';
                            }else{
                                $lease="";
                            }
                        ?>
                </div>
                <img src="<?php echo base_url().'assets/Building_image/'.$buildingimage[0]?>" alt="Image"  width="350px" height="243px" alt="Image" >
                <!-- <input class="form-control"  type="hidden" value="<?=$building_In_ASC->building_id?>">  -->
              </a>
              <!-- <span class="icon-heart-o" class="property-favorite"></span> -->
              <div class="p-4 property-body">
      
                <h5 class="text-capitalize font-weight-bold"><?=$building_In_ASC->building_note?></h5>
                <span class="property-location d-block mb-3" ><span class="property-icon icon-room"></span> <?= $building_In_ASC->building_address ?></span>
               <hr>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                     <li>
                    <span class="property-specs">Country</span>
                    <span class="property-specs-number"><?=$building_In_ASC->country_name?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">State</span>
                    <span class="property-specs-number"><?=$building_In_ASC->state_name?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">City</span>
                    <span class="property-specs-number"><?=$building_In_ASC->city_name?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Units</span>
                    <span class="property-specs-number"><?=$building_In_ASC->number_units?></span>
                    
                  </li>
                </ul>
				        <br>
                  <a href="<?=base_url('PropertTrack/ViewParticularproperty/').$building_In_ASC->building_id?>"><div class="price-label" style="background-color: #0d2f66 !important"> <span style="#fff074 !important">$<?=$building_In_ASC->price?></span></div></a>
              </div>
            </div>
          </div>
           <?php
          }
          ?>
        </div>
       <!--  <div class="row">
          <div class="col-md-12 text-center">
            <div class="site-pagination">
              <a href="<?=base_url('PropertTrack')?>" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <span>...</span>
              <a href="#">10</a>
            </div>
          </div>   -->
        </div>
        
      </div>
      <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 bg-secondary p-2 shadow">
                     <img src="<?php echo base_url().'assets/Building_image/'.$buildingimage[0]?>" alt="Image" class="img-fluid" alt="Image" >
                </div>
                <div class="col-md-6 border">
                    <div class="section-title text-center bg-light">
		               <h3 class="font-weight-bold">Why Us?</h3>
                       <hr>
		            </div>
                    <p>This site is here to take your property search understanding. Presently you can look and find properties even in a hurry. This site makes it incredibly simple to look through purchase, sell or lease property in India. Clients can outwardly investigate loft, ranch house , level, house ,manufacturer floor, plot, estate, business office, shops, production line through rich photographs, appealing recordings, intelligent maps and numerous different subtleties. The application likewise empowers clients to see photographs and recordings of society/region of a property.</p> 
                    <p>It was nobody's private farm. It was the common property of the people, shared by the people. So the practice of sharing was central to the concept of ownership of property.</p>
                </div>
            </div>
        </div>
      <!--end of ascending price-->
      
      <!--starting of descending-->
       <div class="site-section site-section-sm bg-light" id="Descendingprice">
      <div class="container">
        <div class="section-title text-center">
		    <h3>Featured Listings  </h3>
            <p>Browse houses and flats for sale and to rent in your area</p>
		</div>
        <div class="row mb-5">
           <?php
          foreach ($fetch_building_Descending as $building_In_DESC) {
            //   print_r( $building_In_ASC);
              $buildingimage=explode(',',$building_In_DESC->building_image);
            ?>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="property-entry h-100 ">
              <a href="<?=base_url('PropertTrack/ViewParticularproperty/').$building_In_DESC->building_id?>" building_id="<?=$building_In_DESC->building_id?>" class="property-thumbnail particularid ">
                <div class="offer-type-wrap">
                   <?php
                    $p_buy=$building_In_DESC->p_buy;
                    $p_lease=$building_In_DESC->p_lease;
                    $p_rent=$building_In_DESC->p_rent;
                            if($p_buy==1)
                            {
                                // $buy="Buy";
                                echo ' <span class="offer-type bg-danger">Sale</span> ';
                                
                            }else{
                                $buy="";
                                
                            }
                            if($p_rent==1){
                                echo ' <span class="offer-type bg-success">Rent</span> ';
                            }else{
                                $rent="";
                            }
                            if($p_lease==1){
                                // $lease="Lease";
                                echo ' <span class="offer-type bg-info">Lease</span> ';
                            }else{
                                $lease="";
                            }
                        ?>
                </div>
                <img src="<?php echo base_url().'assets/Building_image/'.$buildingimage[0]?>" alt="Image"  width="350px" height="243px" alt="Image" >
                <!-- <input class="form-control"  type="hidden" value="<?=$building_In_DESC->building_id?>">  -->
              </a>
              <!-- <span class="icon-heart-o" class="property-favorite"></span> -->
              <div class="p-4 property-body">
      
                <h5 class="text-capitalize font-weight-bold"><?=$building_In_DESC->building_note?></h5>
                <span class="property-location d-block mb-3" ><span class="property-icon icon-room"></span> <?= $building_In_DESC->building_address ?></span>
               <hr>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                     <li>
                    <span class="property-specs">Country</span>
                    <span class="property-specs-number"><?=$building_In_DESC->country_name?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">State</span>
                    <span class="property-specs-number"><?=$building_In_DESC->state_name?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">City</span>
                    <span class="property-specs-number"><?=$building_In_DESC->city_name?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Units</span>
                    <span class="property-specs-number"><?=$building_In_DESC->number_units?></span>
                    
                  </li>
                </ul>
				        <br>
                  <a href="<?=base_url('PropertTrack/ViewParticularproperty/').$building_In_DESC->building_id?>"><div class="price-label" style="background-color: #0d2f66 !important"> <span style="#fff074 !important">$<?=$building_In_DESC->price?></span></div></a>
              </div>
            </div>
          </div>
           <?php
          }
          ?>
        </div>
       <!--  <div class="row">
          <div class="col-md-12 text-center">
            <div class="site-pagination">
              <a href="<?=base_url('PropertTrack')?>" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <span>...</span>
              <a href="#">10</a>
            </div>
          </div>   -->
        </div>
        
      </div>
      <!--ending of desending-->
      
        
    
    <div class="site-section site-section-sm bg-light" id="horizontal_struct">
        <div class="section-title text-center">
		    <h3>Featured Listings</h3>
            <p>Browse houses and flats for sale and to rent in your area</p>
		</div>
        <div class="container">
             <?php
          foreach ($fetch_building_data as $building_Details) {
              // print_r($building_Details);
              $buildingimage=explode(',',$building_Details->building_image);
            
            ?>
            <div class="row mb-4">
              <div class="col-md-12">
                <div class="property-entry horizontal d-lg-flex">
    
                <a href="<?=base_url('PropertTrack/ViewParticularproperty/').$building_Details->building_id?>" building_id="<?=$building_Details->building_id?>" class="property-thumbnail h-100">
                <div class="offer-type-wrap">
                  <span class="offer-type bg-danger">Sale</span>
                  <span class="offer-type bg-success">Rent</span>
                  <span class="offer-type bg-success">Lease</span>
  
                </div>
                <img src="<?php echo base_url().'assets/Building_image/'.$buildingimage[0]?>" alt="Image" width="537px"; height="350px"class="img-fluid">
               
              </a>
    
                  <div class="p-4 property-body">
                
                       <h5 class="text-capitalize font-weight-bold"><?=$building_Details->building_note?></h5>
                    <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> <?= $building_Details->building_address ?></span>
                    <strong class="property-price text-primary mb-3 d-block text-success">$<?=$building_Details->price?></strong>
                    <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem dolorem tenetur magni. Aspernatur odit rem repudiandae cumque tenetur enim consequuntur esse.</p>-->
                    <ul class="property-specs-wrap mb-3 mb-lg-0">
                     <li>
                    <span class="property-specs">Country</span>
                    <span class="property-specs-number"><?=$building_Details->country_name?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">State</span>
                    <span class="property-specs-number"><?=$building_Details->state_name?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">City</span>
                    <span class="property-specs-number"><?=$building_Details->city_name?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Units</span>
                    <span class="property-specs-number"><?=$building_Details->number_units?></span>
                    
                  </li>
                    </ul>
                    <br>
                     <a href="<?=base_url('PropertTrack/ViewParticularproperty/').$building_Details->building_id?>"><div class="price-label" style="background-color: #0d2f66 !important"> <span style="#fff074 !important">$<?=$building_Details->price?></span></div></a>
                  </div>
    
                </div>
              </div>
            </div>
             <?php
          }
          ?>
         </div>
    </div>
    

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center">
            <div class="section-title text-center">
		        <h3 class="font-weight-bold">Why Choose Us? </h3>
                <p class="text-center">The land on which the cattle grazed was communal property. It was owned by no one. </p>
		       <hr>
		    </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4">
            <a href="#" class="service text-center border p-2 bg-light h-100">
              <span class="icon flaticon-house"></span>
              <h4 class="font-weight-bold text-dark">Research Subburbs</h4>
              <p>No power on earth has a right to take our property from us without our consent.</p>
              <!-- <p><span class="read-more">Read More</span></p> -->
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="#" class="service text-center border p-2 bg-light h-100">
              <span class="icon flaticon-sold"></span>
              <h4 class="font-weight-bold text-dark">Sold Houses</h4>
              <p>There is only one party in the United States: the Property party... and it has two right wings: Republican and Democrat.</p>
              <!-- <p><span class="read-more">Read More</span></p> -->
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="#" class="service text-center border p-2 bg-light h-100">
              <span class="icon flaticon-camera"></span>
              <h4 class="font-weight-bold text-dark">Security Priority</h4>
              <p>I don't want to write an autobiography because I would become public property with no privacy left.</p>
              <!-- <p><span class="read-more">Read More</span></p> -->
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-light">
      <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8 section-title text-center">
		        <h3 class="font-weight-bold">Recent Blogs </h3>
                <p class="text-center">Nature is ever at work building and pulling down, creating and destroying, keeping everything whirling and flowing, allowing no rest but in rhythmical motion, chasing everything in endless song out of one beautiful form into another. </p>
		       <hr>
		    </div>
        </div>
        <!--<div class="row justify-content-center mb-5">-->
        <!--  <div class="col-md-7 text-center">-->
        <!--    <div class="site-section-title">-->
        <!--      <h2>Recent Blog</h2>-->
        <!--    </div>-->
        <!--    <p>Nature is ever at work building and pulling down, creating and destroying, keeping everything whirling and flowing, allowing no rest but in rhythmical motion, chasing everything in endless song out of one beautiful form into another.-->
        <!--    </p>-->
        <!--  </div>-->
        <!--</div>-->
        <div class="row">
            <div id="accordion">
        			
        				<!-- Post 1 -->
        				<?php 
        				    foreach($categories as &$cat){
        				        ?>
        				         <h3><?=$cat->category_name?></h3>
                                <div>
        				        <?php
        				        if($cat->blogs){
        foreach ($cat->blogs as $blogData) 
        {
          // print_r($blogData);
        ?>

          <div class="col-md-6 col-lg-4">
            <?php
              $img=$blogData->blog_image;
              $break=explode(',', $img);
           ?>
           <div class="bg-white border p-2 mt-4">
               <h2 class="h5 font-weight-bold mb-3"><a href="Blog/readblog/<?=$blogData->blog_slug?>" class="text-black"><?=$blogData->blog_name?></a></h2>
                <a href=" <?=base_url('Blog/readblog/'.$blogData->blog_slug.'')?>">
                  <img src="<?php echo base_url().'assets/blog_image/'.$break[0]?>"alt="Image" width="350px" class="img-fluid" style="height:185px"></a>
                <div class="p-4" style="height:290px">
                  <span class="d-block text-secondary small text-uppercase"><?=$blogData->date?></span>
                  
                  <p><?=$blogData->blog_content?></p>
                </div>
                <div class="m-auto text-center">
                     <a href="Blog/readblog/<?=$blogData->blog_slug?>" class="btn btn-light font-weight-bold">Read More</a>  
                </div>
            </div>
        </div>
        <?php
         }
            }else{
                ?>
                 <p>No blogs in this category</p>
            <?php        
            }
         ?>
         </div>
            <?php
            }
            ?>
        </div>
      </div>
    </div>
    
    <div class="site-section">
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8 section-title text-center">
		        <h3 class="font-weight-bold">Our Owners </h3>
                <p class="text-center">Truth is the property of no individual but is the treasure of all men. </p>
		       <hr>
		    </div>
        </div>
      <!--<div class="row mb-5 justify-content-center">-->
      <!--  <div class="col-md-7">-->
      <!--    <div class="site-section-title text-center">-->
      <!--      <h2>Our Owners</h2>-->
      <!--      <hr>-->
      <!--      <p></p>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>-->
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
                <h2 class="mb-2 font-weight-light text-black h4"><?=ucfirst($Owners_Details->fname.' '.$Owners_Details->lname)?></h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Owners</span>
                
                <p class="bg-info p-1 text-center text-white"><?=ucfirst($Owners_Details->note)?></p>
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

  
    
  </body>
</html>
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
        $("#vertical_struc").hide();
        $("#Descendingprice").hide();
         $("#Ascendingprice").hide();
        
        
    });
     $(document).on('click','#showvertical',function()
    {   
         $("#vertical_struc").show();
        $("#horizontal_struct").hide();
         $("#Descendingprice").hide();
         $("#Ascendingprice").hide();
       
        
    });
     </script>  
     <script>
     $(window).load(function(){
       $("#Ascendingprice").css("display", "none");
    });
    $(document).on('click','#showAsendingprice',function()
            {
                 $("#horizontal_struct").hide();
                $("#vertical_struc").hide();
                $("#Descendingprice").hide();
                 $("#Ascendingprice").show();
            });
        
     </script>
      <script>
     $(window).load(function(){
       $("#Descendingprice").css("display", "none");
    });
    $(document).on('click','#ShowDescendingprice',function()
            {
                 $("#Ascendingprice").hide();
                 $("#horizontal_struct").hide();
                $("#vertical_struc").hide();
                 $("#Descendingprice").show();
            });
        
     </script>
      <script>
        $(document).ready(function(){
          $('#countryId').on('change',function(){
            var countryid=$(this).val();
    //  alert(countryid);
            $.ajax({
              url:"<?=base_url('PropertTrack/get_States')?>",
              type:"post",
              data:{countryid:countryid},
              success:function(response)
              {
                //   console.log(response.data);
                  response=JSON.parse(response);
                    // console.log(response);
                  if(response.code==1)
                  {
                    
                    for (let i = 0; i <response.data.length; i++) 
                    {
                        var html;
                        // console.log(response.data[i].name);
                        html+='<option value="'+response.data[i].states_id+'">'+response.data[i].name+'</option>';
                        // html+="<option value="'+response.data[i].id+'">" + response.data[i].name + "</option>";
                       
                        $('#stateId').append(html);
                    }
                }
                else
                  {
                      
                  }
                  
              }
                  
              });
            })
          })
       
      </script>
       <script>
        $(document).ready(function(){
          $('#stateId').on('change',function(){
            var stateId=$(this).val();
            // alert(stateId);
            $.ajax({
              url:"<?=base_url('PropertTrack/get_Cities')?>",
              type:"post",
              data:{stateId:stateId},
              success:function(response)
              {
                //   console.log(response.data);
                  response=JSON.parse(response);
                    // console.log(response);
                  if(response.code==1)
                  {
                    
                   for (var i = 0; i <response.data.length; i++) 
                    {
                        var html;
                        
                        html+='<option value="'+response.data[i].cities_id+'">'+response.data[i].name+'</option>';
                       
                       
                        $('#cityId').append(html);
                    }
                }
                else
                  {
                    //   html+="<option>" + response.data[i].name + "</option>";
                       
                    //     $('#stateId').append(html);
                  }
                  
              }
                  
              });
            })
          })
       
      </script>
       <script>
        $(document).ready(function(){
          $('#SearchBuilding').on('click',function(){
            var countryId=$('#countryId').val();
            var stateId=$('#stateId').val();
             var cityId=$('#cityId').val();
            // alert(countryId);
            //  alert(stateId);
            //  alert(cityId);
         $.ajax({
               url:"<?=base_url('PropertTrack/get_property')?>",
               type:"post",
               data:{countryId:countryId,stateId:stateId,cityId:cityId},
              success:function(response)
              {
            //     //   console.log(response.data);
            //       response=JSON.parse(response);
            //         // console.log(response);
            //       if(response.code==1)
            //       {
                    
            //       for (var i = 0; i <response.data.length; i++) 
            //         {
            //             var html;
                        
            //             html+='<option value="'+response.data[i].cities_id+'">'+response.data[i].name+'</option>';
                       
                       
            //             $('#cityId').append(html);
            //         }
            //     }
            //     else
            //       {
            //         //   html+="<option>" + response.data[i].name + "</option>";
                       
            //         //     $('#stateId').append(html);
            //       }
                  
              }
                  
              });
            })
          })
       
      </script>
     
     
     
     