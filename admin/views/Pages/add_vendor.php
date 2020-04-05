


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Vendor</a>
          </li>
          <li class="breadcrumb-item active">Add Vendor</li>
        </ol>

        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
            Add Vendor</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form class="form-group" action="<?=base_url('Vendor/addVendor')?>" method="post"  enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <label><strong>First Name</strong> :</label>
                   <input class="form-control "type="text" placeholder="Vin"required name="fname">
                </div>
                <div class="col-md-6">
                  <label><strong>Last Name</strong> :</label>
                   <input class="form-control "type="text" placeholder="Maron"required name="lname">
                </div>
              </div>
              <br>
               
              
              <div class="row">
                <div class="col-md-2"><label><strong>Website</strong> :</label>
                  <input class="form-control "type="text"placeholder="Example:Google.com" required name="website">
                </div>
                <div class="col-md-6">
                  <label><strong>Address</strong> :</label>
                  <input class="form-control "type="text" placeholder="Example: Florida"required name="address">
                </div>
              </div>
              <br>
                <div class="row">
                   <div class="col-md-3">
                   <label><strong>Country </strong>:</label>
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
                 <div class="col-md-3"><label><strong>Zip Code</strong> :</label>
                  <input class="form-control "type="text" placeholder="73301" required name="zc">
                </div>
               
              </div>
              <br>

               <div class="row">
               
                <div class="col-md-4">
                  <label><strong>Home Contact</strong> :</label>
                  <input class="form-control "type="number" placeholder="7330145612"required name="hc">
                </div>
                <div class="col-md-4"><label><strong>Work Phone</strong> :</label>
                  <input class="form-control "type="number" placeholder="7330145612"required name="wc">
                </div>
                <div class="col-md-4"><label><strong>Mobile</strong> :</label>
                  <input class="form-control "type="number" placeholder="7330145612" required name="mob">
                </div>

              </div>
              <br>
               <div class="row">
                <div class="col-md-4"><label><strong>Email</strong> :</label>
                  <input class="form-control "type="text" placeholder="Xyz@gmail.com" required name="email">
                </div>
                <div class="col-md-4">
                  <label><strong>Include in MISC Report ?</strong>:</label>
                  <br>
                  <input type="checkbox"  name="misc">
                </div>
                 <div class="col-md-4"><label><strong>Vendor Insured ?</strong>:</label>
                 <br>
                  <input type="checkbox"  name="vinsured">
                 </div>
              </div>
              <br>      
              <div class="row">
                <div class="col-md-2"><label><strong>Note</strong>  :</label></div>
                <div class="col-md-10"><input class="form-control "type="text" placeholder="xyz content..." name="note"></div>
              </div>
              <br>
             <div class="row">
                <div class="col-md-2" ><img src="<?php echo base_url("/assets/images/c.png");?>"></div>
                <div class="col-md-10"><input  type="file"  name="files[]" required multiple></div>
              </div>
              </div>      
              <br>
               <div class="row">
                <div class="col-md-3"><button type="submit" class="btn btn-success">Add</button></div>        
              </div>

              <hr> 

            </form>
          </div>
         
        </div>
      </div>
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
