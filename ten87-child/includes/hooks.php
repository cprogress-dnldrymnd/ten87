<?php
function action_after_header()
{



    $args = array(
        'numberposts' => -1,
        'post_type'   => 'templates',
        'meta_query' => array(
            array(
                'key'   => '_display_location',
                'value' => 'shortcode',
                'compare' => '!='
            )
        )
    );


    $templates = get_posts($args);

    foreach ($templates as $template) {
        $display_location_condition = get__post_meta_by_id($template->ID, 'display_location_condition');

        if ($display_location_condition == '') {
            echo do_shortcode("[custom_template post_id=$template->ID]");
        }
    }
}

add_action('after_header', 'action_after_header');
