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

// Получаем ID товара, который нужно удалить из базы
$itemId = $_POST['itemId']; 

// Удаляем избранный товар из базы данных
$sql = "DELETE FROM decorders WHERE id = $itemId"; // Удаляем запись из таблицы избранных товаров
if ($conn->query($sql) === TRUE) {
    echo "Заказ успешно удален из базы";
} else {
    echo "Ошибка при удалении заказа из базы: " . $conn->error;
}

// Закрываем соединение
$conn->close();
?>