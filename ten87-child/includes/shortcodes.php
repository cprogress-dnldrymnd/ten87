<?php

function post_slider($atts)
{
    extract(
        shortcode_atts(
            array(
                'post_type' => '',
            ),
            $atts
        )
    );
    ob_start();

    $args = array(
        'numberposts' => -1,
        'post_type' => $post_type
    );

    $posts = get_posts($args);

?>
    <div class="post-slider-holder">
        <div class="swiper mySwiperPostSlider">
            <div class="swiper-wrapper">
                <?php foreach ($posts as $post) { ?>
                    <?php
                    $args = array(
                        'bg' => get_the_post_thumbnail_url($post->ID, 'full'),
                        'title' => $post->post_title,
                        'post_excerpt' => $post->post_excerpt,
                        'post_id' => $post->ID
                    );
                  
                    get_template_part('template-parts/studio/studio-swiper-slide', 'null', $args);
                    ?>
                <?php } ?>
            </div>
            <?= swiper_navigation() ?>
        </div>
    </div>
<?php
    return ob_get_clean();
}

add_shortcode('post_slider', 'post_slider');



function location_map()
{
?>
    <div class="ten87-map">
        <?= do_shortcode('[wp_simple_locator_map]') ?>
    </div>
<?php
}

add_action('location_map', 'location_map');
