<?php

//Class 2.14
function mark_features_metabox_options( $metaboxes ) {
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
    } else if ( 'features' != $section_meta['section-type'] ) {
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id'        => 'mark-section-features',
        'title'     => __( 'Features Section', 'mark' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'mark-section-features',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'              => 'features',
                        'type'            => 'group',
                        'title'           => __( 'Features', 'mark' ),
                        'button_title'    => __( 'New Feature', 'mark' ),
                        'accordion_title' => __( 'Add New Feature', 'mark' ),
                        'fields'          => array(
                            array(
                                'id'    => 'heading',
                                'type'  => 'text',
                                'title' => __( 'Feature Heading', 'mark' ),
                            ),
                            array(
                                'id'    => 'icon',
                                'type'  => 'image',
                                'title' => __( 'Feature', 'mark' ),
                            ),
                            array(
                                'id'    => 'description',
                                'type'  => 'textarea',
                                'title' => __( 'Feature description', 'mark' ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );
    return $metaboxes;
}
add_filter( 'cs_metabox_options', 'mark_features_metabox_options' );