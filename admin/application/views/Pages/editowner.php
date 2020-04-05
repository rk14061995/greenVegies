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
            <h5 class="title font-weight-bold space bg-light p-3">Owner / Update Owner</h5>
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form action="<?=base_url('Owner/UpdateOwnerDetails')?>" method="post" autocomplete="off" enctype="multipart/form-data">
            <?php

                    foreach ($user_data as $od) 
                    {
                    // print_r($od);
                    ?>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <label for="email">First Name :</label>
                        <input class="form-control" value="<?=$od->fname?>" type="text" autocomplete="false" name="fname">
                    <input class="form-control" value="<?=$od->owner_id?>" type="hidden" name="owner_id">
                    </div>
                    <div class="col-md-6">
                        <label for="email">Last Name :</label>
                        <input class="form-control "type="text" value="<?=$od->lname?>" autocomplete="false" name="lname"> 
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <label for="email">Email :</label>
                        <input class="form-control "type="text" value="<?=$od->email?>"  autocomplete="false"name="email">
                    </div>
                    <div class="col-md-6">
                        <label for="email">Address :</label>
                        <input class="form-control "type="text" value="<?=$od->address?>"  autocomplete="false"name="address">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        <label for="email">Country :</label>
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
                        <label for="email">State :</label>
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
                        <label for="email">City :</label>
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
                        <label for="email">Zipcode :</label>
                        <input class="form-control "type="text" value="<?=$od->zip_code?>" placeholder="Example: 248140 " autocomplete="false"name="zc">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="email">Home Contact :</label>
                        <input class="form-control "type="number" value="<?=$od->home_phone?>"  autocomplete="false"name="hc">
                    </div>
                    <div class="col-md-4">
                        <label for="email">Work Phone :</label>
                        <input class="form-control "type="number" value="<?=$od->work_phone?>"  autocomplete="false"name="wc">
                    </div>
                    <div class="col-md-4">
                        <label for="email">Mobile :</label>
                        <input class="form-control "type="number" value="<?=$od->mobile?>" autocomplete="false" name="mob">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-1">
                        <label for="email">Note :</label>
                    </div>
                    <div class="col-md-11">
                    <input class="form-control "type="text"  value="<?=$od->note?>" name="note">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-1 col-3">
                    <img src="<?php echo base_url("/assets/images/c.png");?>">
                    </div>
                    <div class="col-md-11 mt-4 col-9">
                    <input class="form-control" type="file"  name="files[]" required multiple>
                    </div>   
                </div>
                <div class="row mt-4">
                <div class="col-md-2 col-3"><strong></strong>Previous Image
                      
                </div>
                <div class="col-md-10 col-9">
                  <!-- Image string -->
                  <input type="hidden" name="image_string" id="image_string" value="<?=$od->owner_image?>" class="form-control">
                  <ul style="list-style:none" class="float-left">
                  <?php
                 
                    $myImages=explode(',',$od->owner_image);
                    for($i=0; $i<count($myImages);$i++)
                    {
                      ?>
                    <li>
                        <img style="width:4em;" src="<?php echo base_url().'assets/Owner_image/'.$myImages[$i]?>" class="img-reponsive thumbnail ">
                     
                        <a href="javascript:void(0)" img_id="<?=$i?>"  img_String="<?=$od->owner_image?>" class=" rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 deleteimage">Delete</a>
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
                <div class="row mt-3">
                    <div class="col-md-3">
                       <button type="submit" class="w-75 rounded-pill border-0 p-2 text-white font-weight-bold butn-style">Update</button>
                    </div>
                </div>
                <div class="row mt-5">
                    <p class="bg-light p-3 w-100 text-center mt-3">© Copyright 2020 DigitalForgeco.com. All Rights Reserved</p>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
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
