<?php
//Class 2.27

$_posts = get_posts( array(
    'posts_per_page' => 1,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'status'         => 'publish',
) );
// echo '<pre>';
// print_r( $_posts );
// echo '</pre>';
?>

<?php if ( count( $_posts ) > 0 ): 
    $mark_thumbnail = get_the_post_thumbnail_url($_posts[0],'mark_landscape_one');
    ?>
<!--blog section start-->
<section id = "<?php echo get_post_field('post_name',$mark_section['section']); ?>" class="blog-block">
    <!--<div class="">-->
    <div class="row">
        <div class="col-md-6 align-self-center">

            <div class="img-block-txt">
                <div class="section-title">
                    <h2 class="title "><?php _e( 'Blog', 'mark' );?></h2>
                </div>
                <h2 class="mb-1"><a href="<?php echo get_the_permalink( $_posts[0] ); ?>"><?php echo esc_html( $_posts[0]->post_title ); ?></a></h2>
                <div class="meta mb-4">
                    <a href="<?php echo get_the_permalink( $_posts[0] ); ?>" class="date"><?php echo get_the_date( '', $_posts[0] ); ?></a>
                    By
                    <a href="#"> <?php echo get_the_author_meta( 'display_name', $_posts[0]->post_author ); ?></a>
                </div>
                <p><?php echo apply_filters( 'the_content', $_posts[0]->post_excerpt ); ?></p>
                <a href="<?php echo get_the_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn-link"><?php _e( 'View All Blog Post', 'mark' )?></a>
            </div>
        </div>
        <div class="col-md-6 base-gradient blog-bg-height" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/img/b-img.jpg') center center / cover no-repeat; ">
            <img src="<?php if($mark_thumbnail) echo esc_url($mark_thumbnail); ?>" alt=""/>
        </div>
    </div>
    <!--</div>-->
</section>
<!--blog section end-->
<?php endif;?>