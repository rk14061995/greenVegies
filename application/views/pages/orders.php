

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
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Order Id</th>
                                    <th>Amount</th>
                                    <th>Delivery Details</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                <?php foreach ($myOrders as $key => $value) : ?>
                                    <?php $cartDetails=unserialize($value->cart_details)?>
                                    <!-- <?php print_r($value)?> -->
                                    <tr>
                                        <td class="thumbnail-img">
                                           <?=$i?>
                                        </td>
                                        <td class="thumbnail-img">
                                            <a href="#">
                                                Order : <?=$value->order_id;?>
                                            </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="#">
                                                 <?=$webDetail->currency_.' '.$cartDetails[0]['order_amount']?>
                                            </a>
                                        </td>
                                        <td class="thumbnail-img">
                                            <a href="#">
                                                <?php $dlvAdd=unserialize($value->deli_add);?>
                                                <p>To: <?=$dlvAdd['fullname']?></p>
                                                <p>Mobile: <?=$dlvAdd['mobile']?></p>
                                                <p>Email: <?=$dlvAdd['email']?></p>
                                                <p>Deliver To: <?=$dlvAdd['address']?></p>
                                                <p>Payment Method: <?=$dlvAdd['paymentMethod']?></p>
                                                
                                            </a>
                                        </td>
                                       
                                        <td class="remove-pr">
                                            <a href="<?=base_url('Cart/removeItem/')?>" class="btn btn-info">
                                               View Order
                                            </a>
                                        </td>
                                    </tr>
                                   <?php $i++;?>
                                <?php endforeach; ?>
                                
                               
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            

         
        </div>
    </div>
    <!-- End Cart -->
