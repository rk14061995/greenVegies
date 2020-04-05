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
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

   
    <div class="site-section site-section-sm bg-light" id="vertical_struc">
      <div class="container">
  <!--      <div class="section-title text-center">-->
		<!--    <h3>Featured Listings</h3>-->
  <!--          <p>Browse houses and flats for sale and to rent in your area</p>-->
		<!--</div>-->
        <div class="row mb-5">
           
         
          <div class=" container" >
            <div class="property-entry h-100 row-fluid ">
               <form class="form-horizontal">
        <fieldset>
          <div id="legend">
            <legend class="">Payment</legend>
          </div>
     
          <!-- Name -->
          <div class="control-group">
            <label class="control-label"  for="username">Card Holder's Name</label>
            <div class="controls">
              <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
            </div>
          </div>
     
          <!-- Card Number -->
          <div class="control-group">
            <label class="control-label" for="email">Card Number</label>
            <div class="controls">
              <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
            </div>
          </div>
     
          <!-- Expiry-->
          <div class="control-group">
            <label class="control-label" for="password">Card Expiry Date</label>
            <div class="controls">
              <select class="span3" name="expiry_month" id="expiry_month">
                <option></option>
                <option value="01">Jan (01)</option>
                <option value="02">Feb (02)</option>
                <option value="03">Mar (03)</option>
                <option value="04">Apr (04)</option>
                <option value="05">May (05)</option>
                <option value="06">June (06)</option>
                <option value="07">July (07)</option>
                <option value="08">Aug (08)</option>
                <option value="09">Sep (09)</option>
                <option value="10">Oct (10)</option>1
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
              <select class="span2" name="expiry_year">
                <option value="13">2013</option>
                <option value="14">2014</option>
                <option value="15">2015</option>
                <option value="16">2016</option>
                <option value="17">2017</option>
                <option value="18">2018</option>
                <option value="19">2019</option>
                <option value="20">2020</option>
                <option value="21">2021</option>
                <option value="22">2022</option>
                <option value="23">2023</option>
              </select>
            </div>
          </div>
     
          <!-- CVV -->
          <div class="control-group">
            <label class="control-label"  for="password_confirm">Card CVV</label>
            <div class="controls">
              <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="span2">
            </div>
          </div>
     
          <!-- Save card -->
          <div class="control-group">
            <div class="controls">
              <label class="checkbox" for="save_card">
                <input type="checkbox" id="save_card" value="option1">
                Save card on file?
              </label>
            </div>
          </div>
     
          <!-- Submit -->
          <div class="control-group">
            <div class="controls">
              <button class="btn btn-success">Pay Now</button>
            </div>
          </div>
     
        </fieldset>
      </form>
            </div>
          </div>
           
        </div>
      
        </div>
        
      </div>
