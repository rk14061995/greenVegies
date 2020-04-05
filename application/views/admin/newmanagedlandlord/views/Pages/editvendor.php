


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Vendor</a>
          </li>
          <li class="breadcrumb-item active">Update Vendor</li>
        </ol>

        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
            Update Vendor</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form class="form-group" action="<?=base_url('Vendor/updateVendorDetails')?>" method="post"  enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <label><strong>First Name</strong> :</label>
                     <?php
                   foreach ($Vendor_data as $od) 
                    {  
                  //print_r($od);             
                   ?>
                   <input class="form-control "type="text" value="<?=$od->fname?>" required name="fname">
                  <input type="hidden" value="<?=$od->vendor_id?>"name="vendor_id">
                </div>
               <div class="col-md-6"><label><strong>Last Name</strong> :</label>
                <input class="form-control "type="text" value="<?=$od->lname?>" required name="lname"> 
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6"><label><strong>Website</strong> :</label>
                <input class="form-control" value="<?=$od->website?>" type="text" name="website">
              </div>
               <div class="col-md-6"><label><strong>Address</strong> :</label>
                <input class="form-control "type="text" value="<?=$od->address?>" required name="address">
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
                 <div class="col-md-3"><label><strong>Zip Code</strong> :</label>
                <input class="form-control "type="text" value="<?=$od->zipcode?>" required name="zc">
              </div>
              </div>
              <br>
               <div class="row">
                <div class="col-md-4"><label><strong>Home Contact</strong> :</label>
                <input class="form-control "type="number" value="<?=$od->hphone?>" required name="hc">
                </div>
                <div class="col-md-4"><label><strong>Work Phone </strong>:</label>
                <input class="form-control "type="number" value="<?=$od->wphone?>" required name="wc">
              </div>
               <div class="col-md-4"><label><strong>Mobile</strong> :</label>
                <input class="form-control "type="number" value="<?=$od->mobile?>" required name="mob"></div>
              </div>
              <br>
               <div class="row">
                <div class="col-md-4"><label><strong>Email</strong> :</label>
                <input class="form-control "type="text" value="<?=$od->email?>" required name="email"></div>
                <div class="col-md-4"><label><strong>Include in MISC Report ?</strong></label>
                  <br>
                  <?php
                  if($od->miscreport==1)
                  {
                    echo '<input type="checkbox" value="'.$od->miscreport.'" checked="checked"  name="misc" >';
                  }
                  else
                  {
                     echo '<input type="checkbox"  value="0"  name="misc" >';
                  }

                  ?>
                </div>
                 <div class="col-md-4"><label><strong>Vendor Insured ?</strong>  :</label>
                  <br>
                  <?php
                   if($od->vinsured==1)
                  {
                    echo '<input type="checkbox" value="'.$od->vinsured.'" checked="checked"  name="vinsured" >';
                  }
                  else
                  {
                     echo '<input type="checkbox"  value="0"  name="vinsured" >';
                  }
                  ?>
                     
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
                <div class="col-md-10"><input class="form-control" type="file"  name="files[]" required multiple></div>
              </div>
              </div> 

                 <div class="row">
                <div class="col-md-2" ><strong>Previous Image</strong>
                      
                </div>
                <div class="col-md-10">
                     <b>Note*: 2 Images Mandatory In Previous Images</b>
                  <br>
                  
                  <input type="hidden" name="image_string" id="image_string" value="<?=$od->vendor_image?>" class="form-control">
                  <ul>
                  <?php
                 
                    $myImages=explode(',',$od->vendor_image);
                    for($i=0; $i<count($myImages);$i++)
                    {
                      ?>
                      <li>
                        <img style="width:5em;"src="<?php echo base_url().'assets/vendor_image/'.$myImages[$i]?>" class="img-reponsive thumbnail ">
                     
                       <a href="javascript:void(0)" img_id="<?=$i?>"  img_String="<?=$od->vendor_image?>" class="btn btn-info deleteimage">Delete</a>
                     </li>
                      <?php
                    
                    }
                  ?>
                </ul>
                </div> 
              </div>
                    
              <br>
              <?php
                  }
                 ?> 
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
      url:"<?=base_url('Vendor/deleteParticularImageFromArrayVendor')?>",
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
              url:"<?=base_url('Vendor/get_States')?>",
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
                        var op;
                        
                        op+='<option value="'+response.data[i].cities_id+'">'+response.data[i].name+'</option>';
                       
                    }
                     $('#city__Id').append(op);
                }
               
                  
              }
                  
              });
            });
          
       
      </script>
