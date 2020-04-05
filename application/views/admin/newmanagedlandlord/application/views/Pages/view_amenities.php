<style>
 .table td, .table th {
    padding: .75rem;
    vertical-align: top !important;
     border-top: 0px solid #dee2e6 !important; 
      border-bottom: 1px solid #dee2e6 !important; 
}
</style>

            <h5 class="title font-weight-bold space bg-light p-3">Category / Amenities</h5>
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?> 
            <div class="row mt-5">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="font ">SNo</th>
                            <th class="font ">Amenities Name</th>
                            <th class="font">Amenities Image</th>
                            <th class="font ">Action</th>
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
                    <td><a href="javascript:void(0)" amenities_id="<?=$fA->amenities_id?>" class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 deleteamenities">Delete</a></td>
                  </tr>
                <?php
             
              $i++;
              }
             ?>      
              </tbody>    
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
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