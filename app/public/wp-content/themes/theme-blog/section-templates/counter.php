<?php
//Class 2.20
global $mark_section;
$mark_section_meta = get_post_meta( $mark_section['section'], 'mark-section-counter', true );
$mark_fun_factors = isset( $mark_section_meta['counters'] ) ? $mark_section_meta['counters'] : array();
$mark_columns = array( 1 => 12, 2 => 6, 3 => 4, 4 => 3 );
$mark_column = $mark_columns[count( $mark_fun_factors )];
?>
<!-- fun factor section start -->
<?php
// echo '<pre>';
// print_r($mark_fun_factors);
// echo '</pre>';

if($mark_fun_factors):
?>
    <section  id = "<?php echo get_post_field('post_name',$mark_section['section']); ?>" class="space-3">
        <div class="container">
            <div class="row">
                <?php
                $mark_counter = 0;
                $fun_class = "fun-separator";
                foreach ( $mark_fun_factors as $mark_fun_factor ):
                    $mark_counter++;
                    if ( $mark_counter == count( $mark_fun_factors ) ) {
                        $fun_class = '';
                    }
                    ?>
                    <div class="col-lg-<?php echo $mark_column; ?> col-md-6 col-6">
                        <div class="fun-box text-center <?php echo esc_attr($fun_class); ?>">
                            <div class="value" data-target="<?php echo esc_attr( $mark_fun_factor['number'] ); ?>">0</div>
                            <div class="title">
                                <?php echo esc_html( $mark_fun_factor['title'] ); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>
            </div>
        </div>
    </section>
    <?php
endif;
?>
<!-- fun factor section end -->