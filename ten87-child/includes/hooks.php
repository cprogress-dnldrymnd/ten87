<?php
function action_after_header()
{
    $args = array(
        'numberposts' => -1,
        'post_type'   => 'templates',
        'meta_query' => array(
            array(
                'key'   => '_display_location',
                'value' => 'after_header',
                'compare' => '='
            )
        )
    );

    $templates = get_posts($args);

    foreach ($templates as $template) {
        $display_location_condition = get__post_meta_by_id($template->ID, 'display_location_condition');

        if ($display_location_condition == '') {
            echo do_shortcode("[custom_template post_id=$template->ID]");
        } else if ($display_location_condition == 'post_type') {
            $display_location_post_type = get__post_meta_by_id($template->ID, 'display_location_post_type');
            if (get_post_type() == $display_location_post_type) {
                echo do_shortcode("[custom_template post_id=$template->ID]");
            }
        } else if ($display_location_condition == 'post_type_archive') {
            $display_location_post_type_achive = get__post_meta_by_id($template->ID, 'display_location_post_type_achive');
            if (is_post_type_archive($display_location_post_type_achive)) {
                echo do_shortcode("[custom_template post_id=$template->ID]");
            }
        }
    }
}

add_action('after_header', 'action_after_header');


function action_before_footer()
{
    $args = array(
        'numberposts' => -1,
        'post_type'   => 'templates',
        'meta_query' => array(
            array(
                'key'   => '_display_location',
                'value' => 'before_footer',
                'compare' => '='
            )
        )
    );

    $templates = get_posts($args);

    foreach ($templates as $template) {
        $display_location_condition = get__post_meta_by_id($template->ID, 'display_location_condition');

        if ($display_location_condition == '') {
            echo do_shortcode("[custom_template post_id=$template->ID]");
        } else if ($display_location_condition == 'post_type') {
            $display_location_post_type = get__post_meta_by_id($template->ID, 'display_location_post_type');
            if (get_post_type() == $display_location_post_type) {
                echo do_shortcode("[custom_template post_id=$template->ID]");
            }
        } else if ($display_location_condition == 'post_type_archive') {
            $display_location_post_type_achive = get__post_meta_by_id($template->ID, 'display_location_post_type_achive');
            if (is_post_type_archive($display_location_post_type_achive)) {
                echo do_shortcode("[custom_template post_id=$template->ID]");
            }
        }
    }
}

add_action('before_footer', 'action_before_footer');


function set_image_alt_to_filename($image, $attachment_id, $size)
{
    // Check if alt attribute is empty
    if (empty($image['alt'])) {
        // Get attachment metadata
        $attachment = get_post_meta($attachment_id, '_wp_attachment_metadata', true);
        if ($attachment && ! empty($attachment['file'])) {
            // Extract filename from the file path
            $image['alt'] = pathinfo($attachment['file'], PATHINFO_FILENAME);
        }
    }
    return $image;
}
add_filter('wp_get_attachment_image_attributes', 'set_image_alt_to_filename', 10, 3);

add_action('pre_get_posts', 'rand_products');

function rand_products($query)
{
    if (! is_admin() && $query->is_main_query()) {
        if (get_post_type() == 'studios') {
            $query->set('orderby', '_menu_order');
            $query->set('order', 'asc');

        }
    }
}
