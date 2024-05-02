<?php
// Инициализация сессии
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sova";

// Подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phone = $_POST['phone'];

$sql = "INSERT INTO users (firstName, lastName, phone) VALUES ('$firstName', '$lastName', '$phone')";

if ($conn->query($sql) === TRUE) {
    // Редирект на index.php, если регистрация прошла успешно
    header("Location: index.php");
    exit;
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>