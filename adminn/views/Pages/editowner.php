<?php


// print_r($user_data);
if(count($user_data)>0)
{
  $country=$user_data[0]->country;
   $state=$user_data[0]->state;
    $city=$user_data[0]->city;
//      $p_lease=$user_data[0]->p_lease;
//   $price=$user_data[0]->price;
//   $ownerid=$user_data[0]->owner_id;
//   $address=$user_data[0]->number_units;
//   $city=$user_data[0]->city;
//   $state=$user_data[0]->state;
//   $pincode=$user_data[0]->pincode;
//   $note=$user_data[0]->note;
 
}
else{
    $country="";
     $state="";
     $city="";
    //  $p_lease="";
    // $price="";
    // $ownerid="";
    // $address="";
    // $city="";
    // $state="";
    // $pincode="";
    // $note="";  
}
?>

 <!-- <?php
print_r($user_data);
?> -->
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Owner</a>
          </li>
          <li class="breadcrumb-item active">Update Owner</li>
        </ol>

        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
            Update Owner</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form class="form-group" action="<?=base_url('Owner/UpdateOwnerDetails')?>" method="post" autocomplete="off" enctype="multipart/form-data">
              <div class="row">
                <?php

                foreach ($user_data as $od) 
                {
                  // print_r($od);
                  ?>
                
                
                                           
                <div class="col-md-6">
                  <label><strong>First Name</strong> :</label>
                  <input class="form-control" value="<?=$od->fname?>" type="text" autocomplete="false" name="fname">
                    <input class="form-control" value="<?=$od->owner_id?>" type="hidden" name="owner_id">
                </div>
                <div class="col-md-6">
                  <label><strong>Last Name</strong> :</label>
                   <input class="form-control "type="text" value="<?=$od->lname?>" autocomplete="false" name="lname">     
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6"><label><strong>Email</strong> :</label>
                <input class="form-control "type="text" value="<?=$od->email?>"  autocomplete="false"name="email">
               </div>
                <div class="col-md-6"><label><strong>Address</strong> :</label>
                  <input class="form-control "type="text" value="<?=$od->address?>"  autocomplete="false"name="address">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-3">
                   <label><strong>Country </strong>:</label>
                  	<select  class="countries order-alpha input-style form-control " autocomplete="false"name="country" id="country__Id">
						<option value="0">Select Country</option>
						<?php
                        foreach($fetchCountries as $count){
                             if($od->country==$count->country_id)
                                {
                                    echo '<option value="'.$count->country_id.'" selected>'.$count->name.'</option>';
                             
                                }
                                else
                                {
                                //   echo '<option value="'.$owner->owner_id.'">'.$owner->fname.' '.$owner->lname.'</option>';
                                   echo '<option value="'.$count->country_id.'">'.$count->name.'</option>';
                                }
                            
                        }
                         
                        // echo '<option value="'.$FC->country_id.'">'.$FC->name.'</option>';
            
                      
                      ?>  
					</select>
				
                 </div>
                  <div class="col-md-3">
                      <label><strong>State </strong>:</label>
                	<select name="state" class="states order-alpha input-style form-control " autocomplete="false" id="state__Id">
						<option value="0">Select State</option>
						<?php
						 if($od->state==$od->states_id)
                        {
                            echo '<option value="'.$od->states_id.'" selected>'.$od->state_name.'</option>';
                        }
						?>
					</select>
              </div>
               <div class="col-md-3">
                    <label><strong>City </strong>:</label>
                	<select name="city" class="cities order-alpha cit input-style form-control" autocomplete="false" id="city__Id">
						<option value="0">Select City</option>
						<?php
						 if($od->city==$od->cities_id)
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
                <input class="form-control "type="text" value="<?=$od->zip_code?>" placeholder="Example: 248140 " autocomplete="false"name="zc">
              </div>
              </div>
              <br>
               <div class="row">
                <div class="col-md-4"><label><strong>Home Contact</strong> :</label>
                <input class="form-control "type="number" value="<?=$od->home_phone?>"  autocomplete="false"name="hc">
              </div>
              <div class="col-md-4"><label><strong>Work Phone </strong>:</label>
                <input class="form-control "type="number" value="<?=$od->work_phone?>"  autocomplete="false"name="wc">
              </div>
                <div class="col-md-4"><label><strong>Mobile</strong> :</label>
                <input class="form-control "type="number" value="<?=$od->mobile?>" autocomplete="false" name="mob">
              </div>
              </div>
              <br>
               <div class="row">
                <div class="col-md-2"><label><strong>Note</strong> :</label></div>
                <div class="col-md-10"><input class="form-control "type="text"  value="<?=$od->note?>" name="note"></div>
              </div>
              <br>
               <div class="row">
                <div class="col-md-2" ><img src="<?php echo base_url("/assets/images/c.png");?>"></div>
                <div class="col-md-10"><input class="form-control" type="file"  name="files[]" required multiple></div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-2" ><strong></strong>Previous Image
                      
                </div>
                <div class="col-md-10">
                  <!-- Image string -->
                  <input type="hidden" name="image_string" id="image_string" value="<?=$od->owner_image?>" class="form-control">
                  <ul>
                  <?php
                 
                    $myImages=explode(',',$od->owner_image);
                    for($i=0; $i<count($myImages);$i++)
                    {
                      ?>
                      <li>
                        <img style="width:5em;"src="<?php echo base_url().'assets/Owner_image/'.$myImages[$i]?>" class="img-reponsive thumbnail ">
                     
                       <a href="javascript:void(0)" img_id="<?=$i?>"  img_String="<?=$od->owner_image?>" class="btn btn-info deleteimage">Delete</a>
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
      url:"<?=base_url('Owner/deleteParticularImageFromArray')?>",
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
	<script src="//geodata.solutions/includes/countrystatecity.js"></script>
     
     <script>
        // $(document).ready(function(){
          $(document).on('change','#country__Id',function(){
            var countryid=$(this).val();
            // alert(countryid);
            $.ajax({
              url:"<?=base_url('Owner/get_States')?>",
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
              url:"<?=base_url('Owner/get_Cities')?>",
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
