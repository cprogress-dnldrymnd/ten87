<div class="image-slider">
    <div class="swiper swiperImageSlide">
        <div class="swiper-wrapper">
            <?php foreach ($settings['images'] as $image) { ?>
                <div class="swiper-slide">
                    <div class="image-box">
                        <img src="<?= esc_attr( $image['url'] ) ?>">
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>