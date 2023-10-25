<?php
get_header();
?>
<?= do_shortcode('[custom_template post_id=5791]'); ?>
<?php if (have_posts()) { ?>
    <div class="post-slider-holder">
        <div class="swiper mySwiperPostSlider">
            <div class="swiper-wrapper">
            <?php while (have_posts()) { the_post()?>
                    <?php
                     $args = array(
                        'bg' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                        'title' => get_the_title(),
                        'post_excerpt' => get_the_excerpt($post)
                    );

                    get_template_part('template-parts/studio/studio-swiper-slide', 'null', $args);
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
<?php } ?>
<?php get_footer() ?>