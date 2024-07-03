jQuery(document).ready(function () {
    jQuery('.swiper-testimonial-carousel').each(function (index, element) {
        $number_of_slides_desktop = jQuery(this).attr('number_of_slides_desktop');
        $number_of_slides_tablet = jQuery(this).attr('number_of_slides_tablet');
        $number_of_slides_mobile = jQuery(this).attr('number_of_slides_mobile');
        $slide_duration = jQuery(this).attr('slide_duration');

        var swiper_testimonial_carousel = new Swiper(".swiper-testimonial-carousel", {
            loop: true,
            spaceBetween: 30,
            autoplay: {
                delay: $slide_duration,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: $number_of_slides_mobile,
                },

                768: {
                    slidesPerView: $number_of_slides_tablet,
                },

                992: {
                    slidesPerView: $number_of_slides_desktop,
                },


            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

        });

    });

});