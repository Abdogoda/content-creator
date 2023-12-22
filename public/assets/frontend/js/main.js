"use strict";

(function ($) {
    /*------------------
        Preloader
    --------------------*/
    $(window).on("load", function () {
        /*------------------
            Portfolio filter
        --------------------*/
        $(".portfolio__filter li").on("click", function () {
            $(".portfolio__filter li").removeClass("active");
            $(this).addClass("active");
        });
        if ($(".portfolio__gallery").length > 0) {
            var containerEl = document.querySelector(".portfolio__gallery");
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    $(".set-bg").each(function () {
        var bg = $(this).data("setbg");
        $(this).css("background-image", `url(${bg})`);
    });

    //Masonary
    $(".work__gallery").masonry({
        itemSelector: ".work__item",
        columnWidth: ".grid-sizer",
        gutter: 10,
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: "#mobile-menu-wrap",
        allowParentLinks: true,
    });
    /*------------------
        Video & Image Popup
    --------------------*/
    $(".video-popup").magnificPopup({
        type: "iframe",
        preloader: true,
        tLoading: "Loading...",
        autoplay: true,
        mainClass: "mfp-fade bounce",
    });
    $(".image-popup").magnificPopup({
        type: "image",
        preloader: true,
        tLoading: "Loading...",
        mainClass: "mfp-fade bounce",
    });

    const visited = window.localStorage.getItem("visited") !== null;
    if (!visited) {
        setTimeout(function () {
            $(".autoload-popup").click();
        }, 3000);
        window.localStorage.setItem("visited", true);
    }

    /*------------------
        Counter
    --------------------*/
    $(".counter_num").each(function () {
        $(this)
            .prop("Counter", 0)
            .animate(
                {
                    Counter: $(this).text(),
                },
                {
                    duration: 4000,
                    easing: "swing",
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    },
                }
            );
    });
})(jQuery);

/*------------------
           Scroll Header
       --------------------*/
var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
    // header
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("header").style.top = "0";
        if (currentScrollPos > 50) {
            document.getElementById("header").classList.add("active");
        } else {
            document.getElementById("header").classList.remove("active");
        }
    } else {
        document.getElementById("header").style.top = "-100%";
    }
    prevScrollpos = currentScrollPos;
};

/*------------------
           Active Navbar Link
       --------------------*/
const changeActiveNavbar = () => {
    const navbarLinks = document.querySelectorAll(".header__nav__menu li");
    const currentLink =
        window.location.pathname.split("/")[
            window.location.pathname.split("/").length - 1
        ];
    navbarLinks.forEach((element) => {
        if (element.dataset.link === currentLink) {
            navbarLinks.forEach((e) => e.classList.remove("active"));
            element.classList.add("active");
        }
    });
};
changeActiveNavbar();
