<style>
    label{
        font-weight:bold;
    }
</style>


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Tenant</a>
          </li>
          <li class="breadcrumb-item active">Add Past Tenant</li>
        </ol>

        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
            Add Tenant</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
        <form class="form-group" action="<?=base_url('Tenant/add_Past_tenant')?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <label>First Name :</label>
                    <input class="form-control "type="text" name="fname">
                </div>
                <div class="col-md-6">
                    <label>Last Name :</label>
                    <input class="form-control "type="text" name="lname">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Building :</label>
                    <select class="form-control" name="building_id" id="search_building">
                        <option value="0">Select</option>
                        <?php
                          foreach ($fetch_building as $building) 
                          {
                            echo '<option value="'.$building->building_id.'">'.$building->address.'</option>';
                
                          }
                        ?>
                        
                      </select>
                </div>
                <div class="col-md-6">
                    <label>Address :</label>
                    <input class="form-control add"type="text" value="" name="address">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>State :</label>
                    <input class="form-control state"type="text" value=""name="state">
                </div>
                <div class="col-md-4">
                    <label>City :</label>
                    <input class="form-control city"type="text" value=""name="city">
                </div>
                <div class="col-md-4">
                    <label>Zip Code :</label>
                    <input class="form-control zpcode" value="" type="text" name="zipcode">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Home Contact :</label>
                    <input class="form-control "type="text" name="home_number">
                </div>
                <div class="col-md-4">
                    <label>Work Phone :</label>
                    <input class="form-control "type="text" name="work_number">
                </div>
                <div class="col-md-4">
                    <label>Mobile :</label>
                    <input class="form-control "type="text" name="mobile">
                </div>
            </div>
             <div class="row">
                 <div class="col-md-4">
                     <label>Email :</label>
                     <input class="form-control "type="text" name="email">
                 </div>
                 <div class="col-md-4">
                     <label>Rent Amount :</label>
                     <input class="form-control "type="text" name="rent_amount">
                 </div>
                 <div class="col-md-4">
                     <label>Payment Type :</label>
                     <select selected class="form-control" name="payment_type">
                      <option value="Daily">Daily</option> 
                      <option value="Weekly">Weekly</option>
                      <option value="Bi-Monthly">Bi-Monthly</option>
                      <option value="Monthly">Monthly</option>   
                    </select>
                 </div>
             </div>
            <div class="row">
                <div class="col-md-3">
                    <label>Deposit Amount :</label>
                    <input class="form-control "type="text" name="deposit_amount">
                </div>
                <div class="col-md-3">
                    <label> Deposit Paid Date :</label>
                    <input class="form-control "type="date" name="dep_paid_date">
                </div>
                <div class="col-md-3">
                    <label> Move In Date :</label>
                    <input class="form-control "type="date" name="move_date">
                </div>
                <div class="col-md-3">
                    <label> Lease Start Date :</label>
                    <input class="form-control "type="date" name="lease_startdate">
                </div>
            </div>
              <div class="row">
                  <div class="col-md-3">
                      <label>Lease Period</label>
                      <input class="form-control" placeholder="Lease Period" type="number" name="lease_period">
                  </div>
                  <div class="col-md-3">
                      <label>Lease Time</label>
                      <select selected class="form-control" name="lease_period_time">
                          <option value="Years">Years</option> 
                          <option value="Months">Months</option>
                          <option value="Days">Days</option>
                        </select>
                  </div>
                  <div class="col-md-3">
                      <label> Rent Due Day :</label>
                      <select selected class="form-control" name="rent_due_day">
                          <?php
                            for($i=1; $i<=31; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option> ';
                            }
                          ?>
                        </select>
                  </div>
                  <div class="col-md-3">
                      <label> Tenant Moved Out :</label>
                      <br>
                      <input type="checkbox" name="tenant_moved_out">
                  </div>
              </div>
             <div class="row">
                 <div class="col-md-3">
                     <label>Mobile Contact:</label>
                     <input class="form-control "type="number" placeholder="Second Emergency Contact Phone Number"name="second_phone">
                 </div>
                 <div class="col-md-3">
                     <label> Home Contact :</label>
                     <input class="form-control "type="number" placeholder="First Emergency Contact" name="first_contact">
                 </div>
                 <div class="col-md-3">
                     <label>Mobile Number :</label>
                     <input class="form-control "type="number" placeholder="First Emergency Contact Phone Number"name="first_phone">
                 </div>
                 <div class="col-md-3">
                     <label>Home Contact:</label>
                     <input class="form-control "type="number" placeholder="Second Emergency Contact"name="second_contact">
                 </div>
             </div>
              <div class="row">
                  <div class="col-md-6">
                     <label> Note :</label>
                     <input class="form-control "type="text" name="note">
                 </div>
              </div>
              <br>
              <div class="row">
                  <div class="col-md-2">
                      <img src="<?php echo base_url("/assets/images/c.png");?>" width="50px">
                      
                  </div>
                  <div class="col-md-6">
                      <input  type="file"  name="files[]" required multiple>
                  </div>
              </div>
               <hr>
               <div class="row">
                <div class="col-md-2"><button type="submit" class="btn btn-success">Add</button></div>        
              </div>

            </form>

          </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>
      </div>
      <script>
        $(document).ready(function(){
          $('#search_building').on('change',function(){
            var buildingid=$(this).val();
            $.ajax({
              url:"<?=base_url('Tenant/fetchBuilbyid')?>",
              type:"post",
              data:{buildingid:buildingid},
              success:function(response)
              {
                response=JSON.parse(response);
                $(".add").val(response[0].address);
                $(".city").val(response[0].city);
                $(".state").val(response[0].state);
                 $(".zpcode").val(response[0].pincode);


              }

            })

          })
        })
      </script>
    
