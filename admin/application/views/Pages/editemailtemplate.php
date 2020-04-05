
            <h5 class="title font-weight-bold space bg-light p-3">Template / Update Template</h5>
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
                <form class="mt-5"  action="<?=base_url('Template/updateEmailTemp')?>" method="post" >
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Template Name :</label>
                        </div>
                        <?php
                  foreach ($email_tempdata as $row) 
                  {
                    //print_r($row->);
                   ?>  
                        <div class="col-md-9">
                       <input class="form-control "type="text" value="<?=$row->etemp_name?>" name="tname">
                <input class="form-control "type="hidden" value="<?=$row->etmp_id?>"name="etmp_id" >
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" >Template Message :</label>
                        </div>
                        <div class="col-md-9">
                        <textarea class="form-control " type="text"  name="message" rows="10"><?php echo $row->etemp_msg ?></textarea>
                        </div>
                    </div>
                    <?php
              }
                  ?>
              <br>
                                   
                    <div class="row mt-4">
                        <div class="col-md-3">
                           <button type="submit"  class="w-75 rounded-pill border-0 p-2 text-white font-weight-bold butn-style">Update</button>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <p class="bg-light p-3 w-100 text-center mt-3">© Copyright 2020 DigitalForgeco.com. All Rights Reserved</p>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>