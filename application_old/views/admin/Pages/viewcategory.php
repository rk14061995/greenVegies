<style>
 .table td, .table th {
    padding: .75rem;
    vertical-align: top !important;
     border-top: 0px solid #dee2e6 !important; 
      border-bottom: 1px solid #dee2e6 !important; 
}
</style>
            <h5 class="title font-weight-bold space bg-light p-3">Category / View Category</h5>
            <div class="row mt-5">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="font ">SNo</th>
                            <th class="font">Category Name</th>
                            <th class="font">Category Image</th>
                            <th class="font ">Action</th>
                        </tr>
                    </thead>
                    <tbody >
            <?php
              $i=1;
              // print_r($viewowner);
              foreach($fetch_category as $row)
              {
                $myimage=explode(',',$row->image_);
                ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$row->category?></td>
                    
                     <td><img src="<?=base_url().'assets/category_image/'.$myimage[0]?>" width="10em"></td>
                  
                    
                    <td><a href="<?=base_url('Category/editCategory/').$row->id?>"  class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style owner">Edit</a></td>
                    <td><a href="javascript:void(0)" cat_id="<?=$row->id?>" class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 deleteowner">Delete</a></td>
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