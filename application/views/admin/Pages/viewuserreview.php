<style>
 .table td, .table th {
    padding: .75rem;
    vertical-align: top !important;
     border-top: 0px solid #dee2e6 !important; 
      border-bottom: 1px solid #dee2e6 !important; 
}
</style>

            <h5 class="title font-weight-bold space bg-light p-3">Users / User Reviews</h5>
          
            <div class="row mt-5">
                <table class="table table-responsive w-100">
                    <thead>
                        <tr>
                            <th class="font text-center">SNo</th>
                            <th class="font text-center">Product</th>
                            <th class="font text-center">Review</th>
                            <th class="font text-center">User Name</th>
                            <th class="font text-center">User Email</th>
                             <th class="font text-center">Contact</th>
                            <th class="font text-center">Date</th>
                        </tr>
                    </thead>
                    <tbody >
            <?php
              $i=1;
              // print_r($viewowner);
              foreach($fetch_Reviews as $row)
              {
                // print_r($row);
                ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$row->name?></td>
                    <td><?=$row->review?></td>
                    <td><?=$row->posted_on?></td>
                  
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