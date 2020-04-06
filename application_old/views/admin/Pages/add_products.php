
            <h5 class="title font-weight-bold space bg-light p-3">Products / Add Products</h5>
           
            <form id="products">
                <div class="row mt-5">
                    <div class="col-md-3">
                        <label for="email">Products Name :</label>
                        <input class="form-control "type="text" name="name" required  autocomplete="false" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Decription :</label>
                        <input class="form-control "type="text" name="description" autocomplete="false" required placeholder="Example: Florida">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Category:</label>
                         <select  class=" order-alpha input-style form-control " autocomplete="false" required name="veg_category" id="countryId">
                            <option value="">Select Category</option>
                            <?php
                              foreach ($fetch_category as $FC) 
                              {
                                echo '<option value="'.$FC->id.'">'.$FC->category.'</option>';
                    
                              }
                              ?>  
                         </select>
                    </div>

                    <div class="col-md-3">
                        <label for="email">Quantity Type:</label>
                       <div class="row d-flex">
                          <select  class=" order-alpha input-style form-control " autocomplete="false" required name="quant_type" >
                            <option value="">Select Quantity</option>
                           <option value="KG">KG</option>;
                            <option value="Pieces">Pieces</option>;
                            <option value="Gram">Gram</option>;
                    
                              
                         </select>
                          
                       </div>
                    </div>
                    
                </div>
                <div class="row mt-1">
                    <div class="col-md-3">
                        <label for="email">Total Quantity :</label>
                         <input class="form-control "type="text" required autocomplete="false" name="totl_quant" placeholder="10">
                    </div>
                    <div class="col-md-3">
                        <label>Price :</label>
                        <input class="form-control "type="text" required autocomplete="false" name="price" placeholder="$ 240">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Discount :</label>
                        <input class="form-control "type="text" autocomplete="false" required name="discount" placeholder="37.0902">
                    </div>
                    <div class="col-md-1">
                        <label for="email">Status :</label>
                        <input class="form-control "type="checkbox" autocomplete="false" required name="status" placeholder="">
                    </div>
                </div>

        
                <div class="row mt-1">
                    <div class="col-md-1 col-3">
                    <img src="<?php echo base_url("/assets/images/c.png");?>" width="50px">
                    </div>
                    <div class="col-md-11 mt-4 col-9">
                    <input type="file"  name="files[]" required multiple>
                    </div>   
                </div>
                <div class="row mt-5">
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
$(document).on('submit','#products',function(e){
     e.preventDefault();
     var formData= new FormData($(this)[0]);
     $.ajax({
        url:"<?=base_url('Products/add_Products')?>",
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
             // window.location.href='<?=base_url("Category/CategorySection")?>';
        }
     });
});
</script>
