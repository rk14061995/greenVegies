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
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('Shop')?>">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                        <form class="needs-validation" id="DeliveryAdd" novalidate>
                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <label for="lastName">Full Name *</label>
                                    <input type="text" class="form-control" name="fullname" placeholder="" value="<?=$session[0]->name?>" required>
                                    <div class="invalid-feedback"> Valid last name is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username">Mobile *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="mobile" value="<?=$session[0]->phone?>" placeholder="" readonly>
                                    <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address *</label>
                                <input type="email" class="form-control" name="email" value="<?=$session[0]->email?>" placeholder="">
                                <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <input type="text" class="form-control" name="address" value="<?=$session[0]->address?>" placeholder="" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="address2">Address 2 *</label>
                                <input type="text" class="form-control" id="address2" placeholder=""> 
                            </div> -->
                           
                            <div class="title-left">
                                <h3>Payment</h3>
                            </div>
                            <div class="title"> <span>Payment</span> </div>
                            <div class="d-block my-3">
                                <!-- <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                    <label class="custom-control-label" for="credit">Online</label>
                                </div> -->
                                <div class="custom-control custom-radio">
                                    <input id="cod" name="paymentMethod" type="radio" value="c_o_d" class="custom-control-input" checked required>
                                    <label class="custom-control-label" for="cod">Cash On Delivery</label>
                                </div>
                                
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-success" value="Delivery To This Address"> 
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                       
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    <?php $arrayItems=$this->cart->contents(); ?>
                                    <?php $totalPrice=0;?>
                                    <?php foreach ($arrayItems as $items) : ?>
                                        <div class="media mb-2 border-bottom">
                                            <div class="media-body"> <a href="detail.html"><?=ucwords($items['name']);?></a>
                                                <div class="small text-muted">Price: <?=$webDetail->currency_?> <?=$items['price'];?> <span class="mx-2">|</span> Qty: <?=$items['qty']?> <span class="mx-2">|</span> Subtotal: <?=$webDetail->currency_?> <?=$to=($items['price']) * ($items['qty']);?></div>
                                            </div>
                                        </div>
                                        <?php $totalPrice+=$to;?>
                                    <?php endforeach; ?>
                                    <!-- <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                            <div class="small text-muted">Price: $60.00 <span class="mx-2">|</span> Qty: 1 <span class="mx-2">|</span> Subtotal: $60.00</div>
                                        </div>
                                    </div>
                                    <div class="media mb-2">
                                        <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                            <div class="small text-muted">Price: $40.00 <span class="mx-2">|</span> Qty: 1 <span class="mx-2">|</span> Subtotal: $40.00</div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Your order</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold"> <?=$webDetail->currency_?> <?=$totalPrice?> </div>
                                </div>
                                
                                <div class="d-flex">
                                    <h4>Tax</h4>
                                    <div class="ml-auto font-weight-bold"> <?=$webDetail->currency_?> <?= $tax=(0.18 * $totalPrice);  ?> </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> <?=$webDetail->currency_?>  <?=$totalPrice + $tax?>  </div>
                                </div>
                                <hr> </div>
                        </div>
                        <?php
                            if($this->session->userdata('deliveryAddress')){
                              ?>
                                <div class="col-12 d-flex shopping-box" id="placOrde"> <a href="<?=base_url('Cart/orderConfirmation')?>" class="ml-auto btn hvr-hover">Place Order</a> </div>
                              <?php
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
<script type="text/javascript">
    $(document).on('submit','#DeliveryAdd',function(e){
        e.preventDefault();
        var formData= new FormData($(this)[0]);
        $.ajax({
            url:"<?=base_url('Cart/deliveryAddress')?>",
            type:"post",
            cache:false,
            contentType:false,
            processData:false,
            data:formData,
            success:function(res){
                console.log(res);
                res=JSON.parse(res);
                if(res.code==1){
                    swal("Great..!", "Address Add!", "success");
                    $('#placOrde').show();
                }else{
                    swal("OOoops!", "Failed To Add Address", "error");
                }
                // $('#placOrde').show();
            }
        });
    });
</script>
  