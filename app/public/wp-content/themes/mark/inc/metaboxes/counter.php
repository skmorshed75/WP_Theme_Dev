<?php

//Class 2.20
function mark_counter_metabox_options( $metaboxes ) {
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
    } else if ( 'counter' != $section_meta['section-type'] ) {
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id'        => 'mark-section-counter',
        'title'     => __( 'Counter Settings', 'mark' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'mark-section-type-counter',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'              => 'counters',
                        'type'            => 'group',
                        'title'           => __( 'Counters', 'mark' ),
                        'button_title'    => __( 'New Counter', 'mark' ),
                        'accordion_title' => __( 'Add New Counter', 'mark' ),
                        'fields'          => array(
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => __( 'Counter Title', 'mark' ),
                            ),
                            array(
                                'id'    => 'number',
                                'type'  => 'text',
                                'title' => __( 'Counter Number', 'mark' ),
                            ),
                        ),

                    ),

                ),
            ),
        ),
    );
    return $metaboxes;
}
add_filter( 'cs_metabox_options', 'mark_counter_metabox_options' );