<?php

//Class 2.21
function mark_cta_metabox_options( $metaboxes ) {

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
    } else if ( 'cta' != $section_meta['section-type'] ) {
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id'        => 'mark-section-cta',
        'title'     => __( 'CTA Settings', 'mark' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'mark-section-type-cta',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'    => 'image',
                        'type'  => 'image',
                        'title' => __( 'CTA Image', 'mark' ),
                    ),
                    array(
                        'id'      => 'heading',
                        'type'    => 'text',
                        'title'   => __( 'CTA Heading', 'mark' ),
                        'default' => __( 'Are You Impressed?', 'mark' ),
                    ),
                    array(
                        'id'      => 'sub-heading',
                        'type'    => 'text',
                        'title'   => __( 'CTA Sub-Heading', 'mark' ),
                        'default' => __( 'or want to know more before purchase', 'mark' ),
                    ),
                    array(
                        'id'      => 'button-one-label',
                        'type'    => 'text',
                        'title'   => __( 'Button One Label', 'mark' ),
                        'default' => __( 'Lets Start Now', 'mark' ),
                    ),

                    array(
                        'id'         => 'button-one-url',
                        'type'       => 'text',
                        'title'      => __( 'Button One URL', 'mark' ),
                        'dependency' => array( 'button-one-label', '!=', '' ),
                    ),
                    array(
                        'id'      => 'button-two-label',
                        'type'    => 'text',
                        'title'   => __( 'Button Two Label', 'mark' ),
                        'default' => __( 'Purchase Now', 'mark' ),
                    ),
                    array(
                        'id'         => 'button-two-url',
                        'type'       => 'text',
                        'title'      => __( 'Button Two URL', 'mark' ),
                        'dependency' => array( 'button-two-label', '!=', '' ),

                    ),
                ),
            ),
        ),
    );
    return $metaboxes;
}
add_filter( 'cs_metabox_options', 'mark_cta_metabox_options' );