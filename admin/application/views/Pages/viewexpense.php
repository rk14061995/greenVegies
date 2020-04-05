<style>
 .table td, .table th {
    padding: .75rem;
    vertical-align: top !important;
     border-top: 0px solid #dee2e6 !important; 
      border-bottom: 1px solid #dee2e6 !important; 
}
</style>

            <h5 class="title font-weight-bold space bg-light p-3">Expense / View Expense</h5>
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
                            <th class="font text-center">Description</th>
                            <th class="font text-center">Building Address</th>
                            <th class="font text-center">Vendor Name</th>
                            <th class="font text-center">Expense Amount</th>
                            <th class="font text-center">Expense Date</th>
                            <th class="font text-center">Check No</th>
                            <th class="font text-center">Category</th>
                            <th class="font text-center">Expense Repeat</th>
                            <th class="font text-center">Note</th>
                            <th class="font text-center">Image</th>
                            <th class="font text-center">Action</th>
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
                                
                    <td><a href="<?=base_url('Expense/editExpenseSection/').$row->expense_id?>"  class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style expense">Edit</a></td>
                    <td><a href="javascript:void(0)" expense_id="<?=$row->expense_id?>" class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 expensedelete">Delete</a></td>
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
    
