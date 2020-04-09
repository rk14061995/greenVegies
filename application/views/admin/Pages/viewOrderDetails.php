<style>
 .table td, .table th {
    padding: .75rem;
    vertical-align: top !important;
     border-top: 0px solid #dee2e6 !important; 
      border-bottom: 1px solid #dee2e6 !important; 
}
</style>

            <h5 class="title font-weight-bold space bg-light p-3">Order / Order Detail</h5>
            <?php
              if($this->session->flashdata('msg'))
              {
                echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
              }
            ?> 
            <div class="row mt-5">
                <table class="table text-center " width="100%">
                    <thead>
                        <tr>
                            <th class="font text-center">S.No</th>
                            <th class="font text-center">Order Id</th>
                            <th class="font text-center">Cart Details</th>
                             
                            <!-- <th class="font text-center">Status</th> -->
                            <th class="font text-center">Total Amount</th>
                            
                            
                            <th class="font text-center">Payment Status</th>
                            <!-- <th class="font text-center">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                      <?php $i=1?>
                      <?php foreach($fetchorders as $order): ?>
                        <?php
                        $cart=unserialize($order['cart_details']);
                          $j=0;
                        ?>
                        <tr>
                          <td><?=$i?></td>
                          <td><?=$order['order_id']?></td>
                          <td>
                            <table width="100%">
                              <?php foreach($order['product_Detail'] as $item): ?>
                                <tr>
                                  <td><a href="<?=base_url('Shop/productDetail/').$item['product_id']?>"><?=ucwords($item['name'])?></a></td>
                                  <td><?=$cart[0]['quantity'][$j].' '.ucwords($item['quant_type'])?></td>
                                </tr>
                                <?php  $j++?>
                              <?php endforeach; ?>
                            </table>
                          </td>
                          <td><strong> &#8377; </strong><?=$cart[0]['order_amount']?> </td>
                          <td><a href="javascript:void(0)" product_id="" class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 deleteproduct"><?=$order['amount_status']?></a></td>
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
  </div>
</body>
</html>
 

    