<style>
 .table td, .table th {
    padding: .75rem;
    vertical-align: top !important;
     border-top: 0px solid #dee2e6 !important; 
      border-bottom: 1px solid #dee2e6 !important; 
}
</style>

            <h5 class="title font-weight-bold space bg-light p-3">Building / View Building</h5>
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
                            <th class="font text-center">Building Name</th>
                            <th class="font text-center">Adress</th>
                            <th class="font text-center">Buy</th>
                            <th class="font text-center">Rent</th>
                            <th class="font text-center">Lease</th>
                            <th class="font text-center">Price</th>
                            <th class="font text-center">Owner Name</th>
                            <th class="font text-center">Number of Units</th>
                            <th class="font text-center">Country</th>
                            <th class="font text-center">State</th>
                            <th class="font text-center">City</th>
                            <th class="font text-center">Latitude</th>
                            <th class="font text-center">Longitude</th>
                            <th class="font text-center">Registration No</th>
                            <th class="font text-center">Area</th>
                            <th class="font text-center">Zip Code</th>
                            <th class="font text-center">Note</th>
                            <th class="font text-center">Image</th>
                            <th class="font text-center">Action</th>
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
                    <td><a href="<?=base_url('Building/editBuilding/').$row->building_id?>"  class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style building">Edit</a></td>
                    <td><a href="javascript:void(0)" building_id="<?=$row->building_id?>" class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 deleteowner">Delete</a></td>
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
    