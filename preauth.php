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
    <title>Вход – Sova</title>
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
        <div class="auth__registration auth__registration--preauth">
          <a href="registration.php" class="registration-btn"
            >Зарегистрироваться</a
          >
          <p class="auth__or">Или</p>
          <a href="login.php" class="login-btn">Войти</a>
        </div>
      </seciton>
    </div>
  </body>
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="https://unpkg.com/imask"></script>
  <script src="js/main.js"></script>
</html>
