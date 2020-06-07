<?php
//Class 2.24
global $mark_section;
$mark_section_meta = get_post_meta( $mark_section['section'], 'mark-section-pricings', true );
$mark_pricing_plans = $mark_section_meta['pricing-plan'];
// echo '<pre>';
// print_r( $mark_pricing_plans );
// echo '</pre>';
?>

<?php
if ( count( $mark_pricing_plans ) > 0 ):
?>
<!-- pricing section start -->
<section class="price-table-section" id="pricing">
    <div class="space-3 parallax price-bg-height" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/parallax.jpg');">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="section-title text-center light-txt">
                        <h2 class="title ">
                            <?php echo esc_html( $mark_section_meta['heading'] ); ?>
                        </h2>
                        <div class="sub-title">
                            <?php echo esc_html( $mark_section_meta['sub-heading'] ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
$mark_recommended = false;
foreach ( $mark_pricing_plans as $mark_pricing_plan ):
    $mark_recommended = isset( $mark_pricing_plan['recommended'] ) ? $mark_pricing_plan['recommended'] : 0;

    ?>
		                <div class="col-lg-4 col-md-6">
		                    <div class="price-list text-center <?php if ( $mark_recommended ) {echo 'featured-price';}
    ;?>">
		                        <?php if ( $mark_recommended ): ;?>
				                        <!--only for featured price-->
				                            <div class="ribbon">
				                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ribbon.png"
				                                    srcset="<?php echo get_template_directory_uri(); ?>/assets/img/ribbon@2x.png 2x" alt="<?php echo esc_html( $mark_pricing_plan['title'] ); ?>"
				                                >
				                            </div>

				                            <div class="recommanded">
				                                <?php echo esc_html( $mark_pricing_plan['recommended-label'] ); ?>
				                            </div>
				                        <?php endif;?>
		                        <!--only for featured price-->

		                        <h2 class="price-title">
		                            <?php echo esc_html( $mark_pricing_plan['title'] ); ?>
		                        </h2>
		                        <div class="price-value">
		                            <sup><?php _e( '$', 'mark' );?></sup>
		                                <?php
    echo esc_html( $mark_pricing_plan['pricing'] );
    ?>
		                            <div class="price-duration">
		                                <?php
    _e( 'Per ', 'mark' );
    echo esc_html( $mark_pricing_plan['tenure'] );
    ?>
		                            </div>
		                        </div>
		                        <ul class="list-unstyled price-info-list">
		                            <?php $mark_plan_options = explode( "\n", $mark_pricing_plan['options'] );?>
		                            <?php foreach ( $mark_plan_options as $mark_plan_option ): ;?>
				                                            <li><?php echo esc_html( $mark_plan_option, 'mark' ); ?></li>
				                                        <?php endforeach;?>

		                        </ul>
		                        <a href="<?php esc_url( $mark_pricing_plan['button-url'] );?>"
		                            class="btn
		                            <?php
    if ( $mark_recommended ):
        echo 'btn-primary-solid';
    else:
        echo 'btn-gray-border';
    endif;?>">
		                            <?php echo esc_html( $mark_pricing_plan['button-label'] ); ?>
		                        </a>
		                    </div>
		                </div>
		                <?php
endforeach;
?>
            </div>
        </div>
    </div>
</section>
<?php
endif;
?>
<!-- pricing section end -->