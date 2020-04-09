<style>
 .table td, .table th {
    padding: .75rem;
    vertical-align: top !important;
     border-top: 0px solid #dee2e6 !important; 
      border-bottom: 1px solid #dee2e6 !important; 
}
</style>

            <h5 class="title font-weight-bold space bg-light p-3">Products / View Products</h5>
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?> 
            <div class="row mt-5">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th class="font text-center">SNo</th>
                            <th class="font text-center">Image</th>
                            <th class="font text-center"> Name</th>
                            <th class="font text-center">Descripton</th>
                            <th class="font text-center">Category</th> 
                            <th class="font text-center">Status</th>
                            <th class="font text-center">Price</th>
                            <th class="font text-center">Discount</th>
                            <th class="font text-center">Total Qu.</th>
                            <th class="font text-center">Qu.Type</th>
                            <th class="font text-center">Qu.Left</th>
                            <th class="font text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody >
            <?php
              $i=1;
              // print_r($viewowner);
              foreach($fetchProducts as $row)
              {
                 // print_r($row);           
                ?>
                  <tr>
                    <td><?=$i?></td>
                    <?php
                 
                    $myImages=explode(',',$row->image);
                    
                      ?>
                    <td><img style="width:50px; height: 50px"src="<?php echo base_url().'assets/products_image/'.$myImages[0]?>" class="img-reponsive rounded-circle "></td>
                    <td><?=$row->name?></td>
                    <td><?=$row->description?></td>
                    <td><?=$row->category?></td>
                    <?php
                    if($row->status==1)
                    {
                      echo'<td>'."Active".'</td>';
                    }
                    else
                    {
                      echo'<td>'."Deactive".'</td>';
                    }
                     ?>
                    
                    <td><?=$row->price?></td>
                    <td><?=$row->discount?></td>
                    <td><?=$row->totl_quant?></td>
                    <td><?=$row->quant_type?></td>
                     <td><?=$row->qty_left?></td>
                    <!-- <td><a href="<?=base_url('Building/editBuilding/').$row->product_id?>"  class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style building">Edit</a></td> -->
                    <td><a href="<?=base_url('Admin/editProductView/').$row->product_id?>"  class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style building">Edit</a><a href="javascript:void(0)" product_id="<?=$row->product_id?>" class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 deleteproduct">Delete</a></td>
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
                   swal('Product','Deleted','success');
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
    