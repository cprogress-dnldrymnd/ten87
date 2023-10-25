<?php
get_header();
$object = get_queried_object();
$title = $object->name;
$desc = $object->description;
?>
<div class="page-heading elementor-section elementor-section-boxed home-hero">
    <div class="blob-holder-absolute blob-holder-1 blob-hero-1">
        <!-- Draw everything relative to a 200x200 canvas, this will then scale to any resolution -->
        <div class="blob-holder blob-box">
            <svg viewBox="0 0 200 200">
                <defs>

                    <radialGradient id="gradient" gradientTransform="translate(-0.5 -0.5) scale(2, 2)">
                        <stop offset="0%" stop-color="#ff5932"></stop>
                        <stop offset="10%" stop-color="rgba(255, 89, 50, 0.75)"></stop>
                        <stop offset="20%" stop-color="rgba(255, 89, 50, 0.5)"></stop>
                        <stop offset="40%" stop-color="rgba(255, 89, 50, 0)"></stop>
                    </radialGradient>
                </defs>
                <path d="" fill="url('#gradient')"></path>
            </svg>

        </div>
    </div>
    <div class="blob-holder-absolute blob-holder-2 blob-hero-2">
        <!-- Draw everything relative to a 200x200 canvas, this will then scale to any resolution -->
        <div class="blob-holder-2 blob-box">
            <svg viewBox="0 0 200 200">
                <defs>

                    <radialGradient id="gradient" gradientTransform="translate(-0.5 -0.5) scale(2, 2)">
                        <stop offset="0%" stop-color="#ff5932"></stop>
                        <stop offset="10%" stop-color="rgba(255, 89, 50, 0.75)"></stop>
                        <stop offset="20%" stop-color="rgba(255, 89, 50, 0.5)"></stop>
                        <stop offset="40%" stop-color="rgba(255, 89, 50, 0)"></stop>
                    </radialGradient>
                </defs>
                <path d="" fill="url('#gradient')"></path>
            </svg>

        </div>
    </div>
    <div class="elementor-container">
        <div class="qodef-section-title">
            <h1 class="qodef-shortcode qodef-m  qodef-custom-font qodef-custom-font-223 qodef-layout--simple qodef-alignment--left">
                <?= $title ?>
            </h1>
            <div class="qodef-section-title">
                <?= wpautop($desc) ?>
            </div>
        </div>
    </div>
</div>
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