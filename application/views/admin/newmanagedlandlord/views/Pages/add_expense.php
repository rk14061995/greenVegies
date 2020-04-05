


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Expense</a>
          </li>
          <li class="breadcrumb-item active">Add Expense</li>
        </ol>

        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
            Add Expense</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form class="form-group" action="<?=base_url('Expense/addExpenseDetail')?>" method="post"  enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <label><strong>Description</strong>:</label>
                   <input class="form-control "type="text" required name="desc">

                </div>
                 <div class="col-md-6">
                  <label><strong>Building</strong> :</label>
                
              
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
              <br>
              <div class="row">
                <div class="col-md-4"><label><strong>Payee</strong>  :</label>
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
              <div class="col-md-4"><label><strong>Expense Amount</strong> :</label>
                <input class="form-control "type="text" required name="examount">
              </div>
               <div class="col-md-4"><label><strong>Expense Date</strong> :</label>
                <input class="form-control "type="date" required name="exdate">
                </div>
              </div>
              <br>
               <div class="row">
                <div class="col-md-4"><label><strong>Check No </strong>:</label>
                <input class="form-control "type="number" name="checkno">
              </div>
              <div class="col-md-4"><label><strong>Category</strong> :</label>
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
                <div class="col-md-4"><label><strong>Expense Repeats</strong> ? :</label>
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
              <br>
              <div class="row">
                <div class="col-md-2"><label> <strong>Note</strong> :</label></div>
                <div class="col-md-10"><input class="form-control "type="text" name="note"></div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-2" ><img src="<?php echo base_url("/assets/images/c.png");?>"></div>
                <div class="col-md-10"><input  type="file" name="files[]" required multiple></div>
              </div>      
              <br>
               <div class="row">
                <div class="col-md-2"><button type="submit" class="btn btn-success">Add</button></div>        
              </div>

            </form>
          </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>
      </div>
    
