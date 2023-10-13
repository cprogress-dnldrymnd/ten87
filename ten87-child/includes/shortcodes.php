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
                    <div class="swiper-slide elementor-section elementor-section-boxed" style="background-image: url(<?= $bg ?>);">
                        <div class="elementor-container">
                            <div class="inner">
                                <div class="heading-box">
                                    <h3>
                                        <?= $title ?>
                                    </h3>
                                </div>
                                <div class="description-box">
                                    <?= wpautop($post_excerpt) ?>
                                </div>
                                <div class="button-group-box">
                                    <div class="qodef-qi-button-holder qodef-qi-button-white">
                                        <a class="qodef-shortcode qodef-m  qodef-qi-button qodef-html--link qodef-layout--filled qodef-type--standard   qodef-icon--right qodef-hover--icon-move-horizontal-short" href="" target="_self">
                                            <span class="qodef-m-text">Hire A Studio</span>
                                            <span class="qodef-m-icon ">
                                                <span class="qodef-m-icon-inner">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Group_45" data-name="Group 45" width="20.939" height="18.739" viewBox="0 0 20.939 18.739">
                                                        <defs>
                                                            <clipPath id="clip-path">
                                                                <rect id="Rectangle_37" data-name="Rectangle 37" width="20.938" height="18.739" fill="currentColor"></rect>
                                                            </clipPath>
                                                        </defs>
                                                        <g id="Group_44" data-name="Group 44" transform="translate(0 0)" clip-path="url(#clip-path)">
                                                            <path id="Path_126" data-name="Path 126" d="M20.938,7.92v2.847l-7.972,7.972-1.844-1.874,4.81-4.81a.776.776,0,0,0-.549-1.325H0V8.01H15.408a.776.776,0,0,0,.548-1.327L11.123,1.874,12.966,0l7.972,7.92Z" transform="translate(0 0)" fill="currentColor"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="qodef-qi-button-holder qodef-qi-button-bordered">
                                        <a class="qodef-shortcode qodef-m  qodef-qi-button qodef-html--link qodef-layout--filled qodef-type--standard   qodef-icon--right qodef-hover--icon-move-horizontal-short" href="<?= get_permalink($post->ID) ?>" target="_self">
                                            <span class="qodef-m-text">Learn More</span>
                                            <span class="qodef-m-icon ">
                                                <span class="qodef-m-icon-inner">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Group_45" data-name="Group 45" width="20.939" height="18.739" viewBox="0 0 20.939 18.739">
                                                        <defs>
                                                            <clipPath id="clip-path">
                                                                <rect id="Rectangle_37" data-name="Rectangle 37" width="20.938" height="18.739" fill="currentColor"></rect>
                                                            </clipPath>
                                                        </defs>
                                                        <g id="Group_44" data-name="Group 44" transform="translate(0 0)" clip-path="url(#clip-path)">
                                                            <path id="Path_126" data-name="Path 126" d="M20.938,7.92v2.847l-7.972,7.972-1.844-1.874,4.81-4.81a.776.776,0,0,0-.549-1.325H0V8.01H15.408a.776.776,0,0,0,.548-1.327L11.123,1.874,12.966,0l7.972,7.92Z" transform="translate(0 0)" fill="currentColor"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
