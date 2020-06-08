<?php

//Class 2.30
function mark_subscription_metabox_options($metaboxes) {
    $section_id = 0;
    if(isset($_REQUEST['post']) || isset($_REQUEST['post_ID'])){
        $section_id = empty($_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    if('section' != get_post_type($section_id)) {
        return $metaboxes;
    }

    $section_meta = get_post_meta($section_id,'mark-section-type',true);

    if(!$section_meta){
        return $metaboxes;
    } else if('subscription' != $section_meta['section-type']){
        return $metaboxes;
    }

    $metaboxes[] = array(
        'id' => 'mark-section-subscription',
        'title' => __('Subscription Settings','mark'),
        'post_type' => 'section',
        'context' => 'normal',
        'priority' => 'default',
        'sections' => array(
            array(
                'name' => 'mark-section-type-subscription',
                'icon' => 'fa fa-image',
                'fields' => array(
                    array(
                        'id' => 'title',
                        'type' => 'text',
                        'title' => __('Subscription Title','mark'),
                        'default' => __('Subscribe Nowww','mark')
                    ),
                    array(
                        'id' => 'btn-label',
                        'type' => 'text',
                        'title' => __('Button Label','mark'),
                        'default' => __('Subscription x','mark')
                    ),
                    array(
                        'id' => 'btn-url',
                        'type' => 'text',
                        'title' => __('Button URL','mark'),
                    ),
                )
            )
        )
    );
    return $metaboxes;
}
add_filter('cs_metabox_options','mark_subscription_metabox_options');