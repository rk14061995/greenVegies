
            <h5 class="title font-weight-bold space bg-light p-3">Blog / Update Blog</h5>
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
                <form class="mt-5" action="<?=base_url('Blog/UpdateBlogDetails')?>" method="post"  enctype="multipart/form-data">
                
                    
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Blog Name :</label>
                        </div>
                        <?php
                        foreach ($particular_blog as $pb) 
                            {
                            
                            

                            ?>
                        <div class="col-md-9">
                        <input type="text"  class="form-control" value="<?=$pb->blog_name?>"name="blogname" required>
                   <input type="hidden"  class="form-control" value="<?=$pb->blog_id?>" name="blog_id" >
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Blog Slug :</label>
                        </div>
                        <div class="col-md-9">
                        <input type="text"  class="form-control" value="<?=$pb->blog_slug?>"name="slug" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Blog Content :</label>
                        </div>
                        <div class="col-md-9">
                           <textarea rows="9" cols="105" class="w-100 border border-dark"name="blogcontent"> <?=$pb->blog_content?></textarea>
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
                    <div class="row mt-4 ">
                <div class="col-md-2 col-3"><strong></strong>Previous Image
                      
                </div>
                <div class="col-md-10 col-9">
                 
                <input type="hidden" name="image_string" id="image_string" value="<?=$pb->blog_image?>" class="form-control">
                  <ul class="float-left" style="list-style:none">
                  <?php
                 
                 $myImages=explode(',',$pb->blog_image);
                 for($i=0; $i<count($myImages);$i++)
                 {
                   ?>
                    <li>
                    <img style="width:5em;"src="<?php echo base_url().'assets/blog_image/'.$myImages[$i]?>" class="img-reponsive thumbnail ">
                     
                    <a href="javascript:void(0)" img_id="<?=$i?>"  img_String="<?=$pb->blog_image?>" class=" rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 deleteimage">Delete</a>
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