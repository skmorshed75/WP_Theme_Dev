<?php

//Class 2.16
function mark_services_metabox_options( $metaboxes ) {
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
    } else if ( 'services' != $section_meta['section-type'] ) {
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id'        => 'mark-section-services',
        'title'     => __( 'Services Section', 'mark' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'mark-section-services',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'      => 'section-heading',
                        'type'    => 'text',
                        'title'   => __( 'Feature Heading', 'mark' ),
                        'default' => __( 'Services', 'mark' ),
                    ),
                    array(
                        'id'              => 'services',
                        'type'            => 'group',
                        'title'           => __( 'Services', 'mark' ),
                        'button_title'    => __( 'New Feature', 'mark' ),
                        'accordion_title' => __( 'Add New Feature', 'mark' ),
                        'fields'          => array(
                            array(
                                'id'    => 'icon',
                                'type'  => 'text',
                                'title' => __( 'Type bi Icon Name', 'mark' ),
                            ),
                            array(
                                'id'      => 'sub-heading',
                                'type'    => 'text',
                                'title'   => __( 'Feature Sub-heading', 'mark' ),
                                'default' => __( 'Web Solution', 'mark' ),
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
add_filter( 'cs_metabox_options', 'mark_services_metabox_options' );