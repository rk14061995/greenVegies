<style>
 .table td, .table th {
    padding: .75rem;
    vertical-align: top !important;
     border-top: 0px solid #dee2e6 !important; 
      border-bottom: 1px solid #dee2e6 !important; 
}
</style>

            <h5 class="title font-weight-bold space bg-light p-3">Users / Users Details</h5>
           
            <div class="row mt-5">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th class="font text-center">SNo</th>
                            <th class="font text-center">Image</th>
                            <th class="font text-center">User Name</th>
                            <th class="font text-center">Email</th>
                            <th class="font text-center">Contact</th> 
                            <th class="font text-center">Address</th>
                            <th class="font text-center">Ship. Address</th>
                            <th class="font text-center">Gender</th>
                            <th class="font text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody >
            <?php
              $i=1;
              // print_r($viewowner);
              foreach($fetch_users as $row)
              {
                  // print_r($row);           
                ?>
                  <tr>
                    <td><?=$i?></td>
                    <?php
                 
                    $myImages=explode(',',$row->user_image);
                    
                      ?>
                    <td><img style="width:5em;"src="<?php echo base_url().'assets/Users_image/'.$myImages[0]?>" class="img-reponsive thumbnail "></td>
                    <td><?=$row->name?></td>
                    <td><?=$row->email  ?></td>
                    <td><?=$row->phone?></td>
                    <td><?=$row->address?></td>
                    <td><?=$row->shipping_address?></td>
                    <td><?=$row->gender?></td>
                    
                  <!--   <td><a href="<?=base_url('Building/editBuilding/').$row->id?>"  class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style building">Edit</a></td> -->
                    <td><a href="javascript:void(0)" users_id="<?=$row->id?>" class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 deleteproduct">Delete</a></td>
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
          $('.deleteproduct').on('click',function(){ 
             var product_id=$(this).attr("product_id");
             // alert(owner_id);
           if(confirm("Are you Sure want to delete?") ==true)
            {       
            // alert(owner_id);         
                $.ajax({
                  url:"<?=base_url('Products/DeleteProducts')?>",
                  type:"post",
                  data:{product_id:product_id},
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
    