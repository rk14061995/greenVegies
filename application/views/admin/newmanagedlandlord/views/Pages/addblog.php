


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Blog</a>
          </li>
          <li class="breadcrumb-item active">Add Blog</li>
        </ol>

        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
            Add Blog</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form class="form-group" action="<?=base_url('Blog/addBlog')?>" method="post"  enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-2">
                  <label>Blog Category :</label>
                </div>
                <div class="col-md-10">
                    <select name="cat_id" class="form-control" required>
                        <?php
                        foreach($categories as $cat){
                            ?>
                            <option value="<?=$cat->category_id?>"><?=$cat->category_name?></option>
                        <?php    
                        }
                        ?>
                    </select>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-2">
                  <label><strong>Blog Name</strong>:</label>
                </div>
                <div class="col-md-10">
                  <input type="text"  class="form-control" name="blogname" >
                
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-2">
                  <label><strong>Blog Slug :</strong></label>
                </div>
                <div class="col-md-10">
                    <input type="text"  class="form-control" name="slug" required>
                </div>
              </div>
              <br>
                <div class="row">
                <div class="col-md-2">
                  <label><strong>Blog Content</strong> :</label>
                </div>
                <div class="col-md-10">
                   <textarea class="form-control" rows="10" cols="10" name="blogcontent"></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-2" ><img src="<?php echo base_url("/assets/images/c.png");?>"></div>
                <div class="col-md-10"><input class="form-control" type="file" name="files[]" required multiple></div>
              </div>      
              <br>
               <div class="row">
                <div class="col-md-2"><button type="submit" class="btn btn-success">Add</button></div>        
              </div>

            </form>
          </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>
      </div>
    
