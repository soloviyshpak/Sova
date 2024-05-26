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
$sql = "SELECT u.isAdmin, o.id, o.userName, o.userPhone, o.goodImage, o.goodName, o.goodPrice, o.goodCount, o.goodSize, o.consideration FROM users u
JOIN orders o WHERE u.id = $userId AND o.consideration IS NULL";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// Пользователь найден
$row = $result->fetch_assoc();
if($row['isAdmin'] == "true") {
// Пользователь является администратором, отображаем содержимое страницы
echo '
<!DOCTYPE html>
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
<section class="admin__orders-page">
<h2 class="admin__orders-title">Заказы</h2>
<ul class="admin__orders-list admin__orders-list--other">';

// Выводим заказы
do {
echo '
<li class="admin__orders-item admin__orders-item--other">
<div class="admin__orders-userinfo">
  <h2 class="admin__orders-username">'.$row["userName"].'</h2>
  <p class="admin__orders-town">г. Москва</p>
  <a href="tel:'.$row["userPhone"].'" class="admin__orders-phonenumber">'.$row["userPhone"].'</a>
</div>
<div class="admin__orders-good">
  <img class="admin__order-good_img" src="'.$row["goodImage"].'" alt="">
  <div class="admin__order-good_info">
    <h2 class="admin__order-good_title">'.$row["goodName"].'</h2>
    <p class="admin__order-good_price">'.$row["goodPrice"].' р.</p>
    <div class="basket__inner-size basket__inner-size--other">'.$row["goodSize"].'</div>
    <p class="admin__order-good-count">Количество: '.$row["goodCount"].'</p>
  </div>
</div>
<div class="admin__orders-controls">
  <a href="#" class="admin__orders-controls_btn admin__orders-controls_btn--accept" name="'.$row["id"].'">Принять</a>
  <a href="#" class="admin__orders-controls_btn admin__orders-controls_btn--dismiss" name="'.$row["id"].'">Отклонить</a>
</div>
</li>
';
} while($row = $result->fetch_assoc());

echo '</ul>
</section>
</body>
<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/admin-del-oth-ord.js"></script>
<script src="js/admin.js"></script>
<script src="js/main.js"></script>
</html>
';
} else {
// Пользователь не является администратором, перенаправляем его на другую страницу
echo 'Вы не являетесь администратором!';
exit;
}
} else {
// Пользователь не найден, перенаправляем его на страницу авторизации
echo "В данный момент украшения на заказ отсутствуют :(<br>";
echo '<a href="admin.php">Назад в админку</a>';
exit;
}

$conn->close();
?>

