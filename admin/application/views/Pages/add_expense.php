
            <h5 class="title font-weight-bold space bg-light p-3">Expense / Add Expense</h5>
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form action="<?=base_url('Expense/addExpenseDetail')?>" method="post"  enctype="multipart/form-data">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <label for="email">Description:</label>
                        <input class="form-control "type="text" required name="desc">
                    </div>
                    <div class="col-md-6">
                        <label for="email">Building :</label>
                        <select class="form-control" name="building_id" required id="search_building">
                    <option value="0">Select</option>
                    <?php
                      foreach ($fetch_building as $building) 
                      {
                        echo '<option value="'.$building->building_id.'">'.$building->address.'</option>';
            
                      }
                    ?>
                    
                  </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="email">Payee :</label>
                        <select class="form-control" name="payeename" required id="payeename">
                    <option value="0">Select</option>
                    <?php
                      foreach ($fetch_vendor as $vendor) 
                      {
                        echo '<option value="'.$vendor->vendor_id.'">'.$vendor->fname.' '.$vendor->lname.'</option>';
            
                      }
                    ?> 
                    
                  </select>
                    </div>
                    <div class="col-md-4">
                        <label for="email">Expense Amount :</label>
                        <input class="form-control "type="text" required name="examount">
                    </div>
                    <div class="col-md-4">
                        <label for="email">Expense Date :</label>
                        <input class="form-control "type="date" required name="exdate">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <label for="email">Check No :</label>
                        <input class="form-control "type="number" name="checkno">
                    </div>
                    <div class="col-md-4">
                        <label for="email">Category :</label>
                        <select class="form-control" name="catname" required >
                    <option value="0">Select</option>
                    <?php
                      foreach ($fetch_category as $category) 
                      {
                          
                        echo '<option value="'.$category->category_id.'">'.$category->category_name.'</option>';
            
                      }
                    ?> 
                    
                  </select>
                    </div>
                    <div class="col-md-4">
                        <label for="email">Expense Repeats ? :</label>
                        <select selected class="form-control" required name="exrepeat">Select
                  <option selected value="No">No</option>
                  <option value="Yearly">Yearly</option>
                  <option value="Quaterly">Quaterly</option>
                  <option value="Monthly">Monthly</option>
                  <option value="Bimonthly">Bimonthly</option>
                  <option value="Weekly">Weekly</option>
                  <option value="Daily">Daily</option>
                  </select>
                    </div>
                    
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-1 col-3">
                        <label for="email">Note :</label>
                    </div>
                    <div class="col-md-11 col-9">
                    <input class="form-control "type="text" name="note">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-1 col-3">
                    <img src="<?php echo base_url("/assets/images/c.png");?>">
                    </div>
                    <div class="col-md-11 mt-4 col-9">
                    <input  type="file" name="files[]" required multiple>
                    </div>   
                </div>
                <div class="row mt-5">
                    <div class="col-md-3">
                       <button type="submit" class="w-75 rounded-pill border-0 p-2 text-white font-weight-bold butn-style">Add</button>
                    </div>
                </div>
                <div class="row mt-5">
                    <p class="bg-light p-3 w-100 text-center mt-3">© Copyright 2020 DigitalForgeco.com. All Rights Reserved</p>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>