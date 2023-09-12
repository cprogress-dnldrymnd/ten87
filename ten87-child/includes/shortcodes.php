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
                    <div class="swiper-slide elementor-section.elementor-section-boxed" style="background-image: url(<?= $bg ?>);">
                        <div class="inner elementor-container">
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
            <div class="swiper-button-prev">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="57.846" height="51.715" viewBox="0 0 57.846 51.715">
                    <defs>
                        <clipPath id="clip-path">
                            <rect id="Rectangle_37" data-name="Rectangle 37" width="57.846" height="51.715" fill="#1d1d1d" />
                        </clipPath>
                    </defs>
                    <g id="Group_165" data-name="Group 165" transform="translate(57.846 51.683) rotate(180)">
                        <g id="Group_44" data-name="Group 44" transform="translate(0 -0.033)" clip-path="url(#clip-path)">
                            <path id="Path_126" data-name="Path 126" d="M57.845,21.858v7.856l-22.024,22-5.093-5.172L44.017,33.269A2.142,2.142,0,0,0,42.5,29.611H0V22.1H42.566a2.142,2.142,0,0,0,1.513-3.661L30.728,5.171,35.822,0,57.846,21.858Z" transform="translate(0 0)" fill="#1d1d1d" />
                        </g>
                    </g>
                </svg>
            </div>
            <div class="swiper-button-next">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="57.846" height="51.77" viewBox="0 0 57.846 51.77">
                    <defs>
                        <clipPath id="clip-path">
                            <rect id="Rectangle_37" data-name="Rectangle 37" width="57.846" height="51.77" fill="#1d1d1d" />
                        </clipPath>
                    </defs>
                    <g id="Group_164" data-name="Group 164" transform="translate(0)">
                        <g id="Group_44" data-name="Group 44" transform="translate(0 0)" clip-path="url(#clip-path)">
                            <path id="Path_126" data-name="Path 126" d="M57.845,21.882v7.864L35.821,51.77l-5.093-5.177L44.017,33.3A2.145,2.145,0,0,0,42.5,29.643H0V22.128H42.566a2.145,2.145,0,0,0,1.513-3.665L30.728,5.177,35.822,0,57.846,21.882Z" transform="translate(0 0)" fill="#1d1d1d" />
                        </g>
                    </g>
                </svg>
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
}

add_shortcode('post_slider', 'post_slider');
