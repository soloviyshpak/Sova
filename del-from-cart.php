<?php
// Подключение к базе данных (используйте ваши параметры подключения)
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

// Получаем ID товара, который нужно удалить из избранного
$itemId = $_POST['itemId']; 

// Id авторизованного пользователя
$userId = $_POST['userId']; // Замените этот ID на реальный ID пользователя

// Удаляем избранный товар из базы данных
$sql = "DELETE FROM basket WHERE userId = $userId AND goodsId = $itemId"; // Удаляем запись из таблицы избранных товаров
if ($conn->query($sql) === TRUE) {
    echo "Товар успешно удален из корзины";
} else {
    echo "Ошибка при удалении товара из корзины: " . $conn->error;
}

// Закрываем соединение
$conn->close();
?>