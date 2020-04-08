
            <h5 class="title font-weight-bold space bg-light p-3">Website / Details</h5>
           
            <form id="webdetails">
                <?php
                foreach($webDetails as $WD)
                    {
                        // print_r($WD);
                       
                        ?>
                <div class="row mt-5">
                    <div class="col-md-3">
                        <label for="email">Website Name :</label>
                        <input class="form-control "type="text" name="wname" value="<?=$WD->website_name?>" required  autocomplete="false" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Tag Line :</label>
                        <input class="form-control "type="text" value="<?=$WD->tag_line?>" name="tagline" autocomplete="false" required >
                    </div>
                    <div class="col-md-3">
                        <label for="email">Email:</label>
                          <input class="form-control "type="text" value="<?=$WD->email_?>" name="email" value="" required  autocomplete="false" >
                           
                    </div>

                   
                    
                </div>
                <div class="row mt-1">
                   
                    <div class="col-md-3">
                        <label>Address :</label>
                        <input class="form-control "type="text" value="<?=$WD->address_?>" required autocomplete="false" name="address" >
                    </div>
                    <div class="col-md-3">
                        <label for="email">Contact No :</label>
                        <input class="form-control "type="text" value="<?=$WD->contact_no?>"autocomplete="false" required name="contact" >
                    </div>
                     <div class="col-md-3">
                        <label for="email">About :</label>
                        <textarea class="form-control " name="about" cols="15" rows="4"><?=$WD->about_?></textarea>
                       
                    </div>
                    
                </div>
                 <div class="row mt-1">
                    <div class="col-md-3">
                        <label for="email">Logo :</label><br>
                        <?php
                         $myImages=explode(',',$WD->logo_);?>
                        <img style="width:8em;"src="<?php echo base_url().'assets/images/logo/'.$myImages[0]?>" class="img-reponsive thumbnail">
                         
                    </div>
                    <div class="col-md-3">
                        <label>Business Time :</label>
                        <input class="form-control "type="time" value="<?=$WD->business_time?>" required autocomplete="false" name="btime" >
                    </div>
                    <div class="col-md-3">
                        <label for="email">Currency :</label>
                        <input class="form-control "type="text" value="<?=$WD->currency_?>" autocomplete="false" required name="currency" >
                    </div>
                    
                </div>
                <br>
        
                <div class="row mt-1">
                    <div class="col-md-1 col-3">
                    <img src="<?php echo base_url("/assets/images/c.png");?>" width="50px">
                    </div>
                    <div class="col-md-11 mt-4 col-9">
                    <input type="file"  name="userfile">
                    </div>   
                </div>
                <div class="row mt-5">
                    <div class="col-md-3">
                       <button type="submit"  class="w-75 rounded-pill border-0 p-2 text-white font-weight-bold butn-style">Add</button>
                    </div>
                </div>
                <?php
            }?>
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
$(document).on('submit','#webdetails',function(e){
     e.preventDefault();
     var formData= new FormData($(this)[0]);
     $.ajax({
        url:"<?=base_url('Admin/updatewebdetails')?>",
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
                swal("Web Details!", "Try Again", "error")
             }
             if(obj.status==1)
             {
              swal("Web Details!!", "Updated", "success")
             }
             
             // window.location.href='<?=base_url("Category/CategorySection")?>';
        }
     });
});
</script>
