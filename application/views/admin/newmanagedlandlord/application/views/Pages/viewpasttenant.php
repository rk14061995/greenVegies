<style>
 .table td, .table th {
    padding: .75rem;
    vertical-align: top !important;
     border-top: 0px solid #dee2e6 !important; 
      border-bottom: 1px solid #dee2e6 !important; 
}
</style>
            <h5 class="title font-weight-bold space bg-light p-3">Tenant / Past Tenant</h5>
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
                            <th class="font text-center">Tenant Name</th>
                            <th class="font text-center">Building Address</th>
                            <th class="font text-center">Tenant Address</th>
                            <th class="font text-center">Country</th>
                            <th class="font text-center">State</th>
                            <th class="font text-center">City</th>
                            <th class="font text-center">Zip Code</th>
                            <th class="font text-center">Home Number</th>
                            <th class="font text-center">Work Number</th>
                            <th class="font text-center">Mobile</th>
                            <th class="font text-center">Email</th>
                            <th class="font text-center">Rent Amount</th>
                            <th class="font text-center">Payment Type</th>
                            <th class="font text-center">Deposit Amount</th>
                            <th class="font text-center">Deposit Paid Date</th>
                            <th class="font text-center">Move In Date</th>
                            <th class="font text-center">Lease start date</th>
                            <th class="font text-center">Lease Period</th>
                            <th class="font text-center">Lease Time</th>
                            <th class="font text-center">Rent Due Date</th>
                            <th class="font text-center">Tenant Move Out</th>
                            <th class="font text-center">Note</th>
                            <th class="font text-center">First Home Contact</th>
                            <th class="font text-center">First Mobile Contact</th>
                            <th class="font text-center">Second Home Contact</th>
                            <th class="font text-center">Second Mobile Contact</th>
                            <th class="font text-center">Image</th>
                             <th class="font text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody >
            <?php
              $i=1;          
              foreach($fetch_past_tenantDetails as $row)
              {
                // print_r($row);
                ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$row->fname.' '.$row->lname?></td>
                    <td><?=$row->building_address?></td>
                    <td><?=$row->ten_address?></td>
                     <td><?=$row->country_name?></td>
                        <td><?=$row->state_name?></td>
                    <td><?=$row->city_name?></td>
                   
                    <td><?=$row->pincode?></td>
                    <td><?=$row->home_number?></td>
                    <td><?=$row->work_number?></td>
                    <td><?=$row->mobile?></td>
                    <td><?=$row->email?></td>
                    <td><?=$row->rent_amount?></td>
                    <td><?=$row->payment_type?></td>
                    <td><?=$row->deposit_amount?></td>
                     <td><?=$row->dep_paid_date?></td>
                      <td><?=$row->move_date?></td>
                      <td><?=$row->lease_startdate?></td>
                      <td><?=$row->lease_period?></td>
                      <td><?=$row->lease_period_time?></td>
                      <td><?=$row->rent_due_day?></td>
                      <?php
                      if($row->tenant_moved_out==1)
                      {
                      ?>
                           <td>Yes</td>;
                     <?php
                            }
                     else
                     {
                         
                       ?>
                         <td>No</td>;
                         <?php
                     }
                      
                          
                     
                      ?>
                      <td><?=$row->note?></td>
                       <td><?=$row->first_contact?></td>
                        <td><?=$row->first_phone?></td>
                         <td><?=$row->second_contact?></td>
                          <td><?=$row->second_phone?></td>
                          <?php
                    
                    $myImages=explode(',',$row->tenant_image);
                    
                      ?>
                    <td><img style="width:5em;"src="<?php echo base_url().'assets/tenant_image/'.$myImages[0]?>" class="img-reponsive thumbnail "></td>
                   
                    <td><a href="<?=base_url('Tenant/editPastTenantSection/').$row->tcurrent_id?>"  class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style currtenant">Edit</a></td>
                    <td><a href="javascript:void(0)" pasttenant_id="<?=$row->tcurrent_id?>" class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 deletepasttenant">Delete</a></td>
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
          $('.currtenant').on('click',function(){

              var currtenant_id=$(this).attr("currtenant_id");
             
             $.ajax({
              url:"<?=base_url('Tenant/editCurrentTenantSection')?>",
              type:"post",
              data:{currtenant_id:currtenant_id},

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
          $('.deletepasttenant').on('click',function(){ 
             var pasttenant_id=$(this).attr("pasttenant_id");
             // alert(owner_id);
           if(confirm("Are you Sure want to delete?") ==true)
            {       
            // alert(owner_id);         
                $.ajax({
                  url:"<?=base_url('Tenant/DeletePastData')?>",
                  type:"post",
                  data:{pasttenant_id:pasttenant_id},
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
