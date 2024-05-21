<?php
session_start();

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['userId'])) {
    echo "Ошибка: Пользователь не авторизован";
    exit;
}


$userId = $_POST['userId'];

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sova";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверяем, есть ли уже такой товар в корзине для данного пользователя
$sql = "INSERT INTO orders (userName, userPhone, goodImage, goodName, goodPrice, goodCount, goodSize)
        SELECT CONCAT(u.firstName, ' ', u.lastName) AS userName, u.phone, g.image, g.name, g.price, b.count AS goodCount, b.size AS goodSize
        FROM basket b
        JOIN users u ON b.userId = u.id
        JOIN goods g ON b.goodsId = g.id
        WHERE b.userId = $userId;"; // Добавляем условие WHERE для выборки данных только для конкретного пользователя
$result = $conn->query($sql);

// Удаляем позиции из корзины после оформления заказа
$deleteSql = "DELETE FROM basket WHERE userId = $userId";
$deleteResult = $conn->query($deleteSql);

$conn->close();
?>