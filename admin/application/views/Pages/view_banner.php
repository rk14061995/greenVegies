<style>
 .table td, .table th {
    padding: .75rem;
    vertical-align: top !important;
     border-top: 0px solid #dee2e6 !important; 
      border-bottom: 1px solid #dee2e6 !important; 
}
</style>

            <h5 class="title font-weight-bold space bg-light p-3">Banner / View Banner</h5>
            
            <div class="row mt-5">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="font ">SNo</th>
                            
                            <th class="font">Banner Image</th>
                            <th class="font ">Action</th>
                        </tr>
                    </thead>
                    <tbody >
            <?php
              $i=1;
               foreach($fetch_banner as $fB)
              {
                // print_r($fA);
                ?>
                  <tr>
                    <td><?=$i?></td>
                     <?php
                 
                    $myImages=explode(',',$fB->banner_path);
                    
                      ?>
                    <td><img style="width:5em;"src="<?php echo base_url().'assets/banner_image/'.$myImages[0]?>" class="img-reponsive thumbnail "></td>
                    
                  
                    
                    <td><a href="<?=base_url('Products/edit_banner/').$fB->id?>"  class="btn btn-info owner">Edit</a></td>
                    <td><a href="javascript:void(0)" banner_id="<?=$fB->id?>" class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 deletebanner">Delete</a></td>
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
          $('.deletebanner').on('click',function(){ 
             var banner_id=$(this).attr("banner_id");

             // alert(owner_id);
           if(confirm("Are you Sure want to delete?") ==true)
            {       
            // alert(owner_id);         
                $.ajax({
                  url:"<?=base_url('Products/DeleteBanner')?>",
                  type:"post",
                  data:{banner_id:banner_id},
                  success:function(response)
                  {   
                  response=JSON.parse(response);             
                     if (response==1)
                      {
                        swal('Banner!','Deleted','success');
                   
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