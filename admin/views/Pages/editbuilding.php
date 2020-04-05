 <?php
if(count($building_data)>0)
{
  $address=$building_data[0]->address;
   $p_buy=$building_data[0]->p_buy;
    $p_rent=$building_data[0]->p_rent;
     $p_lease=$building_data[0]->p_lease;
  $price=$building_data[0]->price;
  $ownerid=$building_data[0]->owner_id;
   $address=$building_data[0]->number_units;
  $city=$building_data[0]->city;
   $state=$building_data[0]->state;
  $pincode=$building_data[0]->pincode;
  $note=$building_data[0]->note;
 
}
else{
    $address="";
     $p_buy="";
     $p_rent="";
     $p_lease="";
    $price="";
    $ownerid="";
    $address="";
    $city="";
    $state="";
    $pincode="";
    $note="";  
}
?>
   
 </script><div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Building</a>
          </li>
          <li class="breadcrumb-item active">Update Building</li>
        </ol>

        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
            Update Building</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form class="form-group" action="<?=base_url('Building/UpdateBuildingDetails')?>" method="post" enctype="multipart/form-data">
              <div class="row">
                 <div class="col-md-4"><label><strong>Address</strong> :</label>
              <?php
                foreach ($building_data as $od) 
                {
                    //  print_r($od);
                  ?>          
                <input class="form-control "type="text"  value="<?=$od->buildaddress?>" name="address">
                   <input class="form-control" value="<?=$od->building_id?>" type="hidden" name="building_id">
                </div>
                <div class="col-md-4"><strong>Property Purpose</strong><label> :</label> 
                <br>  
                   <?php
                      if($od->p_buy==1)
                      {
                       echo '<input type="checkbox" value="'.$od->p_buy.'" checked="checked" name="buy" ><strong>Buy</strong>';
                     }
                     else
                     {
                       echo '<input type="checkbox"  value="0" name="buy" ><strong>Buy</strong>';
                     }
                      ?> 
                  
               
                   
                       <?php
                      if($od->p_rent==1)
                      {
                       echo '<input type="checkbox" value="'.$od->p_rent.'" checked="checked"  name="rent" ><strong>Rent</strong>';
                     }
                     else
                     {
                       echo '<input type="checkbox"  value="0"  name="rent" ><strong>Rent</strong>';
                     }
                      ?>
                  
                      <?php
                      if($od->p_lease==1)
                      {
                       echo '<input type="checkbox" value="'.$od->p_lease.'" checked="checked"  name="lease" ><strong>  Lease  </strong>';
                     }
                     else
                     {
                       echo '<input type="checkbox" value="0"  name="lease" ><strong>Lease</strong>';
                     }
                      ?> 
                
                  </div>
                   <div class="col-md-4"><label><strong>Price</strong>:</label>
                       <input class="form-control "type="text"  value="<?=$od->price?>" name="price">
                    </div>
                  </div>
              <br>
              <div class="row">
                 <div class="col-md-3"><label> <strong>Owner</strong>:</label>
                     <select class="form-control" value="<?=$od->owner_id?>"name="owner">
                    <option value="0">Select</option>
                    <?php
                      foreach ($fetch_owner as $owner) 
                      {
                        if($od->owner_id==$owner->owner_id)
                        {
                            // print_r($od->owner_id);
                            // print_r($owner->owner_id);
                      echo '<option value="'.$owner->owner_id.'" selected>'.$owner->fname.' '.$owner->lname.'</option>';
                     
                        }
                        else
                        {
                          echo '<option value="'.$owner->owner_id.'">'.$owner->fname.' '.$owner->lname.'</option>';
                        }
                      }
                    ?>
                    
                  </select>
                </div>  
                   <div class="col-md-3"><label><strong>Number of Units </strong>:</label>
                   <input class="form-control "type="text" value="<?=$od->number_units?>" name="Nunits">
                  </div>
                  <div class="col-md-3">
                     <label>Latitude</label> :</label>
                     <input class="form-control "type="text" autocomplete="false" value="<?=$od->latitude?>"required name="laltitude" placeholder="37.0902">
                 </div>
                  <div class="col-md-3">
                     <label>Longitude</label> :</label>
                     <input class="form-control "type="text" autocomplete="false" value="<?=$od->longitude?>"required name="longitude" placeholder="95.7129">
                 </div>
                </div>
              <br>
             <div class="row">
                <div class="col-md-3">
                   <label><strong>Country </strong>:</label>
                   
                  	<select  class="countries order-alpha input-style form-control " name="country" id="country__Id">
						<option value="0">Select Country</option>
						<?php
                        foreach($fetchCountries as $count){
                             if($od->country_id==$count->country_id)
                                {
                                    echo '<option value="'.$count->country_id.'" selected>'.$count->name.'</option>';
                             
                                }else{
                                    echo '<option value="'.$count->country_id.'" >'.$count->name.'</option>';
                                }
                                
                            
                        }
                         
                        // echo '<option value="'.$FC->country_id.'">'.$FC->name.'</option>';
            
                      
                      ?>  
					</select>
				
                 </div>
                  <div class="col-md-3">
                      <label><strong>State </strong>:</label>
                	<select name="state" class="states order-alpha input-style form-control " id="state__Id">
						<option value="0">Select State</option>
						<?php
						 if($od->state_id==$od->states_id)
                        {
                            echo '<option value="'.$od->states_id.'" selected>'.$od->state_name.'</option>';
                        }
                        else
                        {
                             echo '<option value="'.$od->states_id.'">'.$od->state_name.'</option>';
                        }
						?>
					</select>
              </div>
               <div class="col-md-3">
                    <label><strong>City </strong>:</label>
                	<select name="city" class="cities order-alpha cit input-style form-control" id="city__Id">
						<option value="0">Select City</option>
						<?php
						 if($od->cities_id==$od->cities_id)
                        {
                        echo '<option value="'.$od->cities_id.'" selected>'.$od->city_name.'</option>';
                     
                        }
                        else
                        {
                        //   echo '<option value="'.$owner->owner_id.'">'.$owner->fname.' '.$owner->lname.'</option>';
                          echo '<option value="'.$od->cities_id.'">'.$od->city_name.'</option>';
                        }
						
						?>
					</select>
              </div>
               <div class="col-md-3">
                  <label><strong>Zip Code </strong>:</label>
                <input class="form-control "type="text" placeholder="Example: 248140 "value="<?=$od->pincode?>"required name="zc">
              </div>
              </div>
              <br>
              <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                        <label class="bmd-label-floating"><strong>Amenities</strong></label><br><br>
                        <textarea rows="10" cols="20"class="form-control" name="editor1"><?=$od->amenities?></textarea>
                          <script>
                                  CKEDITOR.replace( 'editor1' );
                          </script>
                        </div>
                    </div> 
                </div>
              <br>
               <div class="row">
                   <div class="col-md-6">
                <label><strong>Note</strong> :</label>
                <input class="form-control "type="text" value="<?=$od->buildnote?>" name="note">
                </div>
                
                  <div class="col-md-3">
                        <label>Property Registration No:</label>
                        <input class="form-control "type="text" value="<?=$od->registration_num?>"autocomplete="false" name="registration" required placeholder="DDbzd73301">
                    </div>
                 
                 <div class="col-md-3">
                        <label>Area:</label>
                        <input class="form-control "type="text" autocomplete="false" value="<?=$od->area?>"name="area" required placeholder=" 2010 Sq.Ft">
                    </div>
              </div>
              <br>
               <div class="row">
                <div class="col-md-2" ><img src="<?php echo base_url("/assets/images/c.png");?>"></div>
               <div class="col-md-10"><input  type="file"  name="files[]" required  multiple>
                </div>
              </div>
              <br>
               <div class="row">
                <div class="col-md-2" ><strong>Previous Image</strong>
                      
                </div>
                <div class="col-md-10">
                  
                  <input type="hidden" name="image_string" id="image_string" value="<?=$od->building_image?>" class="form-control">
                  <ul>
                  <?php
                    $myImages=explode(',',$od->building_image);
                    for($i=0; $i<count($myImages);$i++)
                    {
                      ?>
                      <li>
                        <img style="width:5em;"src="<?php echo base_url().'assets/Building_image/'.$myImages[$i]?>" class="img-reponsive thumbnail ">
                     
                       <a href="javascript:void(0)" img_id="<?=$i?>"  img_String="<?=$od->building_image?>" class="btn btn-info deleteimage">Delete</a>
                     </li>
                      <?php
                    
                    }
                  ?>
                </ul>
                </div> 
              </div>
              <?php
               }
                ?>
              <br> 
               <div class="row">
                <div class="col-md-2"><button type="submit" class="btn btn-success">Update</button></div>        
              </div>

            </form>
          </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>
      </div>

       <script type="text/javascript">
 $(document).ready(function(){
  $('.deleteimage').on('click',function(){
    var element=$(this);
     var deleteimage=$(this).attr('img_id');
     var imgString=$("#image_string").val();
     $.ajax({
      url:"<?=base_url('Building/deleteParticularImageFromArray')?>",
      type:"post",
      data:{imgIndex:deleteimage,imgString:imgString},

      success:function(response){
        // console.log(response)
        response=JSON.parse(response);
        if(response.code==1){
          element.parent().remove();
          $('#image_string').val(response.newString);
          // console.log("sdfsdf"+response.newString)
        }
      }
     })


  })

 })
</script>
 <script>
        // $(document).ready(function(){
          $(document).on('change','#country__Id',function(){
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
                console.log(response);
                  if(response.code==1)
                  {
                    var html;
                    for (var i = 0; i <response.data.length; i++) 
                    {
                        // var html;
                        html+='<option value="'+response.data[i].states_id+'">'+response.data[i].name+'</option>';
           
                    }
                    $('#state__Id').append(html);
                }
               
                  
              }
                  
              });
            });
         
       
      </script>
       <script>
       
          $(document).on('change','#state__Id',function(){
            var stateId=$(this).val();
        //   alert(stateId);
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
                        var op;
                        
                        op+='<option value="'+response.data[i].cities_id+'">'+response.data[i].name+'</option>';
                       
                    }
                     $('#city__Id').append(op);
                }
               
                  
              }
                  
              });
            });
          
       
      </script>
    

     
    
