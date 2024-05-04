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
$sql = "SELECT u.isAdmin, o.name, o.phone, o.email, o.budget, o.comment FROM users u
JOIN orders o WHERE u.id = $userId";
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
<ul class="admin__orders-list">';

// Выводим заказы
do {
echo '
<li class="admin__orders-item">
<p class="admin__orders-name">Имя: '.$row["name"].'</p>
<a href="tel:'.$row["phone"].'" class="admin__orders-phone">Телефон: '.$row["phone"].'</a>
<a href="mailto:'.$row["email"].'" class="admin__orders-email">E-Mail: '.$row["email"].'</a>
<p class="admin__orders-money">Бюджет: '.$row["budget"].' р.</p>
<p class="admin__orders-comment">
Комментарий: <br>'.$row["comment"].'
</p>
</li>
';
} while($row = $result->fetch_assoc());

echo '</ul>
</section>
</body>
<script src="js/jquery-3.7.1.min.js"></script>
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
echo "В данный момент заказы отсутствуют :(<br>";
echo '<a href="admin.php">Назад в админку</a>';
exit;
}

$conn->close();
?>

