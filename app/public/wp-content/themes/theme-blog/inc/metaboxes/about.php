<?php

//Class 2.15
function mark_about_metabox_options( $metaboxes ) {

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
    } else if ( 'about' != $section_meta['section-type'] ) {
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id'        => 'mark-section-about',
        'title'     => __( 'About Settings', 'mark' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'mark-section-type-about',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'      => 'heading',
                        'type'    => 'text',
                        'title'   => __( 'About Heading', 'mark' ),
                        'default' => __( 'About Us Mark', 'mark' ),
                    ),
                    array(
                        'id'      => 'sub-heading',
                        'type'    => 'text',
                        'title'   => __( 'About Sub-Heading', 'mark' ),
                        'default' => __( 'We are workholic m', 'mark' ),
                    ),
                    array(
                        'id'    => 'description',
                        'type'  => 'textarea',
                        'title' => __( 'About Description', 'mark' ),
                    ),
                    array(
                        'id'    => 'about-bg',
                        'type'  => 'image',
                        'title' => __( 'Background Image', 'mark' ),
                    ),
                    array(
                        'id'      => 'about-button-display',
                        'type'    => 'switcher',
                        'title'   => __( 'About Button Display', 'mark' ),
                        'default' => 1,
                    ),
                    array(
                        'id'         => 'button-one-label',
                        'type'       => 'text',
                        'title'      => __( 'Button One Label', 'mark' ),
                        'default'    => __( 'Read More', 'mark' ),
                        'dependency' => array( 'about-button-display', '==', '1' ),
                    ),
                    array(
                        'id'         => 'button-one-url',
                        'type'       => 'text',
                        'title'      => __( 'Button One URL', 'mark' ),
                        'dependency' => array( 'about-button-display', '==', '1' ),
                        //'dependency' => array( 'button-one-label', '!=', '' ),
                    ),
                ),
            ),
        ),
    );
    return $metaboxes;
}
add_filter( 'cs_metabox_options', 'mark_about_metabox_options' );