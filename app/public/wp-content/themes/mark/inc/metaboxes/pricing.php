<?php

//Class 2.24
function mark_pricings_metabox_options( $metaboxes ) {
    $section_id = 0;
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    if ( 'section' != get_post_type( $section_id ) ) {
        return $metaboxes;
    }

    $section_meta = get_post_meta( $section_id, 'mark-section-type', true );

    if ( !$section_meta ) {
        return $metaboxes;
    } else if ( 'pricing' != $section_meta['section-type'] ) {
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id'        => 'mark-section-pricings',
        'title'     => __( 'Pricings Section', 'mark' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'mark-section-pricings',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'      => 'heading',
                        'type'    => 'text',
                        'title'   => __( 'Pricing Section Heading', 'mark' ),
                        'default' => __( 'Choose Your Plan huh', 'mark' ),
                    ),
                    array(
                        'id'      => 'sub-heading',
                        'type'    => 'text',
                        'title'   => __( 'Pricing Section Sub Heading', 'mark' ),
                        'default' => __( 'Nam libero tempore cum soluta nobis est eligendi.hh', 'mark' ),
                    ),
                    array(
                        'id'              => 'pricing-plan',
                        'type'            => 'group',
                        'title'           => __( 'Pricing Plan', 'mark' ),
                        'button_title'    => __( 'New Pricing Plan', 'mark' ),
                        'accordion_title' => __( 'Add New Pricing Plan', 'mark' ),
                        'fields'          => array(
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => __( 'Pricing Title', 'mark' ),
                            ),
                            array(
                                'id'    => 'pricing',
                                'type'  => 'text',
                                'title' => __( 'Pricing', 'mark' ),
                            ),
                            array(
                                'id'    => 'tenure',
                                'type'  => 'text',
                                'title' => __( 'Tenure', 'mark' ),
                            ),
                            array(
                                'id'    => 'options',
                                'type'  => 'textarea',
                                'title' => __( 'Pricing Options', 'mark' ),
                            ),
                            array(
                                'id'      => 'button-label',
                                'type'    => 'text',
                                'title'   => __( 'Button Label', 'mark' ),
                                'default' => __( 'Purchase Now**', 'mark' ),
                            ),
                            array(
                                'id'    => 'button-url',
                                'type'  => 'text',
                                'title' => __( 'Button URL', 'mark' ),
                            ),
                            array(
                                'id'    => 'recommended',
                                'type'  => 'switcher',
                                'title' => 'Recommended?',
                            ),
                            array(
                                'id'         => 'recommended-label',
                                'type'       => 'text',
                                'title'      => __( 'Recommended Label', 'mark' ),
                                'default'    => __( 'Recommended', 'mark' ),
                                'dependency' => array( 'recommended', '==', '1' ),

                            ),
                        ),
                    ),
                ),
            ),
        ),
    );
    return $metaboxes;
}
add_filter( 'cs_metabox_options', 'mark_pricings_metabox_options' );
