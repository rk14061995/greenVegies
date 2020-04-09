<?php
// print_r($productDetails);

?>

            <h5 class="title font-weight-bold space bg-light p-3">Products / Add Products</h5>
           
            <form id="editProducts">
                <div class="row mt-5">
                    <div class="col-md-3">
                        <label for="email">Products Name :</label>
                        <input type="hidden" name="pro_id" value="<?=$productDetails->product_id?>">
                        <input class="form-control "type="text" value="<?=ucwords($productDetails->name)?>" name="name" required  autocomplete="false" placeholder="Enter Product Name">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Decription :</label>
                        <input class="form-control "type="text" name="description" value="<?=ucwords($productDetails->description)?>" autocomplete="false" required placeholder="Enter Product description">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Category:</label>
                         <select  class=" order-alpha input-style form-control " autocomplete="false" required name="veg_category" id="countryId">
                            <option value="">Select Category</option>
                            <?php
                              foreach ($fetch_category as $FC) 
                              {
                              	if($productDetails->veg_category==$FC->id){
                              		echo '<option value="'.$FC->id.'" selected>'.ucwords($FC->category).'</option>';
                              	}else{
                              		echo '<option value="'.$FC->id.'">'.ucwords($FC->category).'</option>';
                              	}
                                
                    
                              }
                              ?>  
                         </select>
                    </div>

                    <div class="col-md-3">
                        <label for="email">Quantity Type:</label>
                       <div class="row d-flex">
                          <select  class=" order-alpha input-style form-control " autocomplete="false" required name="quant_type" >
                          	<?php
                          		
                              echo '<option value="'.$productDetails->quant_type.'" selected>'.ucwords($productDetails->quant_type).'</option>';
                              
                          	?>
                            
                           	<option value="Kg">Kg</option>;
                            <option value="Pieces">Pieces</option>;
                            <option value="Gram">Gram</option>;
                    
                              
                         </select>
                          
                       </div>
                    </div>
                    
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        <label for="email">Total Quantity :</label>
                         <input class="form-control "type="text" required autocomplete="false" name="totl_quant" placeholder="Enter Quantity" value="<?=$productDetails->totl_quant?>">
                    </div>
                    <div class="col-md-3">
                        <label>Price :</label>
                        <input class="form-control "type="text" required autocomplete="false" name="price" placeholder="Enter Price in ₹" value="<?=$productDetails->price?>">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Discount :</label>
                        <input class="form-control "type="text" autocomplete="false" required name="discount" placeholder="Enter Discount Price" value="<?=$productDetails->discount?>">
                    </div>
                    <div class="col-md-1">
                        <label for="email">Status :</label>
                        <input type="checkbox" autocomplete="false" required name="status" placeholder="" checked>
                    </div>
                </div>

        
                <div class="row mt-1">
                    <div class="col-md-1 col-3">
                    <img src="<?=base_url("assets/products_image/").$productDetails->image?>" width="50px">
                    </div>
                    <div class="col-md-11 mt-4 col-9">
                    <input type="file"  name="files[]" required multiple>
                    </div>   
                </div>
                <div class="row mt-5">
                    <div class="col-md-3">
                       <button type="submit"  class="w-75 rounded-pill border-0 p-2 text-white font-weight-bold butn-style">Update</button>
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
$(document).on('submit','#editProducts',function(e){
     e.preventDefault();
     var formData= new FormData($(this)[0]);
     $.ajax({
        url:"<?=base_url('Admin/editProducts')?>",
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
                swal("Ooops!", "Try Error", "error")
             }
             if(obj.status==1)
             {
              swal("Great!", "Added", "success")
             }
             if(obj.status==2)
             {
             swal("Oops!", "Already Exist", "info")
             }
             // window.location.href='<?=base_url("Category/CategorySection")?>';
        }
     });
});
</script>
