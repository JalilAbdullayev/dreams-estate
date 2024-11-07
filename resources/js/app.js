import './bootstrap';
import 'flowbite';
import 'swiper/css/bundle';
import Alpine from 'alpinejs';
import Swiper from "swiper";

window.Alpine = Alpine;
Alpine.start();
AOS.init();

let swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 50,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: ".swiper-button-nextt",
        prevEl: ".swiper-button-prevv",
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

let swiperTwo = new Swiper(".slide-contentTwo", {
    slidesPerView: 3,
    spaceBetween: 50,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
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
