

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
									<option data-display="Select">Nothing</option>
									<option value="1">Popularity</option>
									<option value="2">High Price → High Price</option>
									<option value="3">Low Price → High Price</option>
									<option value="4">Best Selling</option>
								</select>
                                </div>
                                <p>Showing all <?=count($crops_)?> results</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        <?php foreach ($crops_ as $key => $value) : ?>
                                          
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="sale">Sale</p>
                                                        </div>
                                                        <img src="<?=base_url('assets/products_image/').$value->image?>" class="img-fluid" alt="Image" style="max-width: 400px; max-height: 200px">
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
                                                        </div>
                                                    </div>
                                                    <div class="why-text">
                                                        <h4 class="text-info"><a href="<?=base_url('Shop/productDetail/').$value->id?>"><?=ucwords($value->name)?></a></h4>
                                                        <h5> <?=$webDetail->currency_?> <?=$value->price?> /- <?=$value->quant_type?> </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        <?php endforeach; ?>
                                        
                              
                                       
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    <?php foreach ($crops_ as $key => $value) : ?>
                                       
                                        <div class="list-view-box">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                    <div class="products-single fix">
                                                        <div class="box-img-hover">
                                                            <div class="type-lb">
                                                                <p class="sale">Sale</p>
                                                            </div>
                                                            <img src="<?=base_url('assets/products_image/').$value->image?>" class="img-fluid" alt="Image" style="max-width: 400px; max-height: 200px">
                                                            <div class="mask-icon">
                                                                <ul>
                                                                    <li><a href="<?=base_url('Shop/productDetail/').$value->product_id?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                    <!-- <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li> -->
                                                                </ul>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                    <div class="why-text full-width">
                                                        <h4 class="text-info"> <a href="<?=base_url('Shop/productDetail/').$value->id?>"><?=ucwords($value->name)?></a></h4>
                                                        <h5> <del><?=$webDetail->currency_?> <?=$value->price?></del> <?=$webDetail->currency_?> <?=($value->price)-($value->discount)?></h5>
                                                        <p><?=ucwords($value->description)?></p>

                                                        <?php 
                                                            if($this->session->userdata('logged_user')){
                                                                ?>
                                                                    <a class="btn hvr-hover cartt" product="<?=$value->product_id?>" href="javascript:void(0)">Add to Cart</a>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                    <a class="cart log_in btn hvr-hover "  href="javascript:void(0)">Add to Cart</a>
                                                                <?php
                                                            } 
                                                        ?>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <!-- <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">Fruits & Drinks <small class="text-muted">(100)</small>
								</a>
                                    <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">Fruits 1 <small class="text-muted">(50)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Fruits 2 <small class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Fruits 3 <small class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Fruits 4 <small class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Fruits 5 <small class="text-muted">(20)</small></a>
                                        </div>
                                    </div>
                                </div> -->




                                <?php foreach ($Cat_Crops as $key => $value): ?>
                                
                                
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men2<?=$value['category']?>" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2"> <?=ucwords($value['category'])?> 
								<small class="text-muted">(<?=count($value['items'])?>)</small>
								</a>
                                    <div class="collapse" id="sub-men2<?=$value['category']?>" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <?php foreach($value['items'] as $itmes): ?>
                                                <a href="#" class="list-group-item list-group-item-action"><?= ucwords($itmes['name'])?> <small class="text-muted">(0)</small></a>
                                            <?php endforeach; ?>
                                            <!-- <a href="#" class="list-group-item list-group-item-action">Vegetables 2 <small class="text-muted">(20)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Vegetables 3 <small class="text-muted">(20)</small></a> -->
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <!-- <a href="#" class="list-group-item list-group-item-action"> Grocery  <small class="text-muted">(150) </small></a>
                                <a href="#" class="list-group-item list-group-item-action"> Grocery <small class="text-muted">(11)</small></a>
                                <a href="#" class="list-group-item list-group-item-action"> Grocery <small class="text-muted">(22)</small></a> -->
                            </div>
                        </div>
                        <!-- <div class="filter-price-left">
                            <div class="title-left">
                                <h3>Price</h3>
                            </div>
                            <div class="price-box-slider">
                                <div id="slider-range"></div>
                                <p>
                                    <input type="text" id="amount" readonly style="border:0; color:#fbb714; font-weight:bold;">
                                    <button class="btn hvr-hover" type="submit">Filter</button>
                                </p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
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