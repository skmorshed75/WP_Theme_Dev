<?php

//Class 2.22
function mark_team_metabox_options( $metaboxes ) {
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
    } else if ( 'team' != $section_meta['section-type'] ) {
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id'        => 'mark-section-teams',
        'title'     => __( 'Team Section', 'mark' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'mark-section-teams',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'      => 'section-heading',
                        'type'    => 'text',
                        'title'   => __( 'Heading', 'mark' ),
                        'default' => __( 'Team', 'mark' ),
                    ),
                    array(
                        'id'    => 'section-sub-heading',
                        'type'  => 'textarea',
                        'title' => __( 'Sub Heading', 'mark' ),
                    ),
                    array(
                        'id'              => 'team',
                        'type'            => 'group',
                        'title'           => __( 'Team', 'mark' ),
                        'button_title'    => __( 'Add Team Members', 'mark' ),
                        'accordion_title' => __( 'Add New Team', 'mark' ),
                        'fields'          => array(
                            array(
                                'id'    => 'name',
                                'type'  => 'text',
                                'title' => __( 'Team Member Name', 'mark' ),
                            ),
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => __( 'Title / Designation', 'mark' ),
                            ),
                            array(
                                'id'    => 'image',
                                'type'  => 'image',
                                'title' => __( 'Add Image', 'mark' ),
                            ),

                            array(
                                'id'     => 'social_fields',
                                'type'   => 'fieldset',
                                'title'  => __( 'Social Profiles', 'mark' ),
                                'fields' => mark_get_social_fields(),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );
    return $metaboxes;
}
add_filter( 'cs_metabox_options', 'mark_team_metabox_options' );