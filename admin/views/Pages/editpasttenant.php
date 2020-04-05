<?php
if(count()>0)
{
  $fname=$PastTenant_data[0]->fname;
  $lname=$PastTenant_data[0]->lname;
  $tenaddress=$PastTenant_data[0]->ten_address;
  $city=$PastTenant_data[0]->city;
  $state=$PastTenant_data[0]->state;
  $zipcode=$PastTenant_data[0]->zipcode;
  $homenumber=$PastTenant_data[0]->home_number;
  $worknumber=$PastTenant_data[0]->work_number;
  $mobile=$PastTenant_data[0]->mobile;
  $email=$PastTenant_data[0]->email;
  $rentamount=$PastTenant_data[0]->rent_amount;
  $paymenttype=$PastTenant_data[0]->payment_type;
  $depositamount=$PastTenant_data[0]->deposit_amount;
  $movedate=$PastTenant_data[0]->move_date;
  $leasestartdate=$PastTenant_data[0]->lease_startdate;
  $leaseperiod=$PastTenant_data[0]->lease_period;
  $leaseperiodtime=$PastTenant_data[0]->lease_period_time;
  $tenantmovedout=$PastTenant_data[0]->tenant_moved_out;
  $note=$PastTenant_data[0]->note;
  $firstcontact=$PastTenant_data[0]->first_contact;
  $firstphone=$PastTenant_data[0]->first_phone;
  $secondcontact=$PastTenant_data[0]->second_contact;
  $secondphone=$PastTenant_data[0]->second_phone;
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
<style>
.img {
  border-radius: 50%;
}</style>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Tenant</a>
          </li>
          <li class="breadcrumb-item active">Update Past Tenant</li>
        </ol>

        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
            Update Tenant</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
        <form class="form-group" action="<?=base_url('Tenant/UpdatePastTenantDetails')?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <label><strong>First Name</strong> :</label>
               
                <?php
                foreach ($PastTenant_data as $od) 
                {
                     //print_r($od);
                  ?> 
                
                  <input class="form-control "type="text" value="<?=$od->fname?>" name="fname">
                  <input class="form-control" value="<?=$od->tcurrent_id?>" type="hidden" name="tpast_id">
                </div>
                 <div class="col-md-6">
                  <label><strong>Last Name </strong>:</label>
                  <input class="form-control "type="text" value="<?=$od->lname?>" name="lname">
                </div>
              </div>
             <br>
                <div class="row">
                 <div class="col-md-6"><label><strong></strong>Select Building :</label>
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
                <div class="col-md-6"><label><strong>Address</strong> :</label>
                <input class="form-control add" type="text" value="<?=$od->ten_address?> "name="address"></div> 
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
               <div class="col-md-3"><label><strong>Zip Code</strong> :</label>
                <input class="form-control zpcode" value="<?=$od->zipcode?> " type="text" name="zipcode"></div>
              </div>
              <br>

               <div class="row">
                <div class="col-md-4"><label><strong>Home Contact</strong> :</label>
                <input class="form-control "type="text"value="<?=$od->home_number?> " name="home_number">
                </div>
                  <div class="col-md-4"><label><strong>Work Phone</strong> :</label>
                <input class="form-control "type="text" value="<?=$od->work_number?> "name="work_number"></div>
                 <div class="col-md-4"><label><strong>Mobile</strong> :</label>
                <input class="form-control "type="text" value="<?=$od->zipcode?> "name="mobile">
              </div>
              </div>            
              <br>
               <div class="row">
                <div class="col-md-4"><label><strong>Email</strong> :</label>
                <input class="form-control "type="text" value="<?=$od->email?> "name="email">
               </div>
                <div class="col-md-4"><label><strong>Rent Amount</strong> :</label>
                <input class="form-control "type="text" value="<?=$od->rent_amount?> "name="rent_amount"></div>
                <div class="col-md-4"><label><strong>Payment Type</strong> :</label>
                
                    <select selected class="form-control" value="<?=$od->payment_type?> " name="payment_type">
                        <option value="<?=$od->payment_type?>"><?=$od->payment_type?></option> 
                      <option value="Daily">Daily</option> 
                      <option value="Weekly">Weekly</option>
                      <option value="Bi-Monthly">Bi-Monthly</option>
                      <option value="Monthly">Monthly</option>   
                    </select>
                </div>   
              </div>
              <br>
                <div class="row">
                <div class="col-md-3"><label><strong>Deposit Amount</strong> :</label>
                  <input class="form-control "type="text" value="<?=$od->deposit_amount?>"  name="deposit_amount">
                </div>
                  <div class="col-md-3"><label><strong>Deposit Paid Date</strong>  :</label>
                <input class="form-control "type="date" value="<?=$od->dep_paid_date?>"  name="dep_paid_date">
               </div>
               <div class="col-md-3"><label><strong>Move In Date</strong>  :</label>
                 <input class="form-control "type="date" value="<?=$od->move_date?>" name="move_date">
              </div>
              <div class="col-md-3"><label><strong>Lease Start Date</strong>  :</label>
                <input class="form-control "type="date" value="<?=$od->lease_startdate?>"name="lease_startdate">
              </div>
               </div>
              
              <br>
              <div class="row">  
               <div class="col-md-3"><label><strong>Lease Period</strong></label>
              <input class="form-control" value="<?=$od->lease_period?>"placeholder="Lease Period" type="number" name="lease_period"> 
            </div>
             <div class="col-md-3"><label><strong>Lease Time</strong></label>
                <select selected class="form-control" name="lease_period_time">
                   <option value="<?=$od->lease_period_time?>"><?=$od->lease_period_time?></option> 
                     <option value="Years">Years</option> 
                      <option value="Months">Months</option>
                      <option value="Days">Days</option>
                        
                    </select>
                  </div> 
                  <div class="col-md-3"><label> <strong>Previous Rent Due Day</strong> :</label>
               <!--  <input class="form-control" value="<?=$od->rent_due_day?>"placeholder="Lease Period" type="number" name="lease_period"> -->
             
               <select class="form-control" name="rent_due_day">
                   <option value="<?=$od->rent_due_day?>"><?=$od->rent_due_day?></option>
                      <option value="1">1</option> 
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>  
                      <option value="1">5</option> 
                      <option value="2">6</option>
                      <option value="3">7</option>
                      <option value="4">8</option> 
                      <option value="1">9</option> 
                      <option value="2">10</option>
                      <option value="3">11</option>
                      <option value="4">12</option>  
                      <option value="1">13</option> 
                      <option value="2">14</option>
                      <option value="3">15</option>
                      <option value="4">16</option> 
                      <option value="2">17</option>
                      <option value="3">18</option>
                      <option value="4">19</option> 
                      <option value="1">20</option> 
                      <option value="2">21</option>
                      <option value="3">22</option>
                      <option value="4">23</option>  
                      <option value="1">24</option> 
                      <option value="2">25</option>
                      <option value="3">26</option>
                      <option value="4">27</option>
                       <option value="3">28</option>
                      <option value="4">29</option>  
                      <option value="1">30</option> 
                      <option value="2">31</option>    
                    </select>
                  </div>  
                  <div class="col-md-3"><label><strong>Tenant Moved Out</strong>  :</label>
                    <br>
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
             
              <br>
                <div class="row">
                <div class="col-md-3"><label><strong>Home Contact</strong>  :</label>
                <input class="form-control "type="number" value="<?=$od->first_contact?>" placeholder="First Emergency Contact" name="first_contact">
               </div>
               <div class="col-md-3"><label><strong>Mobile Number</strong> :</label>
                <input class="form-control "type="number" value="<?=$od->first_phone?>" placeholder="First Emergency Contact Phone Number"name="first_phone">
              </div>
               <div class="col-md-3"><label><strong>Home Contact</strong>:</label>
                <input class="form-control "type="number" value="<?=$od->second_contact?>" placeholder="Second Emergency Contact"name="second_contact">
              </div>
               <div class="col-md-2"><label><strong>Mobile Contact</strong>:</label>
                <input class="form-control "type="number" value="<?=$od->second_phone?>" placeholder="Second Emergency Contact Phone Number"name="second_phone">
              </div>
              </div>
              <br>
               <div class="row">
                <div class="col-md-2"><label><strong>Note</strong>  :</label></div>
                <div class="col-md-10"><input class="form-control "type="text" value="<?=$od->note?>" name="note"></div>
              </div>
              <br>
               <div class="row">
                <div class="col-md-2" ><img src="<?php echo base_url("/assets/images/c.png");?>"></div>
                <div class="col-md-10"><input  type="file"  name="files[]"  multiple></div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-2" ><strong>Previous Image</strong>
                      
                </div>
                <div class="col-md-10 ">
                  <b>Note*: Atleast 2  Images Mandatory In Previous Section</b>
                  <br>
                  
                  <input type="hidden" name="image_string" id="image_string" value="<?=$od->tenant_image?>" class="form-control">
                  <ul>
                  <?php
                 
                    $myImages=explode(',',$od->tenant_image);
                    for($i=0; $i<count($myImages);$i++)
                    {
                      ?>
                      <li>
                        <img style="width:5em;"src="<?php echo base_url().'assets/tenant_image/'.$myImages[$i]?>" class="img-reponsive thumbnail ">
                     
                       <a href="javascript:void(0)" img_id="<?=$i?>"  img_String="<?=$od->tenant_image?>" class="btn btn-info deleteimage">Delete</a>
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
      url:"<?=base_url('Tenant/deleteParticularImageFromArrayPT')?>",
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