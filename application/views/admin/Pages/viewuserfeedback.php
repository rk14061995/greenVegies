<style>
 .table td, .table th {
    padding: .75rem;
    vertical-align: top !important;
     border-top: 0px solid #dee2e6 !important; 
      border-bottom: 1px solid #dee2e6 !important; 
}
</style>

            <h5 class="title font-weight-bold space bg-light p-3">Users / User feedback</h5>
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <div class="row mt-5">
                <table class="table table-responsive w-100">
                    <thead>
                        <tr>
                            <th class="font text-center">SNo</th>
                            <th class="font text-center">User Name</th>
                            <th class="font text-center">User Email</th>
                            <th class="font text-center">Subject</th>
                            <th class="font text-center">Message</th>
                            <th class="font text-center">Date</th>
                        </tr>
                    </thead>
                    <tbody >
            <?php
              $i=1;
              // print_r($viewowner);
              foreach($fetch_Feedback as $row)
              {
                // print_r($row);
                ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$row->name?></td>
                    <td><?=$row->email?></td>
                    <td><?=$row->subject?></td>
                    <td><?=$row->message?></td>
                    <td><?=$row->added_on?></td>
                  
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