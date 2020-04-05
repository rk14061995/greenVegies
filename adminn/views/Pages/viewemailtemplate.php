
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Template</a>
          </li>
          <li class="breadcrumb-item active">View Email Template
</li>
        </ol>
        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i> Email Template</div>
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
                   </div>       -->                                      
            </form>
            <br>
            <div class="">
             <table class="table table-hover table table-responsive" id="usersss">
              <thead>
                <tr>
                  <th>SNo</th>
                  <th>Template Name</th>
                  <th>Template Message</th>
                   <th>Action</th>
                  <!-- <th>Delete</th> -->
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
                    
                    <td><a href="<?=base_url('Template/editEmailTemplateById/').$row->etmp_id?>"  class="btn btn-info ">Edit</a></td>
                    <td><a href="javascript:void(0)" emtmp_id="<?=$row->etmp_id?>" class="btn btn-info deletemtemp">Delete</a></td>
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
    
