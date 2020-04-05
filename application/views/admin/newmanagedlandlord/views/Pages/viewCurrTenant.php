
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Tenant</a>
          </li>
          <li class="breadcrumb-item active">View Current Tenant</li>
        </ol>
        <div class="card mb-3">
          <div class="card-header">
             Current Tenant</div>
          <div class="card-body">
           <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?> 
            <br>
            <div>
             <table class="table table-hover table table-responsive" id="usersss">
              <thead>
                <tr>
                  <th>SNo</th>
                  <th> Tenant Name</th>
                  <th>Building Address</th>
                  <th>Tenant Address</th>
                   <th>Country</th>
                  <th>State</th>
                   <th>City</th>
                  <th>Zip Code</th>
                  <th>Home Number</th>
                  <th>Work Number</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Rent Amount</th>
                  <th>Payment Type</th>
                  <th>Deposit Amount</th>
                  <th>Deposit Paid Date</th>
                  <th>Move In Date</th>
                  <th>Lease start date</th>
                  <th>Lease Period</th>
                  <th>Lease Time</th>
                  <th>Rent Due Date</th>
                  <th>Tenant Move Out</th>
                  <th>Note</th>
                  <th>First Home Contact</th>
                  <th>First Mobile Contact</th>
                  <th>Second Home Contact</th>
                  <th>Second Mobile Contact</th>
                   <th>Image</th>
                   <th>Action</th>
                   
                 </tr>
              </thead>
              <tbody >
            <?php
              $i=1;          
              foreach($fetch_current_tenantDetails as $row)
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
                      <?php
                      if($row->lease_period_time==1)
                      {?>
                      <td>Years</td>
                      <?php
                      }
                      elseif($row->lease_period_time==2)
                      {?>
                          <td>Months</td>
                     <?php
                      }
                      else{
                          ?>
                          <td>Days</td>
                          <?php
                      }
                      ?>
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
                    <!-- <td><?=$row->tenant_image?></td> -->
                    <td><a href="<?=base_url('Tenant/editCurrentTenantSection/').$row->tcurrent_id?>"  class="btn btn-info currtenant">Edit</a></td>
                    <td><a href="javascript:void(0)" currtenant_id="<?=$row->tcurrent_id?>" class="btn btn-info deletecurrtenant">Delete</a></td>
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
          $('.deletecurrtenant').on('click',function(){ 
             var currtenant_id=$(this).attr("currtenant_id");
             // alert(owner_id);
           if(confirm("Are you Sure want to delete?") ==true)
            {       
            // alert(owner_id);         
                $.ajax({
                  url:"<?=base_url('Tenant/DeleteCurrentData')?>",
                  type:"post",
                  data:{currtenant_id:currtenant_id},
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
