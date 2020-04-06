
            <h5 class="title font-weight-bold space bg-light p-3">Blog / Add Blog</h5>
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
                <form class="mt-5" action="<?=base_url('Blog/addBlog')?>" method="post"  enctype="multipart/form-data">
                <!-- <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Blog Category :</label>
                        </div>
                        <div class="col-md-9">
                        <select name="cat_id" class="form-control" required>
                      
                    </select>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Blog Name :</label>
                        </div>
                        <div class="col-md-9">
                        <input type="text"  class="form-control" name="blogname" >
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Blog Slug :</label>
                        </div>
                        <div class="col-md-9">
                        <input type="text"  class="form-control" name="slug" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Blog Content :</label>
                        </div>
                        <div class="col-md-9">
                           <textarea rows="9" cols="105" class="w-100 border border-dark" name="blogcontent"></textarea>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-1 col-3">
                        <img src="<?php echo base_url("/assets/images/c.png");?>">
                        </div>
                        <div class="col-md-11 mt-4 col-9">
                        <input class="form-control" type="file" name="files[]" required multiple>
                        </div>   
                    </div>
                    <div class="row mt-4">
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