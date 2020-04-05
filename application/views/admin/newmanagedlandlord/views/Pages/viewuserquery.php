
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Query</a>
          </li>
          <li class="breadcrumb-item active">User Query
</li>
        </ol>
        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i> Query</div>
          <div class="card-body ">
           <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?> 
             
            <br>
            <div class="">
             <table class="table table-hover table table-responsive" id="usersss">
              <thead>
                <tr>
                  <th>SNo</th>
                  <th>User Name</th>
                   <th>User Email</th>
                    <th>Subject</th>
                    <th>Contact No</th>
                    <th>Query</th>
                     <th>Date</th>
                   
                 </tr>
              </thead>
              <tbody >
            <?php
              $i=1;
              // print_r($viewowner);
              foreach($fetch_Query as $row)
              {
                // print_r($row);
                ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$row->user_name?></td>
                    <td><?=$row->user_email?></td>
                    <td><?=$row->user_subject?></td>
                    <td><?=$row->mobile?></td>
                    <td><?=$row->user_message?></td>
                    <td><?=$row->query_date?></td>
                  
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
     
    
