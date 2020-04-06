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
                    <h2>Thank You. Your order is Placed.</h2>
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
            <div class="row">
                <div class="col-sm-12 col-lg-12 mb-3">
                    <div class="checkout-address">
                        <div class="alert alert-success">
                            <h3>Your order will be delivered today.</h3>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Cart -->

  