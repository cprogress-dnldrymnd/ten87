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
        <div class="mySwiperPostSlider">
            <div class="swiper-wrapper">
                <?php foreach ($posts as $post) { ?>
                    <?php
                    $bg = get_the_post_thumbnail_url($post->ID, 'full');
                    $title = $post->post_title;
                    $post_excerpt = $post->post_excerpt;
                    ?>
                    <div class="swiper-slide" style="background-image: url();">
                        <div class="inner">
                            <div class="heading-box">
                                <h3>
                                    <?= $title ?>
                                </h3>
                            </div>
                            <div class="description-box">
                                <?= wpautop($post_excerpt) ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
}

add_shortcode('post_slider', 'post_slider');
