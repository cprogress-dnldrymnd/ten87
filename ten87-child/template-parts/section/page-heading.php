<?php
if (is_archive()) {
    $object = get_queried_object();
    $title = $object->name;
    $desc = $object->description;
} else {
    $title = get_the_title();
    $desc = get_the_excerpt();
}
?>

<div class="page-heading elementor-section elementor-section-boxed home-hero" id="home-hero">
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
            <h1 class="heading">
                <?= $title ?>
            </h1>
            <div class="qodef-section-title">
                <?= wpautop($desc) ?>
            </div>
        </div>
    </div>
</div>