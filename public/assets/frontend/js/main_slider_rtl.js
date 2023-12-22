"use strict";

(function ($) {
    /*------------------
		Hero Slider
	--------------------*/
    $(".hero__slider").owlCarousel({
        rtl: true,
        loop: true,
        dots: true,
        mouseDrag: false,
        animateOut: "fadeOut",
        animateIn: "fadeIn",
        items: 1,
        margin: 0,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });
    var dot = $(".hero__slider .owl-dot");
    dot.each(function () {
        var index = $(this).index() + 1;
        if (index < 10) {
            $(this).html("0").append(index);
        } else {
            $(this).html(index);
        }
    });

    /*------------------
        Testimonial Slider
    --------------------*/
    $(".testimonial__slider").owlCarousel({
        rtl: true,
        loop: true,
        margin: 0,
        items: 3,
        dots: true,
        dotsEach: 2,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            992: {
                items: 3,
            },
            768: {
                items: 2,
            },
            320: {
                items: 1,
            },
        },
    });
})(jQuery);
