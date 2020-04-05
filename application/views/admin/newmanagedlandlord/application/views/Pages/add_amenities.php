            <h5 class="title font-weight-bold space bg-light p-3">Category / Add Amenities</h5>
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
                <form class="mt-5" action="<?=base_url('Building/addAmenities')?>" method="post"  enctype="multipart/form-data">
                    <div class="row">
                        <div class="  col-md-2">
                            <label for="email" class="ml-5" >Amenities :</label>
                        </div>
                        <div class="col-md-10">
                        <input class="form-control "type="text" required name="amenities">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" >Amenities Image :</label>
                        </div>
                        <div class="col-md-9">
                        <input class="form-control" type="file"  name="userfile" required >
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-3">
                           <button type="submit"  class="w-75 rounded-pill border-0 p-2 text-white font-weight-bold butn-style">Add</button>
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