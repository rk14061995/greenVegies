


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Blog</a>
          </li>
          <li class="breadcrumb-item active">Update Blog</li>
        </ol>

        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class=""></i>
            Update Blog</div>
          <div class="card-body">
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
            <form class="form-group" action="<?=base_url('Blog/UpdateBlogDetails')?>" method="post"  enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-2">
                  <label>Blog Category :</label>
                </div>
                 <?php
                foreach ($particular_blog as $pb) 
                {
                  print_r($pb->category_id);
                  die;
                 

                 ?>
                <div class="col-md-10">
                    <select name="cat_id" class="form-control" required>
                        <?php
                        foreach($categories as $cat){
                          print_r($cat->category_id);
                          die;
                            ?>
                            <option value="<?=$cat->category_id?>" <?php echo $cat->category_id==$pb->category_id?'selected':''?>><?=$cat->category_name?></option>
                        <?php    
                        }
                        ?>
                    </select>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-2">
                  <label>Blog Name:</label>
                </div>
               
              
                <div class="col-md-10">
                  <input type="text"  class="form-control" value="<?=$pb->blog_name?>"name="blogname" required>
                   <input type="hidden"  class="form-control" value="<?=$pb->blog_id?>" name="blog_id" >
                
                </div>
               
              </div>
              <br>
               <div class="row">
                <div class="col-md-2">
                  <label>Blog Slug :</label>
                </div>
                <div class="col-md-10">
                    <input type="text"  class="form-control" value="<?=$pb->blog_slug?>"name="slug" required>
                </div>
              </div>
              <br>
                <div class="row">
                <div class="col-md-2">
                  <label>Blog Content :</label>
                </div>
                <div class="col-md-10">
                   <textarea class="form-control" rows="10" cols="10" name="blogcontent"> <?=$pb->blog_content?></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-2" ><img src="<?php echo base_url("/assets/images/c.png");?>"></div>
                <div class="col-md-10"><input class="form-control" type="file" name="files[]" required multiple></div>
              </div>      
              <br>
               <div class="row">
                <div class="col-md-2" >Previous Image
                      
                </div>
                <div class="col-md-10">
                  
                  <input type="hidden" name="image_string" id="image_string" value="<?=$pb->blog_image?>" class="form-control">
                  <ul>
                  <?php
                 
                    $myImages=explode(',',$pb->blog_image);
                    for($i=0; $i<count($myImages);$i++)
                    {
                      ?>
                      <li>
                        <img style="width:5em;"src="<?php echo base_url().'assets/blog_image/'.$myImages[$i]?>" class="img-reponsive thumbnail">
                     
                       <a href="javascript:void(0)" img_id="<?=$i?>"  img_String="<?=$pb->blog_image?>" class="btn btn-info deleteimage">Delete</a>
                     </li>
                      <?php
                    
                    }
                  ?>
                </ul>
                </div> 
              </div>
              <?php
                }
                ?>
               <div class="row">
                <div class="col-md-2"><button type="submit" class="btn btn-success">Update</button></div>        
              </div>

            </form>
          </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>
      </div>
      <script type="text/javascript">
 $(document).ready(function(){
  $('.deleteimage').on('click',function(){
    var element=$(this);
     var deleteimage=$(this).attr('img_id');
     var imgString=$("#image_string").val();
     $.ajax({
      url:"<?=base_url('Blog/deleteParticularImageFromBlog')?>",
      type:"post",
      data:{imgIndex:deleteimage,imgString:imgString},

      success:function(response){
        // console.log(response)
        response=JSON.parse(response);
        if(response.code==1){
          element.parent().remove();
          $('#image_string').val(response.newString);
          // console.log("sdfsdf"+response.newString)
        }
      }
     })


  })

 })
</script>
    
