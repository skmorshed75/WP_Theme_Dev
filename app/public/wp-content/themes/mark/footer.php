<!-- footer start-->
<footer class="footer space-2">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 p-right-80">
                <div class="footer-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-dark.png"
                        srcset="<?php echo get_template_directory_uri(); ?>/assets/img/logo-dark@2x.png 2x" alt="">
                </div>
                <?php                
                if(is_active_sidebar('footer-left')) {
                    dynamic_sidebar('footer-left');
                }
                ?>
                
            </div>
            <div class="col-md-4 col-sm-6 p-right-80">
                <div class="footer-title">
                    <h5>LATEST NEWS</h5>
                </div>
                <div class="latest-post">
                    <div class="media">
                        <a href="#"><img class="img-fluid"
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/a1.jpg" alt="..."></a>
                        <div class="media-body ">
                            <h5><a href="#">Your Last Blog here</a></h5>
                            <p>Lorem ipsum Optio cumque nihil impedit quo minus id quod maxime.</p>
                        </div>
                    </div>
                    <div class="media">
                        <a href="#"><img class="img-fluid"
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/a1.jpg" alt="..."></a>
                        <div class="media-body ">
                            <h5><a href="#">Your Last Blog here</a></h5>
                            <p>Lorem ipsum Optio cumque nihil impedit quo minus id quod maxime.</p>
                        </div>
                    </div>
                    <div class="media">
                        <a href="#"><img class="img-fluid"
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/a1.jpg" alt="..."></a>
                        <div class="media-body ">
                            <h5><a href="#">Your Last Blog here</a></h5>
                            <p>Lorem ipsum Optio cumque nihil impedit quo minus id quod maxime.</p>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-4 col-sm-6">
                <div class="footer-title">
                    <h5>TAG CLOUDS</h5>
                </div>
                <div class="tagcloud">
                    <a href="#">wordpress</a>
                    <a href="#">fun</a>
                    <a href="#">fail</a>
                    <a href="#">love</a>
                    <a href="#">tags</a>
                    <a href="#">unseen</a>
                    <a href="#">article</a>
                    <a href="#">fun</a>
                    <a href="#">fail</a>
                    <a href="#">love</a>
                    <a href="#">tags</a>
                    <a href="#">unseen</a>
                </div>

                <div class="footer-title m-bot-20">
                    <h5>QUICK LINKS</h5>
                </div>
                <ul class="list-unstyled short-links">
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms & Condition</a></li>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Download</a></li>
                    <li><a href="#">Photo Gallery</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; Copyright 2018. <a href="#"> LWHH </a>. All rights reserved.
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- footer end-->


<?php wp_footer();?>
</body>

</html>