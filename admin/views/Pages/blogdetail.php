
    <div class="slide-one-item home-slider owl-carousel">
   
    <?php
    // print_r($fetch_building_data);
    // building_image
    foreach($buildings as $building)
    {
        $imgArray=explode(',',$building->building_image);
        base_url().'assets/Building_image/'.$imgArray[0];
        ?>
            <div class="site-blocks-cover overlay" style="background-image:url(<?=base_url().'assets/Building_image/'.$imgArray[0]?>);" data-aos="fade" data-stellar-background-ratio="0.5">
                <div class="container">
                  <div class="row align-items-center justify-content-center text-center">
                    <div class="col-md-10">
                        <?php
                        $p_buy=$building->p_buy;
                        $p_lease=$building->p_lease;
                        $p_rent=$building->p_rent;
                            if($p_buy==1){
                                // $buy="Buy";
                                echo ' <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">For Sale</span> ';
                            }else{
                                $buy="";
                            }
                            if($p_rent==1){
                                echo ' <span class="d-inline-block bg-info text-white px-3 mb-3 property-offer-type rounded">For Rent</span> ';
                            }else{
                                $rent="";
                            }
                            if($p_lease==1){
                                // $lease="Lease";
                                echo ' <span class="d-inline-block bg-danger text-white px-3 mb-3 property-offer-type rounded">For Lease</span> ';
                            }else{
                                $lease="";
                            }
                        ?>
                      <!--<span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">For Rent</span>-->
                      <h1 class="mb-2"><?=ucfirst($building->address)?></h1>
                      <p class="mb-5"><strong class="h2 text-success font-weight-bold">$<?=$building->price?></strong></p>
                      <p><!-- <a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a> --></p>
                    </div>
                  </div>
                </div>
              </div>  
        <?php
    }
    ?>
    </div>


        <div class="site-section site-section-sm pb-0">
      <div class="container">
        <div class="row">
     <!--     <form class="form-search col-md-12" action="<?=base_url('PropertTrack/get_property')?>" method="post"style="margin-top: -100px;">-->
     <!--       <div class="row  align-items-end">-->
              <!--<div class="col-md-2">-->
              <!--  <label for="list-types">Listing Types</label>-->
              <!--  <div class="select-wrap">-->
              <!--    <span class="icon icon-arrow_drop_down"></span>-->
              <!--    <select name="list-types" id="list-types" class="form-control d-block rounded-0">-->
              <!--      <option value="">Condo</option>-->
              <!--      <option value="">Commercial Building</option>-->
              <!--      <option value="">Land Property</option>-->
              <!--    </select>-->
              <!--  </div>-->
              <!--</div>-->
              <!--<div class="col-md-2">-->
              <!--  <label for="offer-types">Offer Type</label>-->
              <!--  <div class="select-wrap">-->
              <!--    <span class="icon icon-arrow_drop_down"></span>-->
              <!--    <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">-->
              <!--      <option value="">For Sale</option>-->
              <!--      <option value="">For Rent</option>-->
              <!--      <option value="">For Lease</option>-->
              <!--    </select>-->
              <!--  </div>-->
              <!--</div>-->
          <!--    <div class="col-md-3">-->
          <!--<label for="select-city">Select Country</label>-->
          <!--      <span class="icon icon-arrow_drop_down"></span>--->
          <!--        <select name="select-city" id="select-city" class="form-control d-block rounded-0" name="country" id="countryId">-->
          <!--           	<select  class="countries form-control d-block rounded-0 " autocomplete="false" required name="country" id="countryId">-->
          <!--         <option value="">Select Country</option>-->
				
          <!--           // foreach ($fetch_countries as $FC) -->
          <!--            {-->
          <!--              echo '<option value="'.$FC->country_id.'">'.$FC->name.'</option>';-->
            
          <!--            }-->
          <!--            ?>  -->
                   
          <!--        </select>-->
          <!--      </div>-->
          <!-- </div>-->
     <!--         <div class="col-md-3">-->
     <!--           <label for="select-city">Select State</label>-->
     <!--           <div class="select-wrap">-->
     <!--             <span class="icon icon-arrow_drop_down"></span>-->
                  <!--<select name="select-city" id="select-city" class="form-control d-block rounded-0">-->
     <!--               	<select name="state" class="form-control d-block rounded-0 " autocomplete="false"  id="stateId">-->
					<!--	<option value="0" id="stateId">Select State</option>-->
					<!--</select>-->
                  <!--</select>-->
     <!--           </div>-->
     <!--         </div>-->
     <!--         <div class="col-md-3">-->
     <!--           <label for="select-city">Select City</label>-->
     <!--           <div class="select-wrap">-->
     <!--             <span class="icon icon-arrow_drop_down"></span>-->
                  <!--<select name="select-city" id="select-city" class="form-control d-block rounded-0">-->
     <!--              <select name="city" class="cities form-control d-block rounded-0 " autocomplete="false" required id="cityId">-->
					<!--	<option value="0" id="cityId">Select City</option>-->
					<!--</select>-->
                  <!--</select>-->
     <!--           </div>-->
     <!--         </div>-->
     <!--         <div class="col-md-2">-->
     <!--           <input type="submit" id="SearchBuilding" class="btn btn-success text-white btn-block rounded-0" value="Search">-->
     <!--         </div>-->
     <!--       </div>-->
     <!--     </form>-->
        </div>  

        <div class="row">
          <div class="col-md-12">
            <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
              <div class="mr-auto">
                <a href="javascript:void(0)" id="showvertical" class="icon-view view-module active "><span id="showvertical" class="icon-view_module"></span></a>
                <a href="javascript:void(0)" id="showhorizntl" class="icon-view view-list "><span id="showhorizntl" class="icon-view_list"></span></a>
                
              </div>
              <div class="ml-auto d-flex align-items-center">
                <div>
                  <!--<!--<a href="" class="view-list px-3 border-right active">All</a>-->
                  <a href="<?=base_url('PropertTrack/ViewSaleData')?>" class="view-list px-3 border-right">Sale</a>
                  <a href="<?=base_url('PropertTrack/ViewRentData')?>" class="view-list px-3">Rent</a>
                  <a href="<?=base_url('PropertTrack/ViewLeaseData')?>" class="view-list px-3">Lease</a>
                </div>
                <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sort By
                 </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="javascript:void(0)" id="showAsendingprice"><label>Price Ascending</label></a>
    <a class="dropdown-item" href="javascript:void(0)" id="ShowDescendingprice"><strong>Price Descending</strong></a>
    <!--<a class="dropdown-item" href="#">Something else here</a>-->
  </div>
</div>
                <!--<div class="select-wrap">-->
                  <!--<span class="icon icon-arrow_drop_down"></span>-->
                  <!--<select class="form-control form-control-sm d-block rounded-0">-->
                  <!--  <option value="">Sort by</option>-->
                    
                  <!--  <option value="">Price Ascending</option>-->
                  <!--  <option value="">Price Descending</option>-->
                  <!--</select>-->
                <!--</div>-->
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>

    
    
      
      <!--starting of asending price div-->
       <div class="site-section site-section-sm bg-light" id="Ascendingprice">
      <div class="container">
        
       
       <!--  <div class="row">
          <div class="col-md-12 text-center">
            <div class="site-pagination">
              <a href="<?=base_url('PropertTrack')?>" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <span>...</span>
              <a href="#">10</a>
            </div>
          </div>   -->
        </div>
        
      </div>
      <div class="container">
            
        </div>
      <!--end of ascending price-->
      
      <!--starting of descending-->
       <div class="site-section site-section-sm bg-light" id="Descendingprice">
      <div class="container">
        
        
       <!--  <div class="row">
          <div class="col-md-12 text-center">
            <div class="site-pagination">
              <a href="<?=base_url('PropertTrack')?>" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <span>...</span>
              <a href="#">10</a>
            </div>
          </div>   -->
        </div>
        
      </div>
      <!--ending of desending-->
      
        
    
    <div class="site-section site-section-sm bg-light" id="horizontal_struct">
        
        
    </div>
    

    
    <div class="site-section bg-light">
      <div class="container">
      
        <!--<div class="row justify-content-center mb-5">-->
        <!--  <div class="col-md-7 text-center">-->
        <!--    <div class="site-section-title">-->
        <!--      <h2>Recent Blog</h2>-->
        <!--    </div>-->
        <!--    <p>Nature is ever at work building and pulling down, creating and destroying, keeping everything whirling and flowing, allowing no rest but in rhythmical motion, chasing everything in endless song out of one beautiful form into another.-->
        <!--    </p>-->
        <!--  </div>-->
        <!--</div>-->
        <div class="row">
         <?php
        foreach ($fetch_blogs_data as $blogData) 
        {
           //print_r($blogData);die();
        ?>

          <div class="col-md-12 col-lg-12">
            <?php
              $img=$blogData->blog_image;
              $break=explode(',', $img);
           ?>
           <div class="bg-white border p-2 mt-4">
                <a href=" <?=base_url('PropertTrack/ViewParticularBlog/').$blogData->blog_id?>">
                  <img src="<?php echo base_url().'assets/blog_image/'.$break[0]?>"alt="Image"  class="img-fluid" style="height:100%;width:100%;"></a>
                <div class="p-4" style="height:290px">
                  <span class="d-block text-secondary small text-uppercase"><?=$blogData->date?></span>
                  <h2 class="h5 font-weight-bold mb-3"><?=$blogData->blog_name?></h2>
                  <p><?=$blogData->blog_content?></p>
                </div>
                
            </div>
        </div>
        <?php
         }
         ?>

        </div>
      </div>
    </div>
    
    <div class="site-section">
    <div class="container">
       <div class="row justify-content-center">
            
        </div>
      <!--<div class="row mb-5 justify-content-center">-->
      <!--  <div class="col-md-7">-->
      <!--    <div class="site-section-title text-center">-->
      <!--      <h2>Our Owners</h2>-->
      <!--      <hr>-->
      <!--      <p></p>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>-->
      <div class="row">
         <?php
      foreach ($fetch_owners_data as $Owners_Details) 
      {
        $myimages=explode(',', $Owners_Details->owner_image);

       ?>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">
              <!-- <img src="<?=base_url()?>assets_web/images/person_1.jpg" alt="Image" class="img-fluid rounded mb-4"> -->
               <img src="<?php echo base_url().'assets/Owner_image/'.$myimages[0]?>" alt="Image"  width="340px" height="243px" alt="Image" >
              
              <div class="text">
                <h2 class="mb-2 font-weight-light text-black h4"><?=ucfirst($Owners_Details->fname.' '.$Owners_Details->lname)?></h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Owners</span>
                
                <p class="bg-info p-1 text-center text-white"><?=ucfirst($Owners_Details->note)?></p>
                <!-- <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p> -->
              </div>
            </div>
          </div>
          <?php
     }

      ?>
         
    </div>
    
    </div>
    
 
  </div>

  
    
  </body>
</html>
 <script type="text/javascript">
 $(window).load(function() {
       $("#horizontal_struct").css("display", "none");
});
// $(window).load(function() {
//       $("#Ascendingprice").css("display", "none");
// });
       
   
    $(document).on('click','#showhorizntl',function()
    {
        $("#horizontal_struct").show();
        $("#vertical_struc").hide();
        $("#Descendingprice").hide();
         $("#Ascendingprice").hide();
        
        
    });
     $(document).on('click','#showvertical',function()
    {   
         $("#vertical_struc").show();
        $("#horizontal_struct").hide();
         $("#Descendingprice").hide();
         $("#Ascendingprice").hide();
       
        
    });
     </script>  
     <script>
     $(window).load(function(){
       $("#Ascendingprice").css("display", "none");
    });
    $(document).on('click','#showAsendingprice',function()
            {
                 $("#horizontal_struct").hide();
                $("#vertical_struc").hide();
                $("#Descendingprice").hide();
                 $("#Ascendingprice").show();
            });
        
     </script>
      <script>
     $(window).load(function(){
       $("#Descendingprice").css("display", "none");
    });
    $(document).on('click','#ShowDescendingprice',function()
            {
                 $("#Ascendingprice").hide();
                 $("#horizontal_struct").hide();
                $("#vertical_struc").hide();
                 $("#Descendingprice").show();
            });
        
     </script>
      <script>
        $(document).ready(function(){
          $('#countryId').on('change',function(){
            var countryid=$(this).val();
    //  alert(countryid);
            $.ajax({
              url:"<?=base_url('PropertTrack/get_States')?>",
              type:"post",
              data:{countryid:countryid},
              success:function(response)
              {
                //   console.log(response.data);
                  response=JSON.parse(response);
                    // console.log(response);
                  if(response.code==1)
                  {
                    
                    for (let i = 0; i <response.data.length; i++) 
                    {
                        var html;
                        // console.log(response.data[i].name);
                        html+='<option value="'+response.data[i].states_id+'">'+response.data[i].name+'</option>';
                        // html+="<option value="'+response.data[i].id+'">" + response.data[i].name + "</option>";
                       
                        $('#stateId').append(html);
                    }
                }
                else
                  {
                      
                  }
                  
              }
                  
              });
            })
          })
       
      </script>
       <script>
        $(document).ready(function(){
          $('#stateId').on('change',function(){
            var stateId=$(this).val();
            // alert(stateId);
            $.ajax({
              url:"<?=base_url('PropertTrack/get_Cities')?>",
              type:"post",
              data:{stateId:stateId},
              success:function(response)
              {
                //   console.log(response.data);
                  response=JSON.parse(response);
                    // console.log(response);
                  if(response.code==1)
                  {
                    
                   for (var i = 0; i <response.data.length; i++) 
                    {
                        var html;
                        
                        html+='<option value="'+response.data[i].cities_id+'">'+response.data[i].name+'</option>';
                       
                       
                        $('#cityId').append(html);
                    }
                }
                else
                  {
                    //   html+="<option>" + response.data[i].name + "</option>";
                       
                    //     $('#stateId').append(html);
                  }
                  
              }
                  
              });
            })
          })
       
      </script>
       <script>
        $(document).ready(function(){
          $('#SearchBuilding').on('click',function(){
            var countryId=$('#countryId').val();
            var stateId=$('#stateId').val();
             var cityId=$('#cityId').val();
            // alert(countryId);
            //  alert(stateId);
            //  alert(cityId);
         $.ajax({
               url:"<?=base_url('PropertTrack/get_property')?>",
               type:"post",
               data:{countryId:countryId,stateId:stateId,cityId:cityId},
              success:function(response)
            //   {
            //     //   console.log(response.data);
            //       response=JSON.parse(response);
            //         // console.log(response);
            //       if(response.code==1)
            //       {
                    
            //       for (var i = 0; i <response.data.length; i++) 
            //         {
            //             var html;
                        
            //             html+='<option value="'+response.data[i].cities_id+'">'+response.data[i].name+'</option>';
                       
                       
            //             $('#cityId').append(html);
            //         }
            //     }
            //     else
            //       {
            //         //   html+="<option>" + response.data[i].name + "</option>";
                       
            //         //     $('#stateId').append(html);
            //       }
                  
            //   }
                  
            //   });
            })
          })
       
      </script>
     
     
     
     
     