


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Template</a>
          </li>
          <li class="breadcrumb-item active">Add Template</li>
        </ol>

        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
            Add Template</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form class="form-group" action="<?=base_url('Template/addtemplateSection')?>" method="post" >
              <div class="row">
                <div class="col-md-2">
                  <label><strong>Template Name</strong> :</label>
                </div>
                <div class="col-md-10">
                  <input class="form-control "type="text" required name="tname">
                </div>
              </div>
              <br>
                <div class="row">
                <div class="col-md-2">
                  <label><strong>Template Message</strong> :</label>
                </div>
                <div class="col-md-10">
                  <textarea class="form-control "type="text" required name="message" rows="10"></textarea>
                  <!-- <input class="form-control "type="text" required name="message"> -->
                </div>
              </div>
              <br>
               <div class="row">
                <div class="col-md-2"><button type="submit" class="btn btn-success">Add</button></div>        
              </div>
              <hr>

            </form>
          </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>
      </div>
    
