

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact Us</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('Home')?>">Home</a></li>
                        <li class="breadcrumb-item active"> Contact Us </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>GET IN TOUCH</h2>
                        <p><?=$webDetail->tag_line?></p>
                        <form id="contactForm_">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Your Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required data-error="Please enter your Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Your Message" rows="4" data-error="Write your message" name="message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" type="submit">Send Message</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>CONTACT INFO</h2>
                        <p><?=ucwords($webDetail->about_)?></p>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Address:<?=ucwords($webDetail->address_)?></p>
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
    <!-- End Cart -->
    
    <script type="text/javascript">
        $(document).on('submit','#contactForm_',function(e){
            e.preventDefault();
            var formData= new FormData($(this)[0]);
            $.ajax({
                url:"<?=base_url('API/sendFeedBack')?>",
                type:"post",
                cache:false,
                processData:false,
                contentType:false,
                data:formData,
                success:function(res){
                    // console.log(res);
                    res=JSON.parse(res);
                    if(res.code==1){
                        swal("Great..!", "We Will Response You Soon.", "success");
                        $('#contactForm_')[0].reset();
                        // location.reload();
                    }else{
                        swal("Ooops..!", res.msg, "error");
                    }
                }
            });
        });
    </script>
