<?php
//Class 2.22
global $mark_section;
$mark_section_meta = get_post_meta( $mark_section['section'], 'mark-section-teams', true );
?>

<!--team section start-->
<section class="space-3 space-adjust" id="team">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <h2 class="title ">
                        <?php echo esc_html( $mark_section_meta['section-heading'] ); ?>
                    </h2>
                    <div class="sub-title">
                        <?php echo esc_html( $mark_section_meta['section-sub-heading'] ); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $mark_team = $mark_section_meta['team'];
        if ( count( $mark_team ) > 0 ):
        ?>
        <div class="row">
            <?php
            foreach ( $mark_team as $mark_tm ):
                $mark_tm_image = wp_get_attachment_image_src( $mark_tm['image'], 'medium' );
                ?>
	            <div class="col-lg-4 col-md-6 col-sm-6 team-member">
	                <div class="thumb">
	                    <img src="<?php echo esc_url( $mark_tm_image[0] ); ?>" alt="">
	                </div>
	                <h3 class="team-title"><?php echo esc_html( $mark_tm['name'] ); ?></h3>
	                <div class="team-designation">
	                    <?php echo esc_html( $mark_tm['title'] ); ?>
	                </div>
	                <div class="team-socail-links">
	                    <?php
                        foreach ( $mark_tm['social_fields'] as $mark_key => $mark_socialfield ):
                            if ( $mark_socialfield != '' ):
                            ?>
                                <a href="<?php echo esc_url( $mark_socialfield ); ?>">
                                <i class="fa fa-<?php echo esc_attr( $mark_key ); ?>"></i></a>
                            <?php
                        endif;
                    endforeach;
                    ?>
                </div>
            </div>
            <?php
            endforeach;
            ?>
        </div>
        <?php
        endif;
        ?>
    </div>
</section>
<!-- team section end-->