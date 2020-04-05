<?php
if(count($currentTenant_data)>0)
{
  $fname=$currentTenant_data[0]->fname;
  $lname=$currentTenant_data[0]->lname;
  $tenaddress=$currentTenant_data[0]->ten_address;
  $city=$currentTenant_data[0]->city;
  $state=$currentTenant_data[0]->state;
  $zipcode=$currentTenant_data[0]->zipcode;
  $homenumber=$currentTenant_data[0]->home_number;
  $worknumber=$currentTenant_data[0]->work_number;
  $mobile=$currentTenant_data[0]->mobile;
  $email=$currentTenant_data[0]->email;
  $rentamount=$currentTenant_data[0]->rent_amount;
  $paymenttype=$currentTenant_data[0]->payment_type;
  $depositamount=$currentTenant_data[0]->deposit_amount;
  $movedate=$currentTenant_data[0]->move_date;
  $leasestartdate=$currentTenant_data[0]->lease_startdate;
  $leaseperiod=$currentTenant_data[0]->lease_period;
  $leaseperiodtime=$currentTenant_data[0]->lease_period_time;
  $tenantmovedout=$currentTenant_data[0]->tenant_moved_out;
  $note=$currentTenant_data[0]->note;
  $firstcontact=$currentTenant_data[0]->first_contact;
  $firstphone=$currentTenant_data[0]->first_phone;
  $secondcontact=$currentTenant_data[0]->second_contact;
  $secondphone=$currentTenant_data[0]->second_phone;
  
 
}
else
{
    $address="";
    $fname="";
    $lname="";
    $tenaddress="";
    $city="";
    $state="";
    $zipcode="";
    $homenumber="";
    $worknumber="";
    $mobile="";
    $email="";
    $rentamount="";
    $paymenttype="";
    $depositamount="";
    $movedate="";
    $leasestartdate="";
    $leaseperiod="";
    $leaseperiodtime="";
    $tenantmovedout="";
    $note="";
    $firstcontact="";
    $firstphone="";
    $secondcontact="";
    $secondphone="";
}
?>
            <h5 class="title font-weight-bold space bg-light p-3">Tenant / Update Current Tenant</h5>
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form action="<?=base_url('Tenant/UpdateCurrentTenantDetails')?>" method="post" enctype="multipart/form-data">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <label for="email">First Name :</label>
                        <?php
                foreach ($currentTenant_data as $od) 
                {
                     // print_r($od);
                  ?> 
                        <input class="form-control "type="text" value="<?=$od->fname?>" name="fname">
                  <input class="form-control" value="<?=$od->tcurrent_id?>" type="hidden" name="tcurrent_id"> 
                    </div>
                    <div class="col-md-6">
                        <label for="email">Last Name :</label>
                        <input class="form-control "type="text" value="<?=$od->lname?>" name="lname">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <label for="email">Select Building :</label>
                        <select class="form-control" name="building_id" id="search_building">
                    <option value="0">Select</option>
                    <?php
                      foreach ($fetch_building as $building) 
                      {
                        if($od->building_id==$building->building_id)
                        {
                        echo '<option value="'.$building->building_id.'" selected>'.$building->address.'</option>';
                      }
                      else
                      {
                       echo '<option value="'.$building->building_id.'">'.$building->address.'</option>';
                      }
                      
            
                      }
                    ?>
                    
                  </select>
                    </div>
                    <div class="col-md-6">
                        <label for="email">Address :</label>
                        <input class="form-control add" type="text" value="<?=$od->ten_address?> "name="address">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        <label for="email">Country :</label>
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
                        <label for="email">State :</label>
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
                        <label for="email">City :</label>
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
                        <label for="email">Zipcode :</label>
                        <input class="form-control zpcode" value="<?=$od->zipcode?> " type="text" name="zipcode">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="email">Home Contact :</label>
                        <input class="form-control "type="text"value="<?=$od->home_number?> " name="home_number">
                    </div>
                    <div class="col-md-4">
                        <label for="email">Work Phone :</label>
                        <input class="form-control "type="text" value="<?=$od->work_number?> "name="work_number">
                    </div>
                    <div class="col-md-4">
                        <label for="email">Mobile :</label>
                        <input class="form-control "type="text" value="<?=$od->mobile?> "name="mobile">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="email">Rent Amount :</label>
                        <input class="form-control "type="text" value="<?=$od->rent_amount?> "name="rent_amount">
                    </div>
                    <div class="col-md-4">
                        <label for="email">Payment Type :</label>
                        <select  class="form-control" value="<?=$od->payment_type?> " name="payment_type">
                      <option value="<?=$od->payment_type?>"><?=$od->payment_type?></option> 
                      <option value="Daily">Daily</option> 
                      <option value="Weekly">Weekly</option>
                      <option value="Bi-Monthly">Bi-Monthly</option>
                      <option value="Monthly">Monthly</option>    
                    </select>
                    </div>
                    <div class="col-md-4">
                        <label for="email">Email :</label>
                        <input class="form-control "type="text" value="<?=$od->email?> "name="email">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        <label for="email">Deposit Amount :</label>
                        <input class="form-control "type="text" value="<?=$od->deposit_amount?>"  name="deposit_amount">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Deposit Paid Date :</label>
                        <input class="form-control "type="date" value="<?=$od->dep_paid_date?>"  name="dep_paid_date">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Move In Date :</label>
                        <input class="form-control "type="date" value="<?=$od->lease_startdate?>"name="lease_startdate">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Lease Start Date :</label>
                        <input class="form-control "type="date" value="<?=$od->move_date?>" name="move_date">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        <label for="email">Lease Period:</label>
                        <input class="form-control" value="<?=$od->lease_period?>"placeholder="Lease Period" type="number" name="lease_period">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Lease Time:</label>
                        <select selected class="form-control" name="lease_period_time">
                    <?php
                    if($od->lease_period_time==1)
                    {?>
                         <option>Years</option> 
                    <?php
                    }
                    elseif($od->lease_period_time==2)
                    {?>
                         <option>Years</option> 
                    <?php
                    }
                    else
                    {?>
                         <option>Days</option> 
                    <?php
                        
                    }
                    ?>
                  
                      <option value="1">Years</option> 
                      <option value="2">Months</option>
                      <option value="3">Days</option>
                        
                    </select>
                    </div>
                    <div class="col-md-3">
                        <label for="email">Rent Due Day :</label>
                        <select class="form-control" name="rent_due_day">
                      <option value="<?=$od->rent_due_day?>"><?=$od->rent_due_day?></option> 
                       <option value="1">1</option> 
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>  
                      <option value="5">5</option> 
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option> 
                      <option value="9">9</option> 
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>  
                      <option value="13">13</option> 
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option> 
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option> 
                      <option value="20">20</option> 
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>  
                      <option value="24">24</option> 
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                       <option value="28">28</option>
                      <option value="29">29</option>  
                      <option value="30">30</option> 
                      <option value="31">31</option>    
                    </select>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                               <label for="email">Tenant Moved Out :</label>
                            </div>
                            <div class="col-md-12">
                            <?php
                    if($od->tenant_moved_out==1)
                    {
                        echo '<input type="checkbox" value="'.$od->tenant_moved_out.'" checked="checked" name="tenant_moved_out" >';
                    }
                    else
                    {
                     echo '<input type="checkbox"  value="0" name="tenant_moved_out" >';   
                    }
                    ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <label for="email">Home Contact :</label>
                        <input class="form-control "type="number" value="<?=$od->first_contact?>" placeholder="First Emergency Contact" name="first_contact">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Mobile Number :</label>
                       <input class="form-control "type="number" value="<?=$od->first_phone?>" placeholder="First Emergency Contact Phone Number"name="first_phone">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Home Contact:</label>
                        <input class="form-control "type="number" value="<?=$od->second_contact?>" placeholder="Second Emergency Contact"name="second_contact">
                    </div>
                    <div class="col-md-3">
                         <label for="email">Mobile Contact:</label>
                         <input class="form-control "type="number" value="<?=$od->second_phone?>" placeholder="Second Emergency Contact Phone Number"name="second_phone">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-1 col-3">
                        <label for="email">Note :</label>
                    </div>
                    <div class="col-md-11 col-9">
                    <input class="form-control "type="text" value="<?=$od->note?>" name="note">
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
                  <input type="hidden" name="image_string" id="image_string" value="<?=$od->tenant_image?>" class="form-control">
                  <ul style="list-style:none" class="float:left">
                  <?php
                 
                 $myImages=explode(',',$od->tenant_image);
                 for($i=0; $i<count($myImages);$i++)
                 {
                   ?>
                    <li>
                    <img style="width:5em;"src="<?php echo base_url().'assets/tenant_image/'.$myImages[$i]?>" class="img-reponsive thumbnail ">
                     
                    <a href="javascript:void(0)" img_id="<?=$i?>"  img_String="<?=$od->tenant_image?>" class=" rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 deleteimage">Delete</a>
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
                <div class="row mt-5">
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
      url:"<?=base_url('Tenant/deleteParticularImageFromArray')?>",
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
              url:"<?=base_url('Tenant/get_States')?>",
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
              url:"<?=base_url('Tenant/get_Cities')?>",
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
    