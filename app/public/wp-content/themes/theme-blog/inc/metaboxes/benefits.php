<?php

//Class 2.17
function mark_benefits_metabox_options( $metaboxes ) {
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
    } else if ( 'benefits' != $section_meta['section-type'] ) {
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id'        => 'mark-section-benefits',
        'title'     => __( 'Benefits Section', 'mark' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'mark-section-type-benefits',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'    => 'image',
                        'type'  => 'image',
                        'title' => __( 'Section Image', 'mark' ),
                    ),
                    array(
                        'id'      => 'heading',
                        'type'    => 'text',
                        'title'   => __( 'Benefits Heading', 'mark' ),
                        'default' => __( 'Benefits', 'mark' ),
                    ),
                    array(
                        'id'    => 'description',
                        'type'  => 'textarea',
                        'title' => __( 'Benefits Description', 'mark' ),

                    ),
                    array(
                        'id'              => 'benefits',
                        'type'            => 'group',
                        'title'           => __( 'Benefits', 'mark' ),
                        'button_title'    => __( 'New Benefit', 'mark' ),
                        'accordion_title' => __( 'Add New Benefit', 'mark' ),
                        'fields'          => array(
                            array(
                                'id'    => 'benefit',
                                'type'  => 'text',
                                'title' => __( 'Benefit', 'mark' ),
                            ),
                            array(
                                'id'      => 'icon',
                                'type'    => 'text',
                                'title'   => __( 'FontAwesome Icon', 'mark' ),
                                'default' => 'check',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );
    return $metaboxes;
}
add_filter( 'cs_metabox_options', 'mark_benefits_metabox_options' );