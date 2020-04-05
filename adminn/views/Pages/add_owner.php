
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Owner</a>
          </li>
          <li class="breadcrumb-item active">Add Owner</li>
        </ol>
        </div>
        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
            Add Owner</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form class="form-group" action="<?=base_url('Owner/add_Owner')?>" method="post"  enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <label><strong>First Name</strong> :</label>
                  <input class="form-control "type="text" required placeholder="Example: Xyz" name="fname">
                </div>
                
                <div class="col-md-6">
                   <label><strong>Last Name </strong>:</label>
                   <input class="form-control "type="text" required placeholder="Example: Abc" required name="lname">
                </div>
                 
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label><strong>Email </strong>:</label>
                <input class="form-control "type="text" required placeholder="Example: Xyz@gmail.com "required name="email">
              </div>
               <div class="col-md-6"><label><strong>Address </strong>:</label>
               <input class="form-control "type="text" required placeholder="Example: 8272 Garden Ave.
Daytona Beach, FL 32119" required name="address"></div>
                
              </div>
              <br>
              <div class="row">
               <div class="col-md-3">
                   <label><strong>Country </strong>:</label>
                  	<select  class="countries order-alpha input-style form-control " required name="country" id="countryId">
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
                	<select name="state" class="states order-alpha input-style form-control " required id="stateId">
						<option value="0">Select State</option>
					
					</select>
              </div>
               <div class="col-md-3">
                    <label><strong>City </strong>:</label>
                	<select name="city" class="cities order-alpha cit input-style form-control " required id="cityId">
						<option value="0">Select City</option>
					</select>
              </div>
               <div class="col-md-3">
                  <label><strong>Zip Code </strong>:</label>
                <input class="form-control "type="text" placeholder="Example: 248140 "required name="zc">
              </div>
              </div>
              <br>

               <div class="row"> 
               <div class="col-md-4">
                <label><strong>Home Contact</strong> :</label>
                <input class="form-control "type="number" placeholder="Example: 9876543210 "required name="hc">
              </div>
               <div class="col-md-4">
                  <label><strong>Work Phone</strong> :</label>
                   <input class="form-control "type="number" placeholder="Example: 9876543210 " required name="wc">
                </div>
                 <div class="col-md-4"><label><strong>Mobile </strong>:</label>
                  <input class="form-control "type="number" placeholder="Example: 9876543210 " required name="mob">
                </div>   
              </div>  
              

                       
              <br>
               <div class="row">
                <div class="col-md-1"><label><strong>Note</strong> :</label>   
                </div>
                <div class="col-md-11"><input class="form-control "type="text" required placeholder="Example:  All of them accept the right of ownership as the complete or supreme right that can be exercised over anything " required name="note"></div>
                
              </div>
              <br>
               <div class="row">
                <div class="col-md-1"><img src="<?php echo base_url("/assets/images/c.png");?>">
                </div>
                <div class="col-md-11" >
                  <input  type="file"  name="files[]" required multiple>
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
      	<script src="//geodata.solutions/includes/countrystatecity.js"></script>
 <script>
        $(document).ready(function(){
          $('#countryId').on('change',function(){
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
                       
                       
                        $('#cityId').append(op);
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