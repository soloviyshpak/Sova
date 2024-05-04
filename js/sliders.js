// Premium slider
var swiper = new Swiper('.premium__slider', {
  navigation: {
    nextEl: '.premium__slide-next',
    prevEl: '.premium__slide-prev',
  },
});

// Collection slider
var swiper = new Swiper('.collection__slider', {
  slidesPerView: 2,
  spaceBetween: 114,
  navigation: {
    nextEl: '.collection__slide-next',
    prevEl: '.collection__slide-prev',
  },
});

// Brilliants slider
var swiper = new Swiper('.brilliants__slider', {
  slidesPerView: 3,
  spaceBetween: 81,
  navigation: {
    nextEl: '.brilliants__slide-next',
    prevEl: '.brilliants__slide-prev',
  },
});

// Collection page slider
var swiper = new Swiper('.collection__header-slider', {
  slidesPerView: 1,
  navigation: {
    nextEl: '.collection__header-slider-next',
    prevEl: '.collection__header-slider-prev',
  },
});
