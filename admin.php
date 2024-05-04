<?php
session_start();

// Проверяем, авторизован ли пользователь
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    // Если пользователь не авторизован, перенаправляем его на страницу авторизации
    header("Location: login.php");
    exit;
}

// ID авторизованного пользователя
$userId = $_SESSION['userId'];

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sova";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем данные пользователя из базы данных
$sql = "SELECT u.isAdmin, g.id, g.name, g.image, g.price FROM users u
        JOIN goods g WHERE u.id = $userId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Пользователь найден
    $row = $result->fetch_assoc();
    if($row['isAdmin'] == "true") {
        // Пользователь является администратором, отображаем содержимое страницы
        echo '<!DOCTYPE html>
              <html lang="ru">
                <head>
                  <meta charset="UTF-8" />
                  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                  <title>Админ – Sova</title>
                  <link rel="stylesheet" href="css/reset.css" />
                  <link rel="stylesheet" href="css/main.css" />
                </head>
                <body>
                  <header class="header__admin">
                    <a href="admin.php" class="header__admin-logo">SOVÁ</a>
                  </header>
                  <aside class="admin__menu">
                    <ul class="admin__menu-list">
                      <li class="admin__menu-item">
                        <a href="admin.php" class="admin__menu-link">Товары</a>
                      </li>
                      <li class="admin__menu-item">
                        <a href="admin_orders.php" class="admin__menu-link">Заказы</a>
                      </li>
                      <li class="admin__menu-item">
                        <a href="index.php" class="admin__menu-link">Просмотр сайта</a>
                      </li>
                    </ul>
                  </aside>
                  <section class="admin__body">
                    <a href="admin_add.php" class="admin__add">Добавить</a>
                    <ul class="admin__goods-list">';
                      
                    while ($row = $result->fetch_assoc()) {
                      echo '
                      <li class="admin__goods-item">
                        <img src="'.$row["image"].'" alt="" class="admin__goods-img" />
                          <p class="admin__goods-price">'.$row["price"].' р</p>
                          <a href="product.php?id='. $row["id"] .'" class="admin__goods-title">
                          '.$row["name"].'
                          </a>
                          <a href="#" name="'.$row["id"].'" class="admin__goods-del_link">
                            <span class="admin__goods-del"></span>
                          </a>
                      </li>
                      ';
                    } 
                     
                    echo '</ul>
                  </section>
                </body>
                <script src="js/jquery-3.7.1.min.js"></script>
                <script src="js/admin-del.js"></script>
                <script src="js/admin.js"></script>
                <script src="js/main.js"></script>
              </html>';
    } else {
        // Пользователь не является администратором, перенаправляем его на другую страницу
        echo 'Вы не являетесь администратором!';
        exit;
    }
} else {
    // Пользователь не найден, перенаправляем его на страницу авторизации
    header("Location: login.php");
    exit;
}

$conn->close();
?>



<!-- <li class="admin__goods-item">
                        <img src="img/brilliants/1.png" alt="" class="admin__goods-img" />
                        <p class="admin__goods-price">36 000 р</p>
                        <a href="#" class="admin__goods-title">
                          Серьги из белого золота с бриллиантами
                        </a>
                      </li> -->