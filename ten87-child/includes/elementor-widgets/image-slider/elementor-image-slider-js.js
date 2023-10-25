
jQuery(document).ready(function () {
    const swiperImageSlide = new Swiper(".swiperImageSlide", {
        loop: true,
        autoplay: true,
        slidesPerView: 1,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

});