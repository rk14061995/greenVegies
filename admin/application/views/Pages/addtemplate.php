
            <h5 class="title font-weight-bold space bg-light p-3">Template / Add Template</h5>
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
                <form class="mt-5" action="<?=base_url('Template/addtemplateSection')?>" method="post">
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Template Name :</label>
                        </div>
                        <div class="col-md-9">
                        <input class="form-control "type="text" required name="tname">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" >Template Message :</label>
                        </div>
                        <div class="col-md-9">
                           <textarea rows="9" cols="105" class="w-100 border border-dark" required name="message"></textarea>
                        </div>
                    </div>
                
                    <div class="row mt-4">
                        <div class="col-md-3">
                           <button type="submit" class="w-75 rounded-pill border-0 p-2 text-white font-weight-bold butn-style">Add</button>
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