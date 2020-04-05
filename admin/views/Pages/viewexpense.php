
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Expense</a>
          </li>
          <li class="breadcrumb-item active">View Expense
</li>
        </ol>
        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>Expense</div>
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
                  <th>Description</th>
                  <th>Building Address</th>
                  <th>Vendor Name</th>
                  <th>Expense Amount</th>
                  <th>Expense Date</th>
                  <th>Check No</th>
                  <th>Category</th>
                  <th>Expense Repeat</th>
                  <th>Note</th>
                   <th>Image</th>
                   <th>Action</th>
                 
                 </tr>
              </thead>
              <tbody >
            <?php
              $i=1;
              // print_r($viewowner);
              foreach($fetch_expense as $row)
              {
                //print_r($row);
                ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$row->description?></td>
                    <td><?=$row->address?></td>
                    <td><?=$row->fname.''.$row->lname?></td>
                    <td><?=$row->expense_amount?></td>
                    <td><?=$row->expense_date?></td>
                    <td><?=$row->check_no?></td>
                    <td><?=$row->category_name?></td>
                    <td><?=$row->expense_repeat?></td>
                    <td><?=$row->note?></td>
                    <?php
                    
                    $myImages=explode(',',$row->expense_image);
                    
                      ?>
                    <td><img style="width:5em;"src="<?php echo base_url().'assets/expense_image/'.$myImages[0]?>" class="img-reponsive thumbnail "></td>
                                
                    <td><a href="<?=base_url('Expense/editExpenseSection/').$row->expense_id?>"  class="btn btn-info expense">Edit</a></td>
                    <td><a href="javascript:void(0)" expense_id="<?=$row->expense_id?>" class="btn btn-info expensedelete">Delete</a></td>
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
      <!-- <script type="text/javascript">
        $(document).ready(function(){
          $('.expense').on('click',function(){

              var expense_id=$(this).attr("expense_id");
             
             $.ajax({
              url:"<?=base_url('Expense/editExpenseSection')?>",
              type:"post",
              data:{expense_id:expense_id},

              success:function(response)
              {
                console.log(response);

              }
             })
          })
        })  
      </script>   -->
      <script type="text/javascript">
        $(document).ready(function(){
          $('.expensedelete').on('click',function(){ 
             var expense_id=$(this).attr("expense_id");
             // alert(owner_id);
           if(confirm("Are you Sure want to delete?") ==true)
            {       
            // alert(owner_id);         
                $.ajax({
                  url:"<?=base_url('Expense/DeleteExpenseData')?>",
                  type:"post",
                  data:{expense_id:expense_id},
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
    
