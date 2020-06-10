<?php

//Class 2.19
function mark_image_info_metabox_options( $metaboxes ) {

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
    } else if ( 'image_info' != $section_meta['section-type'] ) {
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id'        => 'mark-section-image-info',
        'title'     => __( 'Image Info Settings', 'mark' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'mark-section-type-image-info',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => __( 'Image Info Title', 'mark' ),
                        'default' => __( 'One small step for man, one giant leap for mankind', 'mark' ),
                    ),
                    array(
                        'id'    => 'description',
                        'type'  => 'textarea',
                        'title' => __( 'Image Info Description', 'mark' ),
                    ),
                    array(
                        'id'    => 'image',
                        'type'  => 'image',
                        'title' => __( 'Background Image', 'mark' ),
                    ),
                ),
            ),
        ),
    );
    return $metaboxes;
}
add_filter( 'cs_metabox_options', 'mark_image_info_metabox_options' );