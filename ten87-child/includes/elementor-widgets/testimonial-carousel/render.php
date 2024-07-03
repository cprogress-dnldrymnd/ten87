<?php
$number_of_slides_desktop = $settings['number_of_slides_desktop'];
$number_of_slides_tablet = $settings['number_of_slides_tablet'];
$number_of_slides_mobile = $settings['number_of_slides_mobile'];
$slide_duration = $settings['slide_duration'];
$testimonials = get_posts(array(
    'post_type' => 'testimonials',
    'numberposts' => -1,
));
?>
<div class="testimonial-carousel-holder">
    <div class="swiper swiper-testimonial-carousel" number_of_slides_desktop="<?= $number_of_slides_desktop ?>" number_of_slides_tablet="<?= $number_of_slides_tablet ?>" number_of_slides_mobile="<?= $number_of_slides_mobile ?>" slide_duration="<?= $slide_duration ?>">
        <div class="swiper-wrapper">
            <?php foreach ($testimonials as $testimonial) { ?>
                <?php
                $qodef_testimonials_text = get_post_meta($testimonial->ID, 'qodef_testimonials_text', true);
                ?>
                <div class="swiper-slide">
                    <div class="image-box">
                        <?= get_the_post_thumbnail('large') ?>
                    </div>
                    <div class="content-box">
                        <?= wpautop($qodef_testimonials_text) ?>
                        <div class="author">
                            <?= $testimonial->post_title ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="swiper-navigation">
            <div class="swiper-button-prev swiper-button-outside swiper-button-prev-553" tabindex="0" role="button" aria-label="Previous slide">
                <img decoding="async" src="https://ten87.studio/wp-content/themes/ten87-child/assets/images/arrow-black.svg" alt="" style="border-bottom-color: rgba(0, 0, 0, 0);">
            </div>
            <div class="swiper-button-next swiper-button-outside swiper-button-next-553" tabindex="0" role="button" aria-label="Next slide">
                <img decoding="async" src="https://ten87.studio/wp-content/themes/ten87-child/assets/images/arrow-black.svg" alt="" style="border-bottom-color: rgba(0, 0, 0, 0);">
            </div>
        </div>
    </div>
</div>