<?php
if(count($Expense_data)>0){
  $description=$Expense_data[0]->description;
  $checknumb=$Expense_data[0]->check_no;
  $expense_repeat=$Expense_data[0]->expense_repeat;
//   $expenscat=$Expense_data[0]->category_id;
}else{
  $description="";
  $checknumb="";
  $expense_repeat="";
//   $expenscat="";
}

?>


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Expense</a>
          </li>
          <li class="breadcrumb-item active">Update Expense</li>
        </ol>

        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
            Update Expense</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form class="form-group" action="<?=base_url('Expense/UpdateExpenseDetail')?>" method="post"  enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <label><strong>Description</strong>:</label>
              
                <?php

                foreach ($Expense_data as $od) 
                {
                  // print_r($od);
                  if($od->expense_amount!=""){
                    $expenseAmount=$od->expense_amount;
                  }else{
                    $expenseAmount="";
                  }
                ?>
                
                  <input class="form-control "type="text" value="<?=$description?>"   name="desc">
                   <input class="form-control "type="hidden" value="<?=$od->expense_id?>"   name="expense_id">
                </div>
                <div class="col-md-6">
                  <label><strong>Building</strong> :</label>
                  <select class="form-control" name="building_id"  id="search_building">
                    <option value="0">Select New Building</option>
                    <?php
                      foreach ($fetch_building as $building) 
                      {
                        if($od->building_id==$building->building_id){
                          echo '<option value="'.$building->building_id.'" selected>'.$building->address.'</option>';
                        }else{
                           echo '<option value="'.$building->building_id.'">'.$building->address.'</option>';
                        }
                       
            
                      }
                    ?>
                    
                  </select>
                </div>
              </div>
              <br>
               <div class="row">
                <div class="col-md-4"><label><strong>Payee</strong> :</label>
                  <select class="form-control" name="payeename"  id="payeename">
                    <option value="0">Select</option>
                    <?php
                      foreach ($fetch_vendor as $vendor) 
                      {
                        if($od->building_expense_vendor_id==$vendor->vendor_id){
                          echo '<option value="'.$vendor->vendor_id.'" selected>'.$vendor->fname.'</option>';  
                        }else{
                          echo '<option value="'.$vendor->vendor_id.'">'.$vendor->fname.'</option>';  
                        }
            
                      }
                    ?> 
                    
                  </select>
              </div>
              <div class="col-md-4"><label><strong>Expense Amount</strong> :</label>
                <input class="form-control "type="text"  name="examount" value="<?=$expenseAmount?>">
              </div>
               <div class="col-md-4"><label><strong>Expense Date</strong> :</label>
                <input class="form-control "type="date" value="<?=$od->expense_date?>" name="exdate" >
              </div>
              </div>
              <br>

              <div class="row">
                 <div class="col-md-4"><label><strong>Check No</strong> :</label>
                <input class="form-control "type="number" value="<?=$checknumb?>" name="checkno">
              </div>
                <div class="col-md-4"><label><strong>Category </strong>:</label>
                <select class="form-control" name="catname" required >
                    <option value="0">Select Category </option>
                    <?php
                      foreach ($fetch_category as $category) 
                      {
                          if($od.category_id==$category.category_id)
                          {
                        echo '<option value="'.$category->category_id.'" selected> '.$category->category_name.'</option>';
                          }
                          else
                          {
                               echo '<option value="'.$category->category_id.'">'.$category->category_name.'</option>';
                          }
            
                      }
                    ?>    
                  </select>
                </div>
                 <div class="col-md-4"><label><strong>Expense Repeats</strong> ? :</label>
                <select selected class="form-control" value="<?=$od->expense_repeat?>" name="exrepeat">Select
                  <option selected value="No">No</option>
                  <option value="Yearly">Yearly</option>
                  <option value="Quaterly">Quaterly</option>
                  <option value="Monthly">Monthly</option>
                  <option value="Bimonthly">Bimonthly</option>
                  <option value="Weekly">Weekly</option>
                  <option value="Daily">Daily</option>
                  </select>
                </div>
                
                <!--  <div class="col-md-4"><label><strong>Previous Check No</strong>  :</label>
                <input class="form-control "type="number"  name="checkno">
                </div> -->
              </div>
              <br>
              <div class="row">
                <div class="col-md-2"><label> <strong>Note</strong> :</label></div>
                  <div class="col-md-10"><input class="form-control " value="<?=$od->note?>" type="text" name="note">
                  </div>
                
              </div>
             <br>
              <div class="row">
                <div class="col-md-2" ><img src="<?php echo base_url("/assets/images/c.png");?>"></div>
                <div class="col-md-10"><input type="file" name="files[]"  multiple></div>
              </div>
              <br> 
              <div class="row">
                <div class="col-md-2" ><strong>Previous Image</strong>
                      
                </div>
                <div class="col-md-10">         
                  <input type="hidden" name="image_string" id="image_string" value="<?=$od->expense_image?>" class="form-control">
                  <ul>
                  <?php               
                    $myImages=explode(',',$od->expense_image);
                    for($i=0; $i<count($myImages);$i++)
                    {
                      ?>
                      <li>
                        <img style="width:5em;"src="<?php echo base_url().'assets/expense_image/'.$myImages[$i]?>" class="img-reponsive thumbnail ">
                     
                       <a href="javascript:void(0)" img_id="<?=$i?>"  img_String="<?=$od->expense_image?>" class="btn btn-danger deleteimage">Delete</a>
                     </li>
                      <?php
                    
                    }
                  ?>
                </ul>
                </div> 
              </div> 
                 <?php
                      }
                  ?>    
              <br>
               <div class="row">
                <div class="col-md-2"><button type="submit" class="btn btn-success">Update</button></div>        
              </div>

            </form>
          </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>
      </div>
       <script type="text/javascript">
 $(document).ready(function(){
  $('.deleteimage').on('click',function(){
    var element=$(this);
     var deleteimage=$(this).attr('img_id');
     var imgString=$("#image_string").val();
     $.ajax({
      url:"<?=base_url('Expense/deleteParticularImageFromArrayExepnse')?>",
      type:"post",
      data:{imgIndex:deleteimage,imgString:imgString},

      success:function(response){
        // console.log(response)
        response=JSON.parse(response);
        if(response.code==1){
          element.parent().remove();
          $('#image_string').val(response.newString);
          // console.log("sdfsdf"+response.newString)
        }
      }
     })


  })

 })
</script>
    
