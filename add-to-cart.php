<?php
session_start();

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['userId'])) {
    echo "Ошибка: Пользователь не авторизован";
    exit;
}


$goodsId = $_POST['goodsId'];
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
$sql = "SELECT * FROM basket WHERE userId='$userId' AND goodsId='$goodsId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Если товар уже есть в корзине, увеличиваем значение поля "count" на 1
    $row = $result->fetch_assoc();
    $newCount = $row["count"] + 1;
    $updateSql = "UPDATE basket SET count='$newCount' WHERE userId='$userId' AND goodsId='$goodsId'";
    if ($conn->query($updateSql) === TRUE) {
        echo "Количество товара в корзине успешно увеличено";
    } else {
        echo "Ошибка при обновлении количества товара в корзине: " . $conn->error;
    }
} else {
    // Если товара еще нет в корзине, добавляем новую запись
    $addSql = "INSERT INTO basket (userId, goodsId, count) VALUES ('$userId', '$goodsId', 1)";
    if ($conn->query($addSql) === TRUE) {
        echo "Товар успешно добавлен в корзину";
    } else {
        echo "Ошибка при добавлении товара в корзину: " . $conn->error;
    }
}

$conn->close();
?>