
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Blog</a>
          </li>
          <li class="breadcrumb-item active">View Blog</li>
        </ol>
        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i> Blog</div>
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
                  <th>Blog Name</th>
                  <th>Blog content</th>
                  <th>Image</th>
                   <th>Action</th>
                 
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
                    <td><a href="<?=base_url('Blog/editBlog/').$row->blog_id?>"  class="btn btn-info building">Edit</a></td>
                    <td><a href="javascript:void(0)" blog_id="<?=$row->blog_id?>" class="btn btn-info deleteowner">Delete</a></td>
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
    <!--   <script type="text/javascript">
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
      </script>   -->
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
    
