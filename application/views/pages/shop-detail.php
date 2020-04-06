<?php
    // print_r($webDetaill);
?>
    <!-- Start Shop Detail  -->

    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if($this->session->flashdata('msg')){
                            echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
                        }
                    ?>
                </div>
            </div>
            
            <div class="row">

                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">

                            <div class="carousel-item active"> <img class="d-block w-100" src="<?=base_url('assets/products_image/').$Item[0]->image?>" alt="First slide"> </div>
                           <!--  <div class="carousel-item"> <img class="d-block w-100" src="images/big-img-02.jpg" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="images/big-img-03.jpg" alt="Third slide"> </div> -->
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span> 
                    </a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
                        <i class="fa fa-angle-right" aria-hidden="true"></i> 
                        <span class="sr-only">Next</span> 
                    </a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="images/smp-img-01.jpg" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="images/smp-img-02.jpg" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="images/smp-img-03.jpg" alt="" />
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <form action="<?=base_url('Cart/addToCartFromShop')?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?=$Item[0]->product_id?>" name="product_id">
                        <div class="single-product-details">
                            <h2><?=ucwords($Item[0]->name)?></h2>
                            <h5> <del><?=$webDetail->currency_?> <?=$Item[0]->price?></del> <?=$webDetail->currency_?> <?=($Item[0]->price)-($Item[0]->discount)?></h5>
                            <p class="available-stock"><span>Quantity <?=$Item[0]->qty_left.$Item[0]->quant_type?> available / <a href="#"><?=($Item[0]->totl_quant)-($Item[0]->qty_left).$Item[0]->quant_type?> sold </a></span><p>
                            <h4>Short Description:</h4>
                            <p><?=ucfirst($Item[0]->description)?> </p>
                            <ul>
                                <li>
                                    <div class="form-group quantity-box">
                                        <label class="control-label">Quantity</label>
                                        <input class="form-control" value="1" min="0" max="8" name="quantity" type="number">
                                    </div>
                                </li>
                            </ul>

                            <div class="price-box-bar">
                                <div class="cart-and-bay-btn">
                                    <!-- <a class="btn hvr-hover" data-fancybox-close="" href="#">Buy Now</a> -->
                                    <?php 
                                        if($this->session->userdata('logged_user')){
                                            ?>
                                                <input type="submit" value="Add To Cart" class="btn hvr-hover">
                                            <?php
                                        }else{
                                            ?>
                                                <a class="cart log_in btn btn-info" href="javascript:void(0)">Add to Cart</a>
                                            <?php
                                        } 
                                    ?>
                                    
                                   <!--  <a class="btn hvr-hover cartt" data-fancybox-close="" href="javascript:void(0)">Add to cart</a> -->
                                </div>
                            </div>

                            <!-- <div class="add-to-btn">
                                <div class="add-comp">
                                    <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>
                                    <a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt"></i> Add to Compare</a>
                                </div>
                                <div class="share-bar">
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                </div>
                            </div> -->
                        </div>
                    </form>
                    
                </div>
            </div>
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
            <div class="row my-5">
                <div class="col-md-12">
                    <form id="contactForm_">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="message" placeholder="Your Review" rows="4" data-error="Write your message" name="message" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="submit-button text-center">
                                    <button class="btn hvr-hover" id="submit" type="submit">Send Review</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-12">
                    <div class="card card-outline-secondary my-4">
                        <div class="card-header">
                            <h2>Product Reviews</h2>
                        </div>
                        <div class="card-body">
                            <?php foreach ($Reviews as $key => $value): ?>
                               
                                <div class="media mb-3">
                                    <div class="mr-2"> 
                                        <img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">
                                    </div>
                                    <div class="media-body">
                                        <p><?=$value->review?></p>
                                        <small class="text-muted">Posted by Anonymous on <?=$value->posted_on?></small>
                                    </div>
                                </div>
                                <hr>
                            <?php endforeach; ?>
                            
                            <a href="#" class="btn hvr-hover">Leave a Review</a>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                        <p><?=$webDetail->tag_line?></p>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        <?php foreach ($gallery_ as $value) : ?>
                            <div class="item">
                                <div class="products-single fix">
                                    <div class="box-img-hover">
                                        <img src="<?=base_url('assets/products_image/').$value->image?>" class="img-fluid" alt="Image" style="max-width: 400px; height: 200px; max-height: 200px">
                                        <div class="mask-icon">
                                            <ul>
                                                <li><a href="<?=base_url('Shop/productDetail/').$value->id?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                <!-- <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li> -->
                                            </ul>
                                            <a class="cart" href="#">Add to Cart</a>
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

        </div>
    </div>
    <!-- End Cart -->

   