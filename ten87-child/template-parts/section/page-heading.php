<?php
if (is_archive()) {
    $object = get_queried_object();
    $title = $object->name;
    $desc = $object->description;
} else {

    $alt_title = get__post_meta('alt_title');
    $description = get__post_meta('description');
    $title = $alt_title ? $alt_title : get_the_title();
    $desc = $description ? $description : get_the_excerpt();
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

            <?php if (get_post_type() == 'studios' && is_single()) { ?>
                <div class="button-group-box">
                    <div class="qodef-qi-button-holder qodef-qi-button-black">
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
                        <a class="qodef-shortcode qodef-m  qodef-qi-button qodef-html--link qodef-layout--filled qodef-type--standard   qodef-icon--right qodef-hover--icon-move-horizontal-short" href="#find-us" target="_self">
                            <span class="qodef-m-text">Find Us</span>
                            <span class="qodef-m-icon ">
                                <span class="qodef-m-icon-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.024" height="21.024" viewBox="0 0 21.024 21.024">
                                        <path fill="currentColor" id="Icon_material-my-location" data-name="Icon material-my-location" d="M12.012,8.19a3.823,3.823,0,1,0,3.823,3.823A3.822,3.822,0,0,0,12.012,8.19Zm8.544,2.867a8.6,8.6,0,0,0-7.588-7.588V1.5H11.057V3.469a8.6,8.6,0,0,0-7.588,7.588H1.5v1.911H3.469a8.6,8.6,0,0,0,7.588,7.588v1.969h1.911V20.556a8.6,8.6,0,0,0,7.588-7.588h1.969V11.057ZM12.012,18.7a6.69,6.69,0,1,1,6.69-6.69A6.685,6.685,0,0,1,12.012,18.7Z" transform="translate(-1.5 -1.5)" />
                                    </svg>
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>