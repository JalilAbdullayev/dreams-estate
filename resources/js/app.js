import "./bootstrap";
import "flowbite";
import "swiper/css/bundle";
import Swiper from "swiper";

AOS.init();

new Swiper(".slide-contentTwo", {
    slidesPerView: 3,
    spaceBetween: 50,
    loop: true,
    centerSlide: "true",
    fade: "true",
    grabCursor: "true",
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: ".next",
        prevEl: ".prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        950: {
            slidesPerView: 2,
        },
        1000: {
            slidesPerView: 3,
        },
    },
});

(function ($) {
    "use strict";
    $(document).ready(function () {
        "use strict";
        const progressPath = document.querySelector(".progress-wrap path");
        const pathLength = progressPath.getTotalLength();
        progressPath.style.transition = progressPath.style.WebkitTransition =
            "none";
        progressPath.style.strokeDasharray = pathLength + " " + pathLength;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition =
            "stroke-dashoffset 10ms linear";
        const updateProgress = function () {
            const scroll = $(window).scrollTop();
            const height = $(document).height() - $(window).height();
            progressPath.style.strokeDashoffset =
                pathLength - (scroll * pathLength) / height;
        };
        updateProgress();
        $(window).scroll(updateProgress);
        const offset = 50;
        const duration = 550;
        $(window).on("scroll", function () {
            if ($(this).scrollTop() > offset) {
                $(".progress-wrap").addClass("active-progress");
            } else {
                $(".progress-wrap").removeClass("active-progress");
            }
        });
        $(".progress-wrap").on("click", function (event) {
            event.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, duration);
            return false;
        });
    });
})($);
