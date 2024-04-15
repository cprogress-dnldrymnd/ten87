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

    foreach($templates as $template) {
        echo do_shortcode("[custom_template post_id=$template->ID]")
    }
}

add_action('after_header', 'action_after_header');
