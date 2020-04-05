


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Template</a>
          </li>
          <li class="breadcrumb-item active">Update Template</li>
        </ol>

        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
            Update Template</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form class="form-group" action="<?=base_url('Template/updateEmailTemp')?>" method="post" >
              <div class="row">
                <div class="col-md-2">
                  <label><strong>Template Name</strong> :</label>
                </div>
                <?php
                  foreach ($email_tempdata as $row) 
                  {
                    //print_r($row->);
                   ?>                  
                <div class="col-md-10">
                <input class="form-control "type="text" value="<?=$row->etemp_name?>" name="tname">
                <input class="form-control "type="hidden" value="<?=$row->etmp_id?>"name="etmp_id" >
                </div>
              </div>
              <br>
                <div class="row">
                <div class="col-md-2">
                  <label> <strong>Template Message</strong> :</label>
                </div>
                <div class="col-md-10">
                  <textarea class="form-control " type="text"  name="message" rows="10"><?php echo $row->etemp_msg ?></textarea>
                  
                </div>
              </div>
              <?php
              }
                  ?>
              <br>
               <div class="row">
                <div class="col-md-2"><button type="submit" class="btn btn-success">Update</button></div>        
              </div>

            </form>
          </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>
      </div>
    
