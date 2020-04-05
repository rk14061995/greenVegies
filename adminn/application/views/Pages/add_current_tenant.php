
            <h5 class="title font-weight-bold space bg-light p-3">Tenant / Add Current Tenant</h5>
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form action="<?=base_url('Tenant/add_current_tenant')?>" autocomplete="off" method="post" enctype="multipart/form-data">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <label for="email">First Name :</label>
                        <input class="form-control  " placeholder="Maron"type="text" required autocomplete="false" name="lname">
                    </div>
                    <div class="col-md-6">
                        <label for="email">Last Name :</label>
                        <input type="text" placeholder="Example:Abc" class="form-control" name="email" required>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <label for="email">Select Building :</label>
                        <select class="form-control" name="building_id" autocomplete="false" required id="search_building">
                    <option value="0">Select</option>
                    <?php
                      foreach ($fetch_building as $building) 
                      {
                        echo '<option value="'.$building->building_id.'">'.$building->address.'</option>';
            
                      }
                    ?>     
                  </select>
                    </div>
                    <div class="col-md-6">
                        <label for="email">Address :</label>
                        <input class="form-control add"type="text" autocomplete="false" required placeholder="Example: Florida"value="" name="address">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        <label for="email">Country :</label>
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
                        <label for="email">State :</label>
                        <select name="state" class="states order-alpha input-style form-control " autocomplete="false" required id="stateId">
						<option value="0">Select State</option>
					</select>
                    </div>
                    <div class="col-md-3">
                        <label for="email">City :</label>
                        <select name="city" class="cities order-alpha cit input-style form-control " autocomplete="false" required id="cityId">
						<option value="0">Select City</option>
					</select>
                    </div>
                    <div class="col-md-3">
                        <label for="email">Zipcode :</label>
                        <input class="form-control zpcode" value="" type="text" placeholder="73301" autocomplete="false" required name="zipcode">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="email">Home Contact :</label>
                        <input class="form-control "type="text" required autocomplete="false" placeholder="7330145612"name="home_number">
                    </div>
                    <div class="col-md-4">
                        <label for="email">Work Phone :</label>
                        <input class="form-control "type="text" required autocomplete="false" placeholder="7330145612" name="work_number">
                    </div>
                    <div class="col-md-4">
                        <label for="email">Mobile :</label>
                        <input class="form-control "type="text" required autocomplete="false" placeholder="7330145612" name="mobile">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="email">Rent Amount :</label>
                        <input class="form-control "type="text" required autocomplete="false" placeholder="$1256" name="rent_amount">
                    </div>
                    <div class="col-md-4">
                        <label for="email">Payment Type :</label>
                        <select selected class="form-control" autocomplete="false" required name="payment_type">
                       <option value="Daily">Daily</option> 
                      <option value="Weekly">Weekly</option>
                      <option value="Bi-Monthly">Bi-Monthly</option>
                      <option value="Monthly">Monthly</option>   
                    </select>
                    </div>
                    <div class="col-md-4">
                        <label for="email">Email :</label>
                        <input class="form-control "type="text" required autocomplete="false" placeholder="Xyz@gmail.com" name="email">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        <label for="email">Deposit Amount :</label>
                        <input class="form-control "type="text" required autocomplete="false"placeholder="$120"name="deposit_amount">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Deposit Paid Date :</label>
                        <input class="form-control "type="date"required autocomplete="false" placeholder="20/09/20" name="dep_paid_date">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Move In Date :</label>
                        <input class="form-control "type="date" required autocomplete="false" placeholder="20/09/20"name="move_date">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Lease Start Date :</label>
                        <input class="form-control "type="date" required placeholder="20/09/20"name="lease_startdate">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        <label for="email">Lease Period:</label>
                        <input class="form-control" placeholder="Lease Period" type="number" required name="lease_period"> 
                    </div>
                    <div class="col-md-3">
                        <label for="email">Lease Time:</label>
                        <select selected class="form-control" required name="lease_period_time">
                      <option value="1">Years</option> 
                      <option value="2">Months</option>
                      <option value="3">Days</option>
                        
                    </select> 
                    </div>
                    <div class="col-md-3">
                        <label for="email">Rent Due Day :</label>
                        <select selected class="form-control" required name="rent_due_day">
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
                            <input type="checkbox" name="tenant_moved_out">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <label for="email">Home Contact :</label>
                        <input class="form-control "type="number" required placeholder="First Emergency Contact" name="first_contact">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Mobile Number :</label>
                        <input class="form-control "type="number" required placeholder="First Emergency Phone Number"name="first_phone">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Home Contact:</label>
                        <input class="form-control "type="number" required placeholder="Second Emergency Contact"name="second_contact">
                    </div>
                    <div class="col-md-3">
                         <label for="email">Mobile Contact:</label>
                         <input class="form-control "type="number"  required placeholder="Second Emergency Phone Number" name="second_phone"> 
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-1 col-3">
                        <label for="email">Note :</label>
                    </div>
                    <div class="col-md-11 col-9">
                    <input class="form-control "type="text" placeholder="xyz content..." name="note">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-1 col-3">
                    <img src="<?php echo base_url("/assets/images/c.png");?>">
                    </div>
                    <div class="col-md-11 mt-4 col-9">
                    <input  type="file"  name="files[]" required multiple>
                    </div>   
                </div>
                <div class="row mt-5">
                    <div class="col-md-3">
                       <button type="submit" class="w-75 rounded-pill border-0 p-2 text-white font-weight-bold butn-style">Add</button>
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
<script>
        $(document).ready(function(){
          $('#search_building').on('change',function(){
            var buildingid=$(this).val();
            $.ajax({
              url:"<?=base_url('Tenant/fetchBuilbyid')?>",
              type:"post",
              data:{buildingid:buildingid},
              success:function(response)
              {
                response=JSON.parse(response);
                $(".add").val(response[0].address);
                $(".city").val(response[0].city);
                $(".state").val(response[0].state);
                 $(".zpcode").val(response[0].pincode);


              }

            })

          })
        })
      </script>
      <script>
        $(document).ready(function(){
          $('#countryId').on('change',function(){
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
    