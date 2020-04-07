<?php
    if($this->session->userdata('logged_user')){
       $session=unserialize($this->session->logged_user);
    }else{
        redirect('Home');
    }

?>

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cofirm Your Order.</h2>
                    <!-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('Shop')?>">Shop</a></li>
                        <li class="breadcrumb-item active">Order Placed</li>
                    </ul> -->
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
                                        <!-- <th>Remove</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $totalPrice=0;?>
                                    <!-- <?php print_r($arrayItems)?> -->
                                    <?php foreach ($arrayItems as $items) : ?>

                                        <tr>
                                            <td class="thumbnail-img">
                                                <a href="#">
                                                    <img class="img-fluid rounded-circle" src="<?=base_url('assets/products_image/').$items['options']['image'];?>" alt="" />
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
                                            <td class="quantity-box"><input type="number" size="4" value="<?=$items['qty']?>" min="0" step="1" name="<?=$items['rowid']?>" class="c-input-text qty text" readonly>

                                            </td>
                                            <td class="total-pr">
                                                <p><?=$webDetail->currency_?> <?=$to=($items['price']) * ($items['qty']);?></p>
                                            </td>
                                            
                                        </tr>
                                        <?php $totalPrice+=$to;?>
                                    <?php endforeach; ?>
                                    
                                   
                                   
                                </tbody>
                            </table>
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
                <div class="col-12 d-flex shopping-box"><a href="<?=base_url('Cart/orderPlaced')?>" class="ml-auto btn hvr-hover">Confirm</a> </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

  