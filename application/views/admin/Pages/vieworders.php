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
                <table class="table text-center " width="100%">
                    <thead>
                        <tr>
                            <th class="font text-center">SNo</th>
                            <th class="font text-center">Ordered By</th>
                            <th class="font text-center">Order Details</th>
                             
                            <th class="font text-center">Status</th>
                            <th class="font text-center">Total Amount</th>
                            
                            
                            <th class="font text-center">Payment Status</th>
                            <th class="font text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody >
            <?php
              $i=1;
              
              foreach($fetchorders as $row)
              {
                $deliveryDetails=unserialize($row['deli_add']);
                $cartDet=unserialize($row['cart_details']);
                // print_r($deliveryDetails);
                           
                ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$deliveryDetails['fullname']?></td>
                    <td><a href="<?=base_url('Admin/viewOrderDetails/').$row['order_id']?>">View Order</a>
                      <?php
                        $product_Detail=$row['product_Detail'];
                        // print_r($product_Detail);
                        // foreach ($product_Detail as $item) {

                        // }
                      ?>

                    <td>
                      <select class="form-control">
                        <option>Packed</option>
                      </select>
                      <?=$row['order_status']?></td>
                    <td><strong>&#8377;</strong> <?=$cartDet[0]['order_amount']?></td>
                    
                    <td><a href="javascript:void(0)" product_id="" class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 deleteproduct"><?=$row['amount_status']?></a></td>
                    <td><a href=""  class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style building">Reject</a></td>
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
                   swal('Product!','Deleted','success');
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
    