<?php

//Class 2.23
function mark_portfolios_metabox_options( $metaboxes ) {
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
    } else if ( 'portfolio' != $section_meta['section-type'] ) {
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id'        => 'mark-section-portfolios',
        'title'     => __( 'Portfolios Section', 'mark' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'mark-section-portfolios',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'      => 'section-heading',
                        'type'    => 'text',
                        'title'   => __( 'Portfolio Section Heading', 'mark' ),
                        'default' => __( 'Our Portfolio', 'mark' ),
                    ),
                    array(
                        'id'              => 'portfolios',
                        'type'            => 'group',
                        'title'           => __( 'Portfolio', 'mark' ),
                        'button_title'    => __( 'New Portfolio', 'mark' ),
                        'accordion_title' => __( 'Add New Portfolio', 'mark' ),
                        'fields'          => array(
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => __( 'Portfolio Title', 'mark' ),
                            ),
                            array(
                                'id'    => 'filter',
                                'type'  => 'text',
                                'title' => __( 'Filters', 'mark' ),
                                'help'  => __( 'Comma Separated Texts', 'mark' ),
                            ),
                            array(
                                'id'    => 'image',
                                'type'  => 'image',
                                'title' => __( 'Portfolio Image', 'mark' ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );
    return $metaboxes;
}
add_filter( 'cs_metabox_options', 'mark_portfolios_metabox_options' );