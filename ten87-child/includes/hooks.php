<?php
function action_after_header()
{
    $args = array(
        'numberposts' => -1,
        'post_type'   => 'templates',
        'meta_query' => array(
            array(
                'key'   => 'featured',
                'value' => 'yes',
                'compare' => ''
            )
        )
    );

    $templates = get_posts($args);
    echo 'test';
}

add_action('after_header', 'action_after_header');
