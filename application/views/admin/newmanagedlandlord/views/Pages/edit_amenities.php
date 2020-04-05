
 </script><div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Category</a>
          </li>
          <li class="breadcrumb-item active">Update Amenities</li>
        </ol>

        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
            Update Amenities</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form class="form-group" action="<?=base_url('Building/UpdateAmenities')?>" method="post" enctype="multipart/form-data">
              <div class="row">
                 <div class="col-md-2"><label><strong>Amenities Name</strong></label></div>   
                 <?php
                 foreach ($Particular_amenities_data as $PA)
                  {     
                    //   print_r($PA);
                 ?>    
         <div class="col-md-10"><input class="form-control "type="text"  value="<?=$PA->amenities_name?>" name="category_name">
                   <input class="form-control" value="<?=$PA->amenities_id?>" type="hidden" name="amenities">
                </div>
               
              </div>
              <br>
                  <div class="row">
                <div class="col-md-2" ><strong>Previous Image</strong>
                      
                </div>
                <div class="col-md-10">
                  
                  <input type="text" name="image_string" id="image_string" value="<?=$PA->amenities_image?>" class="form-control">
                  <ul>
                  <?php
                  $i=1;
                    $myImages=explode(',',$PA->amenities_image);
                    
                      ?>
                      <li>
                        <img style="width:5em;"src="<?php echo base_url().'assets/amenities_image/'.$myImages[0]?>"class="img-reponsive thumbnail ">
                     
                       <a href="javascript:void(0)" img_id="<?=$i?>"  img_String="<?=$PA->amenities_image?>" class="btn btn-info deleteimage">Delete</a>
                     </li>
                      
                </ul>
                </div> 
              </div>
              <?php
                    $i++;
                    }
                  ?>
            <div class="row">
                  <div class="col-md-2">
                   <label class="bmd-label-floating"><strong>Amenities Image</strong></label>
                </div>
                       <div class="col-md-3">
                        
                          <input class="form-control" type="file"  name="userfile" required >
                    </div>
                        
                      </div>
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
    //  alert(deleteimage);
    //  alert(imgString);
     $.ajax({
      url:"<?=base_url('Building/AmenitiesdeleteParticularImageFromArray')?>",
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

     
    
