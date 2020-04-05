


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Category</a>
          </li>
          <li class="breadcrumb-item active">Add Category</li>
        </ol>

        </div>

        <div class="card mb-3">
          <div class="card-header">
          <i class=""></i>
            Add Category</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form class="form-group" action="<?=base_url('Category/addCategory')?>" method="post"  enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-2">
                  <label><strong>Category</strong> :</label>
                </div>
                <div class="col-md-10">
                  <input class="form-control "type="text" required name="category">
                </div>
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
    
