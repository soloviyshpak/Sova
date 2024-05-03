<?php
session_start();

// Проверяем, авторизован ли пользователь
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
    // Пользователь авторизован, скрываем кнопку авторизации
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Главная – Sova</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>
    <div class="wrapper">
      <header class="header">
        <div class="header__top">
          <div class="header__left-block">
            <a href="#" class="header__left-city">Москва</a>
            <a href="tel:+78001000750" class="header__left-phone"
              >8 800 1000 750</a
            >
          </div>
          <a href="#" class="header__logo">SOVÁ</a>
          <div class="header__right-block">
            <a href="catalog.php" class="header__right-catalog">Каталог</a>
            <a href="order.php" class="header__right-decor"
              >Украшения на заказ</a
            >
            <div class="header__right-block_account">
              <?php if($isLoggedIn): ?>
                <a href="favourites.php" class="header__right-favourite"
                ><svg
                  width="20"
                  height="19"
                  viewBox="0 0 20 19"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M10.1 15.55L10 15.65L9.89 15.55C5.14 11.24 2 8.39 2 5.5C2 3.5 3.5 2 5.5 2C7.04 2 8.54 3 9.07 4.36H10.93C11.46 3 12.96 2 14.5 2C16.5 2 18 3.5 18 5.5C18 8.39 14.86 11.24 10.1 15.55ZM14.5 0C12.76 0 11.09 0.81 10 2.08C8.91 0.81 7.24 0 5.5 0C2.42 0 0 2.41 0 5.5C0 9.27 3.4 12.36 8.55 17.03L10 18.35L11.45 17.03C16.6 12.36 20 9.27 20 5.5C20 2.41 17.58 0 14.5 0Z"
                    fill="white"
                    fill-opacity="0.9"
                  />
                </svg>
              </a>
              <a href="basket.php" class="header__right-basket"
                ><svg
                  width="20"
                  height="20"
                  viewBox="0 0 20 20"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M0 1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H1.768C2.23533 0.000182706 2.68784 0.164012 3.04697 0.463045C3.4061 0.762078 3.64918 1.17743 3.734 1.637L3.986 3H17.743C18.0439 2.99996 18.341 3.06782 18.612 3.19852C18.8831 3.32923 19.1211 3.51941 19.3084 3.7549C19.4958 3.99039 19.6276 4.26512 19.694 4.55861C19.7604 4.8521 19.7597 5.1568 19.692 5.45L17.846 13.45C17.7442 13.8908 17.4959 14.2841 17.1418 14.5656C16.7876 14.8472 16.3484 15.0003 15.896 15H5.019C4.77904 15.0044 4.54549 14.9224 4.36098 14.769C4.17647 14.6155 4.05332 14.4008 4.014 14.164L1.768 2H1C0.734784 2 0.48043 1.89464 0.292893 1.70711C0.105357 1.51957 0 1.26522 0 1ZM5.832 13H15.897L17.743 5H4.355L5.832 13ZM6 16C5.46957 16 4.96086 16.2107 4.58579 16.5858C4.21071 16.9609 4 17.4696 4 18C4 18.5304 4.21071 19.0391 4.58579 19.4142C4.96086 19.7893 5.46957 20 6 20C6.53043 20 7.03914 19.7893 7.41421 19.4142C7.78929 19.0391 8 18.5304 8 18C8 17.4696 7.78929 16.9609 7.41421 16.5858C7.03914 16.2107 6.53043 16 6 16ZM16 16C15.4696 16 14.9609 16.2107 14.5858 16.5858C14.2107 16.9609 14 17.4696 14 18C14 18.5304 14.2107 19.0391 14.5858 19.4142C14.9609 19.7893 15.4696 20 16 20C16.5304 20 17.0391 19.7893 17.4142 19.4142C17.7893 19.0391 18 18.5304 18 18C18 17.4696 17.7893 16.9609 17.4142 16.5858C17.0391 16.2107 16.5304 16 16 16Z"
                    fill="white"
                    fill-opacity="0.9"
                  />
                </svg>
              </a>
              <a href="profile.php" class="header__right-account">
                <svg
                  width="18"
                  height="18"
                  viewBox="0 0 18 18"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M9 0C11.762 0 14 2.238 14 5C14 7.762 11.762 10 9 10C6.238 10 4 7.762 4 5C4 2.238 6.238 0 9 0ZM9 2C7.35 2 6 3.35 6 5C6 6.65 7.35 8 9 8C10.65 8 12 6.65 12 5C12 3.35 10.65 2 9 2ZM18 15V17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18H1C0.734784 18 0.48043 17.8946 0.292893 17.7071C0.105357 17.5196 0 17.2652 0 17V15C0 12.33 6.33 11 9 11C11.67 11 18 12.33 18 15ZM9 12.9C6.03 12.9 1.9 14.36 1.9 15V16.1H16.1V15C16.1 14.36 11.97 12.9 9 12.9Z"
                    fill="white"
                    fill-opacity="0.9"
                  />
                </svg>
              </a>
            <?php else: ?>
                <a href="preauth.php" class="auth__btn">Авторизация</a>
            <?php endif; ?>
            
            <!-- <a href="preauth.php" class="auth__btn">Авторизация</a> -->
            <!-- <a href="#" class="header__right-favourite"
                ><svg
                  width="20"
                  height="19"
                  viewBox="0 0 20 19"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M10.1 15.55L10 15.65L9.89 15.55C5.14 11.24 2 8.39 2 5.5C2 3.5 3.5 2 5.5 2C7.04 2 8.54 3 9.07 4.36H10.93C11.46 3 12.96 2 14.5 2C16.5 2 18 3.5 18 5.5C18 8.39 14.86 11.24 10.1 15.55ZM14.5 0C12.76 0 11.09 0.81 10 2.08C8.91 0.81 7.24 0 5.5 0C2.42 0 0 2.41 0 5.5C0 9.27 3.4 12.36 8.55 17.03L10 18.35L11.45 17.03C16.6 12.36 20 9.27 20 5.5C20 2.41 17.58 0 14.5 0Z"
                    fill="white"
                    fill-opacity="0.9"
                  />
                </svg>
              </a>
              <a href="#" class="header__right-basket"
                ><svg
                  width="20"
                  height="20"
                  viewBox="0 0 20 20"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M0 1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H1.768C2.23533 0.000182706 2.68784 0.164012 3.04697 0.463045C3.4061 0.762078 3.64918 1.17743 3.734 1.637L3.986 3H17.743C18.0439 2.99996 18.341 3.06782 18.612 3.19852C18.8831 3.32923 19.1211 3.51941 19.3084 3.7549C19.4958 3.99039 19.6276 4.26512 19.694 4.55861C19.7604 4.8521 19.7597 5.1568 19.692 5.45L17.846 13.45C17.7442 13.8908 17.4959 14.2841 17.1418 14.5656C16.7876 14.8472 16.3484 15.0003 15.896 15H5.019C4.77904 15.0044 4.54549 14.9224 4.36098 14.769C4.17647 14.6155 4.05332 14.4008 4.014 14.164L1.768 2H1C0.734784 2 0.48043 1.89464 0.292893 1.70711C0.105357 1.51957 0 1.26522 0 1ZM5.832 13H15.897L17.743 5H4.355L5.832 13ZM6 16C5.46957 16 4.96086 16.2107 4.58579 16.5858C4.21071 16.9609 4 17.4696 4 18C4 18.5304 4.21071 19.0391 4.58579 19.4142C4.96086 19.7893 5.46957 20 6 20C6.53043 20 7.03914 19.7893 7.41421 19.4142C7.78929 19.0391 8 18.5304 8 18C8 17.4696 7.78929 16.9609 7.41421 16.5858C7.03914 16.2107 6.53043 16 6 16ZM16 16C15.4696 16 14.9609 16.2107 14.5858 16.5858C14.2107 16.9609 14 17.4696 14 18C14 18.5304 14.2107 19.0391 14.5858 19.4142C14.9609 19.7893 15.4696 20 16 20C16.5304 20 17.0391 19.7893 17.4142 19.4142C17.7893 19.0391 18 18.5304 18 18C18 17.4696 17.7893 16.9609 17.4142 16.5858C17.0391 16.2107 16.5304 16 16 16Z"
                    fill="white"
                    fill-opacity="0.9"
                  />
                </svg>
              </a>
              <a href="#" class="header__right-account">
                <svg
                  width="18"
                  height="18"
                  viewBox="0 0 18 18"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M9 0C11.762 0 14 2.238 14 5C14 7.762 11.762 10 9 10C6.238 10 4 7.762 4 5C4 2.238 6.238 0 9 0ZM9 2C7.35 2 6 3.35 6 5C6 6.65 7.35 8 9 8C10.65 8 12 6.65 12 5C12 3.35 10.65 2 9 2ZM18 15V17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18H1C0.734784 18 0.48043 17.8946 0.292893 17.7071C0.105357 17.5196 0 17.2652 0 17V15C0 12.33 6.33 11 9 11C11.67 11 18 12.33 18 15ZM9 12.9C6.03 12.9 1.9 14.36 1.9 15V16.1H16.1V15C16.1 14.36 11.97 12.9 9 12.9Z"
                    fill="white"
                    fill-opacity="0.9"
                  />
                </svg>
              </a> -->
            </div>
          </div>
        </div>
        <div class="header__main">
          <a href="#" class="header__bcg-prev"
            ><svg
              width="36"
              height="36"
              viewBox="0 0 36 36"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <g opacity="0.6">
                <rect
                  width="36"
                  height="36"
                  rx="18"
                  fill="white"
                  fill-opacity="0.6"
                />
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M22.6108 11.8053L16.4161 18L22.6108 24.1947L20.6943 26.0976L12.5967 18L20.6943 9.90234L22.6108 11.8053Z"
                  fill="black"
                />
              </g>
            </svg>
          </a>
          <a href="#" class="header__bcg-next"
            ><svg
              width="36"
              height="36"
              viewBox="0 0 36 36"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <g opacity="0.6">
                <rect
                  width="36"
                  height="36"
                  rx="18"
                  fill="white"
                  fill-opacity="0.6"
                />
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M13.3796 24.1947L19.5743 18L13.3796 11.8053L15.2961 9.90234L23.3937 18L15.2961 26.0976L13.3796 24.1947Z"
                  fill="black"
                />
              </g>
            </svg>
          </a>
        </div>
        <div class="header__bottom">
          <a href="#" class="header__bottom-btn">Смотреть украшения</a>
          <div class="header__bottom-pages">
            <span
              class="header__bottom-page header__bottom-page--one header__bottom-page--active"
            ></span>
            <span class="header__bottom-page header__bottom-page--two"></span>
            <span class="header__bottom-page header__bottom-page--three"></span>
          </div>
        </div>
      </header>
      <main class="main">
        <section class="stories">
          <div class="container">
            <h2 class="stories__title">Ювелирный интернет-магазин SOVA</h2>
            <div class="stories__content">
              <div class="stories__content-item">
                <a class="stories_content-link" href="#"
                  ><img src="img/stories/1.png" alt=""
                /></a>
              </div>
              <div class="stories__content-item">
                <a class="stories_content-link" href="#">
                  <img src="img/stories/2.png" alt="" />
                </a>
              </div>
              <div class="stories__content-item">
                <a class="stories_content-link" href="#"
                  ><img src="img/stories/3.png" alt=""
                /></a>
              </div>
              <div class="stories__content-item">
                <a class="stories_content-link" href="#"
                  ><img src="img/stories/4.png" alt=""
                /></a>
              </div>
              <div class="stories__content-item">
                <a class="stories_content-link" href="#"
                  ><img src="img/stories/5.png" alt=""
                /></a>
              </div>
              <div class="stories__content-item">
                <a class="stories_content-link" href="#"
                  ><img src="img/stories/6.png" alt=""
                /></a>
              </div>
            </div>
          </div>
        </section>
        <section class="premium">
          <div class="container">
            <div class="premium__inner">
              <h2 class="premium__title">PREMIUM</h2>
              <div class="premium__slider swiper">
                <div class="premium__slide-wrapper swiper-wrapper">
                  <div class="premium__slide swiper-slide">
                    <div class="premium__slide-info">
                      <img
                        class="premium__slide-info_img"
                        src="img/premium-slider/decoration-1.png"
                        alt=""
                      />
                      <h4 class="premium__slide-info_price">460 000 руб.</h4>
                      <div class="premium__slide-info_sale">
                        <p class="premium__slide-info_sale_price">
                          1 149 990 руб.
                        </p>
                        <span class="premium__slide-info_percent">-60%</span>
                      </div>
                      <a href="#" class="premium__slide-info_more">ЕЩЁ -25%</a>
                    </div>
                    <img
                      class="premium__slide-middle_img"
                      src="img/premium-slider/women.jpg"
                      alt=""
                    />
                    <div class="premium__slide-info">
                      <img
                        class="premium__slide-info_img"
                        src="img/premium-slider/decoration-2.png"
                        alt=""
                      />
                      <h4 class="premium__slide-info_price">400 000 руб.</h4>
                      <div class="premium__slide-info_sale">
                        <p class="premium__slide-info_sale_price">
                          999 990 руб.
                        </p>
                        <span class="premium__slide-info_percent">-60%</span>
                      </div>
                      <a href="#" class="premium__slide-info_more">ЕЩЁ -25%</a>
                    </div>
                  </div>
                  <div class="premium__slide swiper-slide">
                    <div class="premium__slide-info">
                      <img
                        class="premium__slide-info_img"
                        src="img/premium-slider/decoration-1.png"
                        alt=""
                      />
                      <h4 class="premium__slide-info_price">460 000 руб.</h4>
                      <div class="premium__slide-info_sale">
                        <p class="premium__slide-info_sale_price">
                          1 149 990 руб.
                        </p>
                        <span class="premium__slide-info_percent">-60%</span>
                      </div>
                      <a href="#" class="premium__slide-info_more">ЕЩЁ -25%</a>
                    </div>
                    <img
                      class="premium__slide-middle_img"
                      src="img/premium-slider/women.jpg"
                      alt=""
                    />
                    <div class="premium__slide-info">
                      <img
                        class="premium__slide-info_img"
                        src="img/premium-slider/decoration-2.png"
                        alt=""
                      />
                      <h4 class="premium__slide-info_price">400 000 руб.</h4>
                      <div class="premium__slide-info_sale">
                        <p class="premium__slide-info_sale_price">
                          999 990 руб.
                        </p>
                        <span class="premium__slide-info_percent">-60%</span>
                      </div>
                      <a href="#" class="premium__slide-info_more">ЕЩЁ -25%</a>
                    </div>
                  </div>
                  <div class="premium__slide swiper-slide">
                    <div class="premium__slide-info">
                      <img
                        class="premium__slide-info_img"
                        src="img/premium-slider/decoration-1.png"
                        alt=""
                      />
                      <h4 class="premium__slide-info_price">460 000 руб.</h4>
                      <div class="premium__slide-info_sale">
                        <p class="premium__slide-info_sale_price">
                          1 149 990 руб.
                        </p>
                        <span class="premium__slide-info_percent">-60%</span>
                      </div>
                      <a href="#" class="premium__slide-info_more">ЕЩЁ -25%</a>
                    </div>
                    <img
                      class="premium__slide-middle_img"
                      src="img/premium-slider/women.jpg"
                      alt=""
                    />
                    <div class="premium__slide-info">
                      <img
                        class="premium__slide-info_img"
                        src="img/premium-slider/decoration-2.png"
                        alt=""
                      />
                      <h4 class="premium__slide-info_price">400 000 руб.</h4>
                      <div class="premium__slide-info_sale">
                        <p class="premium__slide-info_sale_price">
                          999 990 руб.
                        </p>
                        <span class="premium__slide-info_percent">-60%</span>
                      </div>
                      <a href="#" class="premium__slide-info_more">ЕЩЁ -25%</a>
                    </div>
                  </div>
                </div>

                <a href="#" class="premium__slide-prev"
                  ><svg
                    width="11"
                    height="18"
                    viewBox="0 0 11 18"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M10.6108 2.80529L4.41607 8.99999L10.6108 15.1947L8.69433 17.0976L0.59668 8.99999L8.69433 0.902344L10.6108 2.80529Z"
                      fill="black"
                      fill-opacity="0.6"
                    />
                  </svg>
                </a>
                <a href="#" class="premium__slide-next"
                  ><svg
                    width="36"
                    height="36"
                    viewBox="0 0 36 36"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <g opacity="0.6">
                      <rect
                        width="36"
                        height="36"
                        rx="18"
                        fill="white"
                        fill-opacity="0.6"
                      />
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M13.3796 24.1947L19.5743 18L13.3796 11.8053L15.2961 9.90234L23.3937 18L15.2961 26.0976L13.3796 24.1947Z"
                        fill="black"
                      />
                    </g>
                  </svg>
                </a>
              </div>
              <a href="premium.php" class="premium__link">Смотреть Premium</a>
            </div>
          </div>
        </section>
        <section class="collection">
          <div class="container">
            <h2 class="collection__title">Коллекции</h2>
            <div class="collection__inner">
              <div class="collection__slider swiper">
                <div class="collection__slider-wrapper swiper-wrapper">
                  <div class="collection__slide swiper-slide">
                    <img
                      class="collection__slide-img"
                      src="img/collections/1.jpg"
                      alt=""
                    />
                    <a href="#" class="collection__slide-link">ROSSE & SOVA</a>
                  </div>
                  <div class="collection__slide swiper-slide">
                    <img
                      class="collection__slide-img"
                      src="img/collections/2.jpg"
                      alt=""
                    />
                    <a href="#" class="collection__slide-link">SVOBODA</a>
                  </div>
                  <div class="collection__slide swiper-slide">
                    <img
                      class="collection__slide-img"
                      src="img/collections/1.jpg"
                      alt=""
                    />
                    <a href="#" class="collection__slide-link">ROSSE & SOVA</a>
                  </div>
                  <div class="collection__slide swiper-slide">
                    <img
                      class="collection__slide-img"
                      src="img/collections/2.jpg"
                      alt=""
                    />
                    <a href="#" class="collection__slide-link">SVOBODA</a>
                  </div>
                </div>
              </div>
              <a href="#" class="collection__slide-prev"
                ><svg
                  width="11"
                  height="18"
                  viewBox="0 0 11 18"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M10.6108 2.80529L4.41607 8.99999L10.6108 15.1947L8.69433 17.0976L0.59668 8.99999L8.69433 0.902344L10.6108 2.80529Z"
                    fill="black"
                    fill-opacity="0.6"
                  />
                </svg>
              </a>
              <a href="#" class="collection__slide-next"
                ><svg
                  width="36"
                  height="36"
                  viewBox="0 0 36 36"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g opacity="0.6">
                    <rect
                      width="36"
                      height="36"
                      rx="18"
                      fill="white"
                      fill-opacity="0.6"
                    />
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M13.3796 24.1947L19.5743 18L13.3796 11.8053L15.2961 9.90234L23.3937 18L15.2961 26.0976L13.3796 24.1947Z"
                      fill="black"
                    />
                  </g>
                </svg>
              </a>
            </div>
          </div>
        </section>
        <section class="cosmos">
          <h2 class="cosmos__title">Cosmos</h2>
          <div class="cosmos__content">
            <div class="cosmos__content-item">
              <img src="img/cosmos/1.jpg" alt="" />
            </div>
            <div class="cosmos__content-item">
              <img src="img/cosmos/2.jpg" alt="" />
            </div>
            <div class="cosmos__content-item">
              <img src="img/cosmos/3.jpg" alt="" />
            </div>
          </div>
        </section>
        <section class="brilliants">
          <div class="container">
            <div class="brilliants__inner">
              <h2 class="brilliants__title">Бриллианты</h2>
              <div class="brilliants__slider-inner">
                <div class="brilliants__slider swiper">
                  <div class="brilliants__slider-wrapper swiper-wrapper">
                    <div class="brilliants__slide swiper-slide">
                      <img
                        src="img/brilliants/1.png"
                        alt=""
                        class="brilliants__slide-img"
                      />
                      <div class="brilliants__slide-specs">
                        <h4 class="brilliants__price">114 000 руб.</h4>
                        <div class="brilliants__price-sale">
                          <p class="brilliants__price-sale_price">
                            284 990 руб.
                          </p>
                          <span class="brilliants__price-sale_percent"
                            >-60%</span
                          >
                        </div>
                        <a href="#" class="brilliants__price-link">ЕЩЁ -25%</a>
                      </div>
                    </div>
                    <div class="brilliants__slide swiper-slide">
                      <img
                        src="img/brilliants/2.png"
                        alt=""
                        class="brilliants__slide-img"
                      />
                      <div class="brilliants__slide-specs">
                        <h4 class="brilliants__price">54 000 руб.</h4>
                        <div class="brilliants__price-sale">
                          <p class="brilliants__price-sale_price">
                            134 990 руб.
                          </p>
                          <span class="brilliants__price-sale_percent"
                            >-60%</span
                          >
                        </div>
                        <a href="#" class="brilliants__price-link">ЕЩЁ -25%</a>
                      </div>
                    </div>
                    <div class="brilliants__slide swiper-slide">
                      <img
                        src="img/brilliants/3.png"
                        alt=""
                        class="brilliants__slide-img"
                      />
                      <div class="brilliants__slide-specs">
                        <h4 class="brilliants__price">72 000 руб.</h4>
                        <div class="brilliants__price-sale">
                          <p class="brilliants__price-sale_price">
                            179 990 руб.
                          </p>
                          <span class="brilliants__price-sale_percent"
                            >-60%</span
                          >
                        </div>
                        <a href="#" class="brilliants__price-link">ЕЩЁ -25%</a>
                      </div>
                    </div>
                    <div class="brilliants__slide swiper-slide">
                      <img
                        src="img/brilliants/1.png"
                        alt=""
                        class="brilliants__slide-img"
                      />
                      <div class="brilliants__slide-specs">
                        <h4 class="brilliants__price">114 000 руб.</h4>
                        <div class="brilliants__price-sale">
                          <p class="brilliants__price-sale_price">
                            284 990 руб.
                          </p>
                          <span class="brilliants__price-sale_percent"
                            >-60%</span
                          >
                        </div>
                        <a href="#" class="brilliants__price-link">ЕЩЁ -25%</a>
                      </div>
                    </div>
                    <div class="brilliants__slide swiper-slide">
                      <img
                        src="img/brilliants/2.png"
                        alt=""
                        class="brilliants__slide-img"
                      />
                      <div class="brilliants__slide-specs">
                        <h4 class="brilliants__price">54 000 руб.</h4>
                        <div class="brilliants__price-sale">
                          <p class="brilliants__price-sale_price">
                            134 990 руб.
                          </p>
                          <span class="brilliants__price-sale_percent"
                            >-60%</span
                          >
                        </div>
                        <a href="#" class="brilliants__price-link">ЕЩЁ -25%</a>
                      </div>
                    </div>
                    <div class="brilliants__slide swiper-slide">
                      <img
                        src="img/brilliants/3.png"
                        alt=""
                        class="brilliants__slide-img"
                      />
                      <div class="brilliants__slide-specs">
                        <h4 class="brilliants__price">72 000 руб.</h4>
                        <div class="brilliants__price-sale">
                          <p class="brilliants__price-sale_price">
                            179 990 руб.
                          </p>
                          <span class="brilliants__price-sale_percent"
                            >-60%</span
                          >
                        </div>
                        <a href="#" class="brilliants__price-link">ЕЩЁ -25%</a>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="#" class="brilliants__slide-prev"
                  ><svg
                    width="11"
                    height="18"
                    viewBox="0 0 11 18"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M10.6108 2.80529L4.41607 8.99999L10.6108 15.1947L8.69433 17.0976L0.59668 8.99999L8.69433 0.902344L10.6108 2.80529Z"
                      fill="black"
                      fill-opacity="0.6"
                    />
                  </svg>
                </a>
                <a href="#" class="brilliants__slide-next"
                  ><svg
                    width="36"
                    height="36"
                    viewBox="0 0 36 36"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <g opacity="0.6">
                      <rect
                        width="36"
                        height="36"
                        rx="18"
                        fill="white"
                        fill-opacity="0.6"
                      />
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M13.3796 24.1947L19.5743 18L13.3796 11.8053L15.2961 9.90234L23.3937 18L15.2961 26.0976L13.3796 24.1947Z"
                        fill="black"
                      />
                    </g>
                  </svg>
                </a>
              </div>
              <a href="brilliant.php" class="brilliants__link"
                >Все украшения с бриллиантами</a
              >
            </div>
          </div>
        </section>
      </main>
      <footer class="footer">
        <div class="container">
          <div class="footer__top">
            <div class="footer__top-app">
              <h4 class="footer__top-title">Приложение SOVÁ</h4>
              <div class="footer__top-store">
                <a href="#"><img src="img/footer/app-store.svg" alt="" /></a>
                <a href="#"><img src="img/footer/google-play.svg" alt="" /></a>
              </div>
            </div>
            <ul class="footer__top-list">
              <h5 class="footer__top-list_title">Покупателям</h5>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">Как сделать заказ</a>
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">Способы оплаты</a>
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">Доставка и оплата</a>
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">Возврат товара</a>
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link"
                  >Возврат денежных средств</a
                >
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">Рассрочка</a>
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">Оплата Долями</a>
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link"
                  >Проверка подлинности</a
                >
              </li>
              <li class="footer__top-list_item">
                <a href="service.php" class="footer__top-list_link"
                  >Сервис и ремонт</a
                >
              </li>
              <li class="footer__top-list_item">
                <a href="privilege.php" class="footer__top-list_link"
                  >Подарочная карта</a
                >
              </li>
              <li class="footer__top-list_item">
                <a href="tradein.php" class="footer__top-list_link"
                  >Бонусная программа</a
                >
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link"
                  >Гарантия лучшей цены</a
                >
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link"
                  >Политика обработки ПДН</a
                >
              </li>
            </ul>
            <ul class="footer__top-list">
              <h5 class="footer__top-list_title">SOVÁ</h5>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">О бренде</a>
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">Качество</a>
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">Дизайн</a>
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">Новости</a>
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">Инвесторам</a>
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">Журнал</a>
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">Контакты</a>
              </li>
            </ul>
            <ul class="footer__top-list">
              <h5 class="footer__top-list_title">Мы в соцсетях</h5>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">ВКонтакте</a>
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">YouTube</a>
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">Телеграм</a>
              </li>
              <li class="footer__top-list_item">
                <a href="#" class="footer__top-list_link">WhatsApp</a>
              </li>
            </ul>
          </div>
          <div class="footer__bottom">
            <span class="copyright">© 2024 SOVÁ</span>
          </div>
        </div>
      </footer>
    </div>
  </body>
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="js/sliders.js"></script>
  <script src="js/main.js"></script>
</html>
