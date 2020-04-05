<style>
 .table td, .table th {
    padding: .75rem;
    vertical-align: top !important;
     border-top: 0px solid #dee2e6 !important; 
      border-bottom: 1px solid #dee2e6 !important; 
}
</style>
            <h5 class="title font-weight-bold space bg-light p-3">Blog / View Blog</h5>
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
                            <th class="font text-center">Blog Name</th>
                            <th class="font text-center">Blog content</th>
                            <th class="font text-center">Image</th>
                            <th class="font text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody >
            <?php
              $i=1;
              // print_r($fetch_blogs);
              foreach($fetch_blogs as $row)
              {
                // print_r($row);           
                ?>
                <td><?=$i?></td>
                  <td><?=$row->blog_name?></td>
                    <td><?=$row->blog_content?></td>
                    <?php
                    
                    $myImages=explode(',',$row->blog_image);
                    
                      ?>
                    <td><img style="width:5em;"src="<?php echo base_url().'assets/blog_image/'.$myImages[0]?>" class="img-reponsive thumbnail "></td>
                    <?php
                    
                    
                  ?>
                    <td><a href="<?=base_url('Blog/editBlog/').$row->blog_id?>"  class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style building">Edit</a></td>
                    <td><a href="javascript:void(0)" blog_id="<?=$row->blog_id?>" class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 deleteowner">Delete</a></td>
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
          $('.deleteowner').on('click',function(){ 
             var blog_id=$(this).attr("blog_id");
             // alert(owner_id);
           if(confirm("Are you Sure want to delete?") ==true)
            {       
            // alert(owner_id);         
                $.ajax({
                  url:"<?=base_url('Blog/DeleteBlog')?>",
                  type:"post",
                  data:{blog_id:blog_id},
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
    
