
            <h5 class="title font-weight-bold space bg-light p-3">Category / Add Category</h5>
           <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?>
                <form class="mt-5" id="category">
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Category :</label>
                        </div>
                        <div class="col-md-9">
                        <input class="form-control "type="text" required name="category">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Category Image:</label>
                        </div>
                        <div class="col-md-9">
                        <input class="" type="file"  name="userfile" required >
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-3">
                        <button type="submit"  class="w-75 rounded-pill border-0 p-2 text-white font-weight-bold butn-style">Add</button>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <p class="bg-light p-3 w-100 text-center mt-3">© Copyright 2020 DoonSoftwares All Rights Reserved</p>
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
$(document).on('submit','#category',function(e){
     e.preventDefault();
     var formData= new FormData($(this)[0]);
     $.ajax({
        url:"<?=base_url('Category/addCategory')?>",
         type:"post",
         catche:false,
         contentType:false,
         processData:false,
         data:formData,
         success:function(response)
        {``
             var obj=JSON.parse(response);
             console.log(obj.status);
             if(obj.status==0)
             {
                swal("Category!", "Try Error", "error")
             }
             if(obj.status==1)
             {
              swal("Category!", "Added", "success")
             }
             if(obj.status==2)
             {
             swal("Category!", "Already Exist", "error")
             }
             window.location.href='<?=base_url("Category/CategorySection")?>';
        }
     });
});
</script>
