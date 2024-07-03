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
                    <div class="inner">
                        <div class="image-box">
                            <div class="image">
                                <?= get_the_post_thumbnail($testimonial->ID, 'large') ?>
                            </div>
                        </div>
                        <div class="content-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="81.529" height="67.704" viewBox="0 0 81.529 67.704">
                                <path id="Icon_metro-quote" data-name="Icon metro-quote" d="M0,32.852V65.7H34.238V32.852H17.119s0-16.426,17.119-16.426V0S0,0,0,32.852ZM79.529,16.426V0S45.292,0,45.292,32.852V65.7H79.529V32.852H62.411S62.411,16.426,79.529,16.426Z" transform="translate(1 1)" fill="none" stroke="#000" stroke-width="2" />
                            </svg>
                            <?= wpautop($qodef_testimonials_text) ?>
                            <div class="author">
                                <?= $testimonial->post_title ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="swiper-navigation">
            <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide">
                <img decoding="async" src="https://ten87.studio/wp-content/themes/ten87-child/assets/images/arrow-black.svg">
            </div>
            <div class="swiper-button-next " tabindex="0" role="button" aria-label="Next slide">
                <img decoding="async" src="https://ten87.studio/wp-content/themes/ten87-child/assets/images/arrow-black.svg">
            </div>
        </div>
    </div>
</div>