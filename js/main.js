// Header bcg changer
let numOfBackground = 1;

function headerBcgChanger() {
  $('.header').css(
    'background',
    `url('../img/header-slider/${numOfBackground.toString()}.jpg') no-repeat`
  );
  $('.header').css('background-size', 'cover');

  if (numOfBackground === 1) {
    $('.header__bottom-page').removeClass('header__bottom-page--active');
    $('.header__bottom-page--one').addClass('header__bottom-page--active');
  } else if (numOfBackground === 2) {
    $('.header__bottom-page').removeClass('header__bottom-page--active');
    $('.header__bottom-page--two').addClass('header__bottom-page--active');
  } else if (numOfBackground === 3) {
    $('.header__bottom-page').removeClass('header__bottom-page--active');
    $('.header__bottom-page--three').addClass('header__bottom-page--active');
  }
}

$('.header__bcg-prev').on('click', (e) => {
  e.preventDefault();

  if (numOfBackground === 1) {
    numOfBackground = 3;
  } else {
    numOfBackground--;
  }

  headerBcgChanger();
});

$('.header__bcg-next').on('click', (e) => {
  e.preventDefault();

  if (numOfBackground === 3) {
    numOfBackground = 1;
  } else {
    numOfBackground++;
  }

  headerBcgChanger();
});

$('.header__bottom-page--one').on('click', () => {
  numOfBackground = 1;
  headerBcgChanger();
});
$('.header__bottom-page--two').on('click', () => {
  numOfBackground = 2;
  headerBcgChanger();
});
$('.header__bottom-page--three').on('click', () => {
  numOfBackground = 3;
  headerBcgChanger();
});

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

// Select size of product
$('.product__sizes-link').on('click', function (e) {
  e.preventDefault();

  if ($('.product__sizes-link').hasClass('product__sizes-link--selected')) {
    $('.product__sizes-link').removeClass('product__sizes-link--selected');
  }

  $(this).addClass('product__sizes-link--selected');
});
