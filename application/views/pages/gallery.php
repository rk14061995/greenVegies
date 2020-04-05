
<style type="text/css">
    .img_look{
        max-height: 200px;
        max-width: 300px;   
    }
</style>
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Services</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('Home')?>">Home</a></li>
                        <li class="breadcrumb-item active">Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Gallery  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Our Gallery</h1>
                        <p><?=$webDetail->tag_line?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <?php foreach($categories as $cat): ?>
                                <button data-filter=".<?=$cat->category?>"><?=ucwords($cat->category)?></button>
                            <?php endforeach; ?>
                            <!-- <button data-filter=".fruits">Fruits</button>
							<button data-filter=".podded-vegetables">Podded vegetables</button>
							<button data-filter=".root-and-tuberous">Root and tuberous</button> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                <!-- <?php print_r($crops_);?> -->
                <?php foreach ($gallery_ as $key => $value) : ?>
                    <div class="col-lg-3 col-md-6 special-grid <?=$value->category?>">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    <p class="sale">Sale</p>
                                </div>
                                <img src="<?=base_url().$value->image?>" class="img-fluid img_look" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="<?=base_url('Shop/productDetail/').$value->product_id?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <!-- <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li> -->
                                    </ul>
                                     <?php 
                                        if($this->session->userdata('logged_user')){
                                            ?>
                                                <a class="btn hvr-hover cartt" product="<?=$value->product_id?>" href="javascript:void(0)">Add to Cart</a>
                                            <?php
                                        }else{
                                            ?>
                                                <a class="btn hvr-hover cart log_in"  href="javascript:void(0)">Add to Cart</a>
                                            <?php
                                        } 
                                    ?>
                                    <!-- <a class="cart" href="#">Add to Cart</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
                <!-- <div class="col-lg-3 col-md-6 special-grid fruits">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="images/gallery-img-02.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>                        
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid bulbs">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="images/gallery-img-03.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid fruits">
                    <div class="products-single fix">
                        <div class="box-img-hover">                            
                            <img src="images/gallery-img-04.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>                                
                            </div>
                        </div>                        
                    </div>
                </div>
				<div class="col-lg-3 col-md-6 special-grid bulbs">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="images/gallery-img-05.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid fruits">
                    <div class="products-single fix">
                        <div class="box-img-hover">                            
                            <img src="images/gallery-img-06.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid podded-vegetables">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="images/gallery-img-07.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid root-and-tuberous">
                    <div class="products-single fix">
                        <div class="box-img-hover">                            
                            <img src="images/gallery-img-08.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>                        
                    </div>
                </div>
				
				<div class="col-lg-3 col-md-6 special-grid root-and-tuberous">
                    <div class="products-single fix">
                        <div class="box-img-hover">                            
                            <img src="images/gallery-img-09.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid podded-vegetables">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="images/gallery-img-10.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid root-and-tuberous">
                    <div class="products-single fix">
                        <div class="box-img-hover">                           
                            <img src="images/gallery-img-11.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid podded-vegetables">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="images/gallery-img-12.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>                        
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- End Gallery  -->
