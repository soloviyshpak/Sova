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
$sql = "UPDATE orders SET consideration = 'true' WHERE id = $itemId"; // Обновляем значение поля consideration
if ($conn->query($sql) === TRUE) {
    echo "Значение поля consideration успешно обновлено";
} else {
    echo "Ошибка при обновлении значения поля consideration: " . $conn->error;
}

// Закрываем соединение
$conn->close();
?>