jQuery(document).ready(function () {
    sticky_header();
});

function sticky_header() {
    jQuery('.qodef-header-sticky').removeClass('qodef-appearance--up').addClass('qodef-appearance--down');
}