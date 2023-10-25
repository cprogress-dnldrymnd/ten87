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
                    $bg = get_the_post_thumbnail_url($post->ID, 'full');
                    $title = $post->post_title;
                    $post_excerpt = $post->post_excerpt;
                    ?>
                    <?php
                    include(get_stylesheet_directory() . '/template-parts/studio-swiper-slide');
                    ?>
                <?php } ?>
            </div>
            <div class="swiper-navigation-holder">
                <div class="nav-inner">
                    <div class="swiper-button-prev">
                        <img src="<?= get_stylesheet_directory_uri() . '/assets/images/arrow.svg' ?>" alt="">
                    </div>
                    <div class="swiper-button-next">
                        <img src="<?= get_stylesheet_directory_uri() . '/assets/images/arrow.svg' ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
}

add_shortcode('post_slider', 'post_slider');


function page_heading()
{
    ob_start();
    $object = get_queried_object();
    $title = $object->name;
    $desc = $object->description;
?>
    <div class="qodef-section-title">
        <h1 class="qodef-shortcode qodef-m  qodef-custom-font qodef-custom-font-223 qodef-layout--simple qodef-alignment--left">
            <?= $title ?>
        </h1>
        <div class="qodef-section-title">
            <?= wpautop($desc) ?>
        </div>
    </div>

<?php
    return ob_get_clean();
}

add_shortcode('page_heading', 'page_heading');
