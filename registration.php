<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Украшения на заказ – Sova</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>
    <div class="wrapper auth__wrapper">
      <seciton class="auth">
        <a href="index.php" class="header-page__logo header-page__logo--auth"
          >SOVÁ</a
        >
        <form class="auth__registration">
          <a href="preauth.php" class="auth__close"
            ><svg
              width="42"
              height="45"
              viewBox="0 0 42 45"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M2.5 3L39.5 42.5M39.5 3L2.5 42.5"
                stroke="#A2A3A6"
                stroke-width="6"
              /></svg
          ></a>
          <h2 class="auth__registration-title">Регистрация</h2>
          <input
            type="text"
            class="auth__registration-input"
            placeholder="Ваша фамилия"
            required
          />
          <input
            type="text"
            class="auth__registration-input"
            placeholder="Ваша имя"
            required
          />
          <label class="auth__label">
            Телефон
            <input
              type="tel"
              class="auth__registration-input auth__registration-input--tel"
              placeholder="+7 (___) ___-__-__"
              required
            />
          </label>
          <button type="submit" class="auth__registration-btn">
            Продолжить
          </button>
        </form>
      </seciton>
    </div>
  </body>
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="https://unpkg.com/imask"></script>
  <script src="js/main.js"></script>
</html>
