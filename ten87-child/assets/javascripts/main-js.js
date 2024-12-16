jQuery(document).ready(function () {
    sticky_header();
    animate();
});

function sticky_header() {
    jQuery('.qodef-header-sticky').removeClass('qodef-appearance--up').addClass('qodef-appearance--down');
}

function animate() {
    setTimeout(function () {
        jQuery('.qodef-section-title h1').addClass('animate');
    }, 600);
    setTimeout(function () {
        jQuery('.qodef-section-title .qodef-section-title').addClass('animate');
    }, 1000);
    setTimeout(function () {
        jQuery('.tax-studio_category .mySwiperPostSlider').addClass('animate');
        jQuery('.qodef-section-title .button-group-box').addClass('animate');
    }, 1400);
}