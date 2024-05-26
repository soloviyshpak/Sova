<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sova";

// Создаем подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $orderId = $_POST["id"];


    $sql = "DELETE FROM orders WHERE id = $orderId";
    $result = $conn->query($sql);

    if ($result) {
        echo "Заказ успешно удален";
    } else {
        echo "Ошибка при удалении заказа";
    }
}

// Закрываем соединение
$conn->close();
?>