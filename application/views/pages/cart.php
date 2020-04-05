

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('Shop')?>">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <?php 
                if($this->session->flashdata('msg')){
                    echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
                }
            ?>
            <form action="<?=base_url('Cart/updateCart')?>" method="post" enctype="multipart/form-data">
                <div class="row">

                    <?php 
                        $arrayItems=$this->cart->contents();
                    ?>
                    <div class="col-lg-12">
                        
                        <div class="table-main table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Images</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $totalPrice=0;?>
                                    <!-- <?php print_r($arrayItems)?> -->
                                    <?php foreach ($arrayItems as $items) : ?>

                                        <tr>
                                            <td class="thumbnail-img">
                                                <a href="#">
                                                    <img class="img-fluid rounded-circle" src="<?=base_url().$items['options']['image'];?>" alt="" />
                                                </a>
                                            </td>
                                            <td class="name-pr">
                                                <a href="#">
                                                    <?=ucwords($items['name']);?>
                                                </a>
                                            </td>
                                            <td class="price-pr">
                                                <p><?=$webDetail->currency_?> <?=$items['price'];?></p>
                                            </td>
                                            <td class="quantity-box"><input type="number" size="4" value="<?=$items['qty']?>" min="0" step="1" name="<?=$items['rowid']?>" class="c-input-text qty text">

                                            </td>
                                            <td class="total-pr">
                                                <p><?=$webDetail->currency_?> <?=$to=($items['price']) * ($items['qty']);?></p>
                                            </td>
                                            <td class="remove-pr">
                                                <a href="<?=base_url('Cart/removeItem/').$items['rowid']?>">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $totalPrice+=$to;?>
                                    <?php endforeach; ?>
                                    
                                   
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <div class="col-lg-6 col-sm-6">
                        <!-- <div class="coupon-box">
                            <div class="input-group input-group-sm">
                                <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                                <div class="input-group-append">
                                    <button class="btn btn-theme" type="button">Apply Coupon</button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="update-box">
                            <input value="Update Cart" type="submit">
                        </div>
                    </div>
                </div>
            </form>
            

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> <?=$webDetail->currency_?>  <?=$totalPrice?> </div>
                        </div>
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> <?=$webDetail->currency_?> <?= $tax=(0.18 * $totalPrice);  ?></div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> <?=$webDetail->currency_?>  <?=$totalPrice + $tax?> </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="<?=base_url('Cart/checkOut')?>" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
