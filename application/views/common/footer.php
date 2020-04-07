<?php
    $webDetail=$this->db->get('website_name_logo')->row();
    // print_r($webDetail);
?>


<!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <?php foreach ($gallery_ as $key => $value) : ?>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="<?=base_url('assets/products_image/').$value->image?>" alt="" style="height: 180px"/>
                        <!-- <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div> -->
                    </div>
                </div>
            <?php endforeach; ?>
           <!--  <div class="item">
                <div class="ins-inner-box">
                    <img src="<?=base_url('assets/')?>images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            -->
        </div>
    </div>
    <!-- End Instagram Feed  -->
    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						
					</div>
				
				</div>
				<hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About <?=$webDetail->website_name?></h4>
                            <p><?=ucwords($webDetail->about_)?></p> 
							 							
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Business Time</h4>
                            <ul class="list-time">
                                <?php

                                $bDetails=explode(',', $webDetail->business_time);
                                ?>
                                <?php foreach ($bDetails as $value) : ?>
                                    <li><p><?= $value;?></p></li>
                                <?php endforeach; ?>
                                <!-- <li>Monday - Friday: 08.00am to 05.00pm</li> <li>Saturday: 10.00am to 08.00pm</li> <li>Sunday: <span>Closed</span></li> -->
                            </ul>
                        </div>
                        <!--  -->
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: <?=ucwords($webDetail->address_)?> </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+91-<?=$webDetail->contact_no?>">+91-<?=$webDetail->contact_no?></a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:<?=$webDetail->email_?>"><?=$webDetail->email_?></a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
      
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->

    <script src="<?=base_url('assets/')?>js/jquery-3.2.1.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/bootstrap-slider.js"></script>
    
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- ALL PLUGINS -->
    <script src="<?=base_url('assets/')?>js/jquery.superslides.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.js"></script>
    
    <script src="<?=base_url('assets/')?>js/bootstrap-select.js"></script>
    <script src="<?=base_url('assets/')?>js/inewsticker.js"></script>
    <script src="<?=base_url('assets/')?>js/bootsnav.js"></script>
    <script src="<?=base_url('assets/')?>js/images-loded.min.js"></script>
    <script src="<?=base_url('assets/')?>js/isotope.min.js"></script>
    <script src="<?=base_url('assets/')?>js/owl.carousel.min.js"></script>
    <script src="<?=base_url('assets/')?>js/baguetteBox.min.js"></script>
    <script src="<?=base_url('assets/')?>js/form-validator.min.js"></script>
    <script src="<?=base_url('assets/')?>js/contact-form-script.js"></script>
    <script src="<?=base_url('assets/')?>js/custom.js"></script>
     <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/esm/popper.js"></script> -->
</body>

</html>