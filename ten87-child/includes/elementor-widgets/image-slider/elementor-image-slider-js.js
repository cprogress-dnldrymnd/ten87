
jQuery(document).ready(function () {
    const swiperImageSlide = new Swiper(".swiperImageSlide", {
        loop: true,
        autoplay: true,
        slidesPerView: 1,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
    });

});