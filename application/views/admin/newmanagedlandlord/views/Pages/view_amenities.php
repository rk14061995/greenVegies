
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Category</a>
          </li>
          <li class="breadcrumb-item active">Amenities
</li>
        </ol>
        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i> Amenities</div>
          <div class="card-body ">
           <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?> 
             
            <br>
            <div class="">
             <table class="table table-hover table table-responsive" id="usersss">
              <thead>
                <tr>
                  <th>SNo</th>
                  <th>Amenities Name</th>
                   <th>Amenities Image</th>
                   <th>Action</th>
                 
                 </tr>
              </thead>
              <tbody >
            <?php
              $i=1;
               foreach($fetch_Amenities as $fA)
              {
                // print_r($fA);
                ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$fA->amenities_name?></td>
                     <?php
                 
                    $myImages=explode(',',$fA->amenities_image);
                    
                      ?>
                    <td><img style="width:5em;"src="<?php echo base_url().'assets/amenities_image/'.$myImages[0]?>" class="img-reponsive thumbnail "></td>
                    
                  
                    
                    <!--<td><a href="<?=base_url('Building/edit_amenities/').$fA->amenities_id?>"  class="btn btn-info owner">Edit</a></td>-->
                    <td><a href="javascript:void(0)" amenities_id="<?=$fA->amenities_id?>" class="btn btn-danger deleteamenities">Delete</a></td>
                  </tr>
                <?php
             
              $i++;
              }
             ?>      
              </tbody>              
             </table>
          </div>
        </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>
      </div>
     
      <script type="text/javascript">
        $(document).ready(function(){
          $('.deleteamenities').on('click',function(){ 
             var amenities_id=$(this).attr("amenities_id");

             // alert(owner_id);
           if(confirm("Are you Sure want to delete?") ==true)
            {       
            // alert(owner_id);         
                $.ajax({
                  url:"<?=base_url('Building/DeleteAmenities')?>",
                  type:"post",
                  data:{amenities_id:amenities_id},
                  success:function(response)
                  {   
                  response=JSON.parse(response);             
                     if (response==1)
                      {
                   alert('Record Delete successfully');
                          location.reload();
                    
                       }
                  }
                 })                           
             // userPreference = "Data Delete successfully!";

             }
             else 
             {
              userPreference = "Save Canceled!";
              }
              
          })
        })  
      </script>
    
