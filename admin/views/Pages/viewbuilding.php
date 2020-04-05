
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Building</a>
          </li>
          <li class="breadcrumb-item active">View Building</li>
        </ol>
        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i> Building</div>
          <div class="card-body ">
           <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?> 
              <form id="userdetail">
              
                 <!-- <div class="row">
                    <div class="col-md-2">
                       <label>Search Owner:</label>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control" name="usertext" placeholder="Search..">
                    </div>
                    <div class="col-md-3">
                    <button type="submit"><i class="fa fa-search"></i></button>
                   </div>                     
                   </div> -->                                            
            </form>
            <br>
            <div class="">
             <table class="table table-hover table table-responsive" id="usersss">
              <thead>
                <tr>
                  <th>SNo</th>
                  <th>Building Name</th>
                  <th>Adress</th>
                  <th>Buy</th>
                  <th>Rent</th>
                  <th>Lease</th>
                  <th>Price</th>
                  <th>Owner Name</th>
                  <th>Number of Units</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Registration No</th>
                   <th>Area</th>
                  <th>Zip Code</th>
                  <th>Note</th>
                  <th>Image</th>
                   <th>Action</th>
                  <th>Delete</th>
                 </tr>
              </thead>
              <tbody >
            <?php
              $i=1;
              // print_r($viewowner);
              foreach($fetch_building as $row)
              {
                // print_r($row);           
                ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$row->building_name?></td>
                    <td><?=$row->building_address?></td>
                    <?php
                    if($row->p_buy==1)
                    {
                      echo'<td>'."Yes".'</td>';
                    }
                    else
                    {
                      echo'<td>'."No".'</td>';
                    }
                     ?>
                      <?php
                    if($row->p_rent==1)
                    {
                      echo'<td>'."Yes".'</td>';
                    }
                    else
                    {
                      echo'<td>'."No".'</td>';
                    }
                     ?>
                     <?php
                     
                       if($row->p_lease==1)
                    {
                      echo'<td>'."Yes".'</td>';
                    }
                    else
                    {
                      echo'<td>'."No".'</td>';
                    }
                     ?>
                    <td><?=$row->price?></td>
                    <td><?=$row->fname.' '.$row->lname?></td>
                    <td><?=$row->number_units?></td>
                   <td><?=$row->country_name?></td>
                        <td><?=$row->state_name?></td>
                    <td><?=$row->city_name?></td>
                    <td><?=$row->latitude?></td>
                        <td><?=$row->longitude?></td>
                    <td><?=$row->registration_num?></td>
                     <td><?=$row->area?></td>
                   
                    <td><?=$row->pincode?></td>
<!--                    <script>-->
<!--                         $(".more").toggle(function(){-->
<!--    $(this).text("less..").siblings(".complete").show();    -->
<!--}, function(){-->
<!--    $(this).text("more..").siblings(".complete").hide();    -->
<!--});-->
<!--                    </script>-->
                   
                   <td><?=$row->building_note?></td>
                    
                     <?php
                 
                    $myImages=explode(',',$row->building_image);
                    
                      ?>
                    <td><img style="width:5em;"src="<?php echo base_url().'assets/Building_image/'.$myImages[0]?>" class="img-reponsive thumbnail "></td>
                    <td><a href="<?=base_url('Building/editBuilding/').$row->building_id?>"  class="btn btn-info building">Edit</a></td>
                    <td><a href="javascript:void(0)" building_id="<?=$row->building_id?>" class="btn btn-info deleteowner">Delete</a></td>
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
          $('.building').on('click',function(){

              var building_id=$(this).attr("building_id");
             
             $.ajax({
              url:"<?=base_url('Building/editBuilding')?>",
              type:"post",
              data:{building_id:building_id},

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
          $('.deleteowner').on('click',function(){ 
             var building_id=$(this).attr("building_id");
             // alert(owner_id);
           if(confirm("Are you Sure want to delete?") ==true)
            {       
            // alert(owner_id);         
                $.ajax({
                  url:"<?=base_url('Building/DeleteBuilding')?>",
                  type:"post",
                  data:{building_id:building_id},
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
    
