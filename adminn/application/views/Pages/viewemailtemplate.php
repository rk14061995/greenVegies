<style>
 .table td, .table th {
    padding: .75rem;
    vertical-align: top !important;
     border-top: 0px solid #dee2e6 !important; 
      border-bottom: 1px solid #dee2e6 !important; 
}
</style>

            <h5 class="title font-weight-bold space bg-light p-3">Blog / View Template</h5>
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
                            <th class="font text-center">Template Name</th>
                            <th class="font text-center">Template Message</th>
                            <th class="font text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody >
            <?php
              $i=1;
              // print_r($viewowner);
              foreach($Email_template as $row)
              {
                ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$row->etemp_name?></td>
                    <td><?=$row->etemp_msg?></td>
                    
                    <td><a href="<?=base_url('Template/editEmailTemplateById/').$row->etmp_id?>"  class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style ">Edit</a></td>
                    <td><a href="javascript:void(0)" emtmp_id="<?=$row->etmp_id?>" class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 deletemtemp">Delete</a></td>
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
          $('.deletemtemp').on('click',function(){ 
             var emtmp_id=$(this).attr("emtmp_id");
             // alert(owner_id);
           if(confirm("Are you Sure want to delete?") ==true)
            {       
            // alert(owner_id);         
                $.ajax({
                  url:"<?=base_url('Template/DeleteEmpTemp')?>",
                  type:"post",
                  data:{emtmp_id:emtmp_id},
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
              alert('Your Data Save Now');
                          location.reload();
              
              }
              
          })
        })  
      </script>
    