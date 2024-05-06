// Header bcg changer
let numOfBackground = 1;

function headerBcgChanger() {
  $('.header').css(
    'background',
    `url('img/header-slider/${numOfBackground.toString()}.jpg') no-repeat`
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

// Select size of product
$('.product__sizes-link').on('click', function (e) {
  e.preventDefault();

  if ($('.product__sizes-link').hasClass('product__sizes-link--selected')) {
    $('.product__sizes-link').removeClass('product__sizes-link--selected');
  }

  $(this).addClass('product__sizes-link--selected');
});

// Profile gender select
$('.profile-edit__gender-label').on('click', function () {
  if (
    $('.profile-edit__gender-label').hasClass(
      'profile-edit__gender-label--selected'
    )
  ) {
    $('.profile-edit__gender-label').removeClass(
      'profile-edit__gender-label--selected'
    );
  }

  $(this).addClass('profile-edit__gender-label--selected');
});

// Masks for forms
// phone
document.addEventListener('DOMContentLoaded', function () {
  let phoneInput = document.getElementById('phone');
  phoneInput.addEventListener('input', function (e) {
    let x = e.target.value
      .replace(/\D/g, '')
      .match(/(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})/);
    e.target.value = !x[2]
      ? x[1] === '+'
        ? x[1]
        : '+' + x[1]
      : '+' +
        x[1] +
        '(' +
        x[2] +
        (x[3] ? ')' + x[3] : '') +
        (x[4] ? '-' + x[4] : '') +
        (x[5] ? '-' + x[5] : '');
  });
});

// date
document.addEventListener('DOMContentLoaded', function () {
  let dateInput = document.getElementById('dateOfBirth');
  dateInput.addEventListener('input', function (e) {
    let x = e.target.value
      .replace(/\D/g, '')
      .match(/(\d{0,2})(\d{0,2})(\d{0,4})/);
    e.target.value = !x[2]
      ? x[1]
      : x[1] + '.' + x[2] + (x[3] ? '.' + x[3] : '');
  });
});
