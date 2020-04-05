
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Vendor</a>
          </li>
          <li class="breadcrumb-item active">View Vendor
</li>
        </ol>
        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i> Vendor</div>
          <div class="card-body ">
           <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?> 
              <form id="userdetail">
              
                <!--  <div class="row">
                    <div class="col-md-2">
                       <label>Search Owner:</label>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control" name="usertext" placeholder="Search..">
                    </div>
                    <div class="col-md-3">
                    <button type="submit"><i class="fa fa-search"></i></button>
                   </div>                     
                   </div>    -->                                         
            </form>
            <br>
            <div class="">
             <table class="table table-hover table table-responsive" id="usersss">
              <thead>
                <tr>
                  <th>SNo</th>
                  <th>first Name</th>
                  <th>Last Name</th>
                  <th>Website</th>
                  <th>Address</th>
                   <th>Country</th>
                   <th>State</th>
                  <th>City</th>
                  
                  <th>Zip Code</th>
                  <th>Home Phone</th>
                  <th>Work Phone</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>MISC Report</th>
                  <th>Vendor Insured</th>
                  <th>Note</th>
                   <th>Image</th>
                   <th>Action</th>
                 
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
                   
                    <td><a href="<?=base_url('Vendor/editVendorSection/').$row->vendor_id?>"  class="btn btn-info vendor">Edit</a></td>
                    <td><a href="javascript:void(0)" vendor_id="<?=$row->vendor_id?>" class="btn btn-info vendordelete">Delete</a></td>
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
    
