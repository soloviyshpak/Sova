<?php
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

// SQL запрос для добавления товара в избранное
$sql = "INSERT INTO favourites (userId, goodsId) VALUES ('$userId', '$goodsId')";

if ($conn->query($sql) === TRUE) {
    echo "Товар успешно добавлен в избранное";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>