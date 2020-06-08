<?php

//Class 2.29
function mark_clients_metabox_options( $metaboxes ) {
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
    } else if ( 'clients' != $section_meta['section-type'] ) {
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id'        => 'mark-section-clients',
        'title'     => __( 'Clients Section', 'mark' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'mark-section-clients',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'              => 'clients',
                        'type'            => 'group',
                        'title'           => __( 'Our Clients', 'mark' ),
                        'button_title'    => __( 'Add New Client', 'mark' ),
                        'accordion_title' => __( 'Add New Client', 'mark' ),
                        'fields'          => array(
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => __( 'Client Title', 'mark' ),
                            ),
                            array(
                                'id'    => 'logo',
                                'type'  => 'image',
                                'title' => __( 'Client Logo', 'mark' ),
                            ),
                            array(
                                'id'    => 'url',
                                'type'  => 'text',
                                'title' => __( 'Client URL', 'mark' ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );
    return $metaboxes;
}
add_filter( 'cs_metabox_options', 'mark_clients_metabox_options' );