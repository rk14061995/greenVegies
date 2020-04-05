
            <h5 class="title font-weight-bold space bg-light p-3">Vendor / Add Vendor</h5>
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form action="<?=base_url('Vendor/addVendor')?>" method="post"  enctype="multipart/form-data">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <label for="email">First Name :</label>
                        <input class="form-control "type="text" placeholder="Vin"required name="fname">
                    </div>
                    <div class="col-md-6">
                        <label for="email">Last Name :</label>
                        <input class="form-control "type="text" placeholder="Maron"required name="lname">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        <label for="email">Website :</label>
                        <input class="form-control "type="text"placeholder="Example:Google.com" required name="website">
                    </div>
                    <div class="col-md-6">
                        <label for="email">Address :</label>
                        <input class="form-control "type="text" placeholder="Example: Florida"required name="address">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        <label for="email">Country :</label>
                        <select  class="countries order-alpha input-style form-control " required name="country" id="countryId">
						<option value="">Select Country</option>
						<?php
                      foreach ($GetCountries as $GC) 
                      {
                        //   print_r($GC);
                          
                         echo '<option value="'.$GC->country_id.'">'.$GC->name.'</option>';
            
                      }
                      ?>  
					</select>
                    </div>
                    <div class="col-md-3">
                        <label for="email">State :</label>
                        <select name="state" class="states order-alpha input-style form-control " required id="stateId">
						<option value="0">Select State</option>
					
					</select>
                    </div>
                    <div class="col-md-3">
                        <label for="email">City :</label>
                        <select name="city" class="cities order-alpha cit input-style form-control " required id="cityId">
						<option value="0">Select City</option>
					</select>
                    </div>
                    <div class="col-md-3">
                        <label for="email">Zipcode :</label>
                        <input class="form-control "type="text" placeholder="73301" required name="zc">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="email">Home Contact :</label>
                        <input class="form-control "type="number" placeholder="7330145612"required name="hc">
                    </div>
                    <div class="col-md-4">
                        <label for="email">Work Phone :</label>
                        <input class="form-control "type="number" placeholder="7330145612"required name="wc">
                    </div>
                    <div class="col-md-4">
                        <label for="email">Mobile :</label>
                        <input class="form-control "type="number" placeholder="7330145612" required name="mob">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="email">Email :</label>
                        <input class="form-control "type="text" placeholder="Xyz@gmail.com" required name="email">
                    </div>
                    <div class="col-md-4">
                        <div class="row mt-4">
                            <div class="col-md-12 col-9">
                               <label for="email">Include in MISC Report ?:</label>
                            </div>
                            <div class="col-md-12 col-3">
                               <input type="checkbox"  name="misc">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12 col-9">
                               <label for="email">Vendor Insured ?:</label>
                            </div>
                            <div class="col-md-12 col-3">
                            <input type="checkbox"  name="vinsured">
                            </div>
                        </div>
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
          $('#countryId').on('change',function(){
            var countryid=$(this).val();
            // alert(countryid);
            $.ajax({
              url:"<?=base_url('Vendor/get_States')?>",
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
              url:"<?=base_url('Vendor/get_Cities')?>",
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