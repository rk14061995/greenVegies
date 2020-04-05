

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
                    <?php 
                        $arrayItems=$this->cart->contents();
                    ?>
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
                                <?php foreach ($arrayItems as $items) : ?>

                                    <tr>
                                        <td class="thumbnail-img">
                                            <a href="#">
                                                <img class="img-fluid" src="<?=base_url().$items['options']['image'];?>" alt="" />
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
                                        <td class="quantity-box"><input type="number" size="4" value="<?=$items['qty']?>" min="0" step="1" class="c-input-text qty text"></td>
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

            

         
        </div>
    </div>
    <!-- End Cart -->
