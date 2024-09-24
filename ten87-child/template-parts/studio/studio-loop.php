<?php if (have_posts()) { ?>
    <div class="post-slider-holder">
        <div class="swiper mySwiperPostSlider">
            <div class="swiper-wrapper">
                <?php while (have_posts()) {
                    the_post() ?>
                    <?php
                    $args = array(
                        'bg' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                        'title' => get_the_title(),
                        'post_excerpt' => get_the_excerpt($post),
                        'post_id' => get_the_ID()
                    );
                    get_template_part('template-parts/studio/studio-swiper-slide', 'null', $args);
                    ?>
                <?php } ?>
            </div>
            <?= swiper_navigation() ?>
        </div>
    </div>
<?php } ?>