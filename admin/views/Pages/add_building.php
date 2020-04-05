
 <style>
     label{
         font-weight:bold;
     }
 </style>
 <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Building</a>
          </li>
          <li class="breadcrumb-item active">Add Building</li>
        </ol>

        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
            Add Building</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form class="form-group" action="<?=base_url('Building/add_building')?>" method="post" autocomplete="off" enctype="multipart/form-data">
              <div class="row">
                   <div class="col-md-3">
                    <label>Building Name :</label><br>
                    <input class="form-control "type="text" name="buildingname" required  autocomplete="false" placeholder="Example: London">
                </div>
                <div class="col-md-3">
                    <label>Address :</label><br>
                    <input class="form-control "type="text" name="address" autocomplete="false" required placeholder="Example: Florida">
                </div>
                <div class="col-md-3">
                    <label>Property Purpose :</label>
                    <br>
                    <input type="checkbox"   name="buy" > <strong>Buy</strong>
                    <input type="checkbox"  name="rent" > <strong>Rent</strong>
                    <input type="checkbox"   name="lease" ><strong>Lease</strong> 
                </div>
                <div class="col-md-3">
                    <label>Price:</label>
                   <input class="form-control "type="text" required autocomplete="false" name="price" placeholder="$ 240">
                </div>
              </div>
             <div class="row">
                 <div class="col-md-3">
                     <label>Owner :</label>
                     <select class="form-control"  name="owner" autocomplete="false" required>
                        <option value="0">Select</option>
                        <?php
                          foreach ($fetch_owner as $owner) 
                          {
                            echo '<option value="'.$owner->owner_id.'" required>'.$owner->fname.' '.$owner->lname.'</option>';
    
                          }
                        ?>
                      </select>
                 </div>
                 <div class="col-md-3">
                     <label>Number of Units :</label>
                     <input class="form-control "type="text" autocomplete="false" required name="Nunits" placeholder="Example: 32">
                 </div>
                  <div class="col-md-3">
                     <label>Latitude</label> :</label>
                     <input class="form-control "type="text" autocomplete="false" required name="laltitude" placeholder="37.0902">
                 </div>
                  <div class="col-md-3">
                     <label>Longitude</label> :</label>
                     <input class="form-control "type="text" autocomplete="false" required name="longitude" placeholder="95.7129">
                 </div>
             </div>
                <div class="row">
                     <div class="col-md-3">
                   <label><strong>Country </strong>:</label>
                  	<select  class="countries order-alpha input-style form-control " autocomplete="false" required name="country" id="countryId">
						<option value="">Select Country</option>
						<?php
                      foreach ($fetchCountries as $FC) 
                      {
                        echo '<option value="'.$FC->country_id.'">'.$FC->name.'</option>';
            
                      }
                      ?>  
					</select>
				
                 </div>
                     <div class="col-md-3">
                      <label><strong>State </strong>:</label>
                	<select name="state" class="states order-alpha input-style form-control " autocomplete="false" required id="stateId">
						<option value="0">Select State</option>
					
					</select>
              </div>
              <div class="col-md-3">
                    <label><strong>City </strong>:</label>
                	<select name="city" class="cities order-alpha cit input-style form-control " autocomplete="false" required id="cityId">
						<option value="0">Select City</option>
					</select>
              </div>
                    <div class="col-md-3">
                        <label>Zip Code :</label>
                        <input class="form-control "type="text" autocomplete="false" name="zc" required placeholder="73301">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                        <label class="bmd-label-floating"><strong>Amenities</strong></label><br>
                        <?php
                        foreach($fetch_Amenities as $Famnt)
                        {
                            // print_r($Famnt);
                        ?>
                      
                           <ul class="d-inline-flex ">
                       <li>
                        <input type="checkbox" name="amenities[]" value="<?=$Famnt->amenities_id?>"><?=$Famnt->amenities_name?>
                        <?php
                 
                        $myImages=explode(',',$Famnt->amenities_image);
                    
                      ?>
                      
                    <td><img style="width:2em;"src="<?php echo base_url().'assets/amenities_image/'.$myImages[0]?>" class="img-reponsive thumbnail "></td>
                    </li>
                    </ul>  
                       
                        <?php
                        } ?>
                         
                        </div>
                    </div> 
                </div>
                <br>
               <div class="row">
                <div class="col-md-6">
                    <label>Note :</label>
                   
                  <input class="form-control "type="text" required placeholder="Xyz Content...." name="note"></div>
                    
                    <div class="col-md-3">
                        <label>Property Registration No:</label>
                        <input class="form-control "type="text" autocomplete="false" name="registration" required placeholder="DDbzd73301">
                    </div>
                     <div class="col-md-3">
                        <label>Area:</label>
                        <input class="form-control "type="text" autocomplete="false" name="area" required placeholder=" 2010 Sq.Ft">
                    </div>
                </div>
             
              <br>
              <div class="row">
                  <div class="col-lg-2">
                      <img src="<?php echo base_url("/assets/images/c.png");?>" width="50px">
                      </div>
                      <div class="col-lg-10">
                          <input type="file"  name="files[]" required multiple>
                          </div>
                      
                  </div>
              </div>
             <hr>
               <div class="row">
                <div class="col-md-2"><button type="submit" class="btn btn-success">Add</button></div>        
              </div>

            </form>
          </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>
      </div>
      	<!--<script src="//geodata.solutions/includes/countrystatecity.js"></script>-->
      <script>
        $(document).ready(function(){
          $('#countryId').on('change',function(){
            var countryid=$(this).val();
            // alert(countryid);
            $.ajax({
              url:"<?=base_url('Building/get_States')?>",
              type:"post",
              data:{countryid:countryid},
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
              url:"<?=base_url('Building/get_Cities')?>",
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
    
