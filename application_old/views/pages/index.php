<?php
    $webDetail=$this->db->get('website_name_logo')->row();
?>
    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <?php foreach ($banners_ as $value) : ?>
                <li class="text-center">
                    <img src="<?=base_url('assets/')?>banner_image/<?=$value->banner_path?>" alt="">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="m-b-20"><?=$value->title_?></h1>
                                <!-- <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                                <p><a class="btn hvr-hover" href="#">Shop New</a></p> -->
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
            
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <?php foreach ($categories as $key => $value) : ?>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="shop-cat-box">
                            <img class="img-fluid" src="<?=base_url('assets/')?>category_image/<?=$value->image_?>" alt="" />
                            <a class="btn hvr-hover" href="<?=base_url('Shop/').$value->category?>"><?=ucwords($value->category)?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
                
               <!--  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="<?=base_url('assets/')?>images/categories_img_02.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Lorem ipsum dolor</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="<?=base_url('assets/')?>images/categories_img_03.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Lorem ipsum dolor</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- End Categories -->
	
	<div class="box-add-products">
		<div class="container">
			<div class="row">
                 <?php foreach ($banners_ as $value) : ?>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="<?=base_url('assets/')?>banner_image/<?=$value->banner_path?>" alt="" />
					</div>
				</div>
            <?php endforeach; ?>
				<!-- <div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="<?=base_url('assets/')?>images/add-img-02.jpg" alt="" />
					</div>
				</div> -->
			</div>
		</div>
	</div>

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Fruits & Vegetables</h1>
                        <p><?=$webDetail->tag_line?></p>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".top-featured">Top featured</button>
                            <button data-filter=".best-seller">Best seller</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <?php
                if($this->session->flashdata('msg')){
                    echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
                }
            ?>
            <div class="row special-list">
                <!-- <?php print_r($gallery_); ?>  -->
                <?php foreach ($gallery_ as $key => $value) : ?>
                    <div class="col-lg-3 col-md-6 special-grid best-seller">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    <p class="sale">Sale</p>
                                </div>
                                <img src="<?=base_url('assets/products_image/').$value->image?>" class="img-fluid" alt="Image"  style="max-width: 400px; max-height: 200px">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="<?=base_url('Shop/productDetail/').$value->product_id?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        
                                    </ul>
                                    <?php 
                                        if($this->session->userdata('logged_user')){
                                            ?>
                                                <a class="cart cartt" product="<?=$value->product_id?>" href="javascript:void(0)">Add to Cart</a>
                                            <?php
                                        }else{
                                            ?>
                                                <a class="cart log_in" product="<?=$value->product_id?>" href="javascript:void(0)">Add to Cart</a>
                                            <?php
                                        } 
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="why-text">
                                <h4><?=ucwords($value->name)?></h4>
                                <h5> <?=$webDetail->currency_?> <?=$value->price?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
              
            </div>
        </div>
    </div>
    <!-- End Products  -->

    <script type="text/javascript">
        $(document).ready(function(){
            var cartUrl="<?=base_url('Cart/addToCart/')?>";
            $('.cartt').on('click',function(){
                var product_id=$(this).attr('product');
                // alert("Product Id: "+product_id);
                $.ajax({
                    url:cartUrl,
                    type:"post",
                    data:{product_id:product_id},
                    success:function(response){
                        response=JSON.parse(response);
                        if(response.code==1){                            
                         swal("Good job!", "You clicked the button!", "success");
                        }else{
                            swal("Ooops!", "Failed to Add!", "warning");
                        }
                    }
                })
            });
        });
    </script>


