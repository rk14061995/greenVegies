<style>
 .table td, .table th {
    padding: .75rem;
    vertical-align: top !important;
     border-top: 0px solid #dee2e6 !important; 
      border-bottom: 1px solid #dee2e6 !important; 
}
</style>

            <h5 class="title font-weight-bold space bg-light p-3">Vendor / View Vendor</h5>
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
                            <th class="font text-center">first Name</th>
                            <th class="font text-center">Last Name</th>
                            <th class="font text-center">Website</th>
                            <th class="font text-center">Address</th>
                            <th class="font text-center">Country</th>
                            <th class="font text-center">State</th>
                            <th class="font text-center">City</th>
                            <th class="font text-center">Zip Code</th>
                            <th class="font text-center">Home Phone</th>
                            <th class="font text-center">Work Phone</th>
                            <th class="font text-center">Mobile</th>
                            <th class="font text-center">Email</th>
                            <th class="font text-center">MISC Report</th>
                            <th class="font text-center">Vendor Insured</th>
                            <th class="font text-center">Note</th>
                            <th class="font text-center">Image</th>
                            <th class="font text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody >
            <?php
              $i=1;
              // print_r($viewowner);
              foreach($Vendor_data as $row)
              {
                //print_r($row);
                ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$row->fname?></td>
                    <td><?=$row->lname?></td>
                    <td><?=$row->website?></td>
                    <td><?=$row->address?></td>
                     <td><?=$row->country_name?></td>
                        <td><?=$row->state_name?></td>
                    <td><?=$row->city_name?></td>
                    <td><?=$row->zipcode?></td>
                    <td><?=$row->hphone?></td>
                    <td><?=$row->wphone?></td>
                    <td><?=$row->mobile?></td>
                     <td><?=$row->email?></td>
                     <?php
                     if($row->miscreport==1)
                     {
                      echo '<td>Yes</td>';
                     }
                     else
                     {
                        echo '<td>No</td>'; 
                     }
                     ?>
                     <?php
                     if($row->vinsured==1)
                     {
                      echo '<td>Yes</td>';
                     }
                     else
                     {
                        echo '<td>No</td>'; 
                     }
                     ?>
                   
                    <td><?=$row->note?></td>
                    <?php
                    
                    $myImages=explode(',',$row->vendor_image);
                    
                      ?>
                    <td><img style="width:5em;"src="<?php echo base_url().'assets/vendor_image/'.$myImages[0]?>" class="img-reponsive thumbnail "></td>
                   
                    <td><a href="<?=base_url('Vendor/editVendorSection/').$row->vendor_id?>"  class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style vendor">Edit</a></td>
                    <td><a href="javascript:void(0)" vendor_id="<?=$row->vendor_id?>" class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 vendordelete">Delete</a></td>
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
          $('.vendor').on('click',function(){

              var vendor_id=$(this).attr("vendor_id");
             
             $.ajax({
              url:"<?=base_url('Vendor/editVendorSection')?>",
              type:"post",
              data:{vendor_id:vendor_id},

              success:function(response)
              {
                console.log(response);

              }
             })
          })
        })  
      </script>  
      <script type="text/javascript">
        $(document).ready(function(){
          $('.vendordelete').on('click',function(){ 
             var vendor_id=$(this).attr("vendor_id");
             // alert(owner_id);
           if(confirm("Are you Sure want to delete?") ==true)
            {       
            // alert(owner_id);         
                $.ajax({
                  url:"<?=base_url('Vendor/DeleteVendorData')?>",
                  type:"post",
                  data:{vendor_id:vendor_id},
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