<?php
// Подключение к базе данных
$conn = new mysqli("localhost", "root", "", "sova");

// Проверяем соединение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Получаем данные из формы
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$budget = $_POST['budget'];
$comment = $_POST['comment'];

// Готовим SQL запрос для добавления данных в таблицу orders
$sql = "INSERT INTO orders (name, phone, email, budget, comment) VALUES ('$name', '$phone', '$email', '$budget', '$comment')";

// Проверяем успешность выполнения запроса
if ($conn->query($sql) === TRUE) {
  header("Location: order.php");
} else {
  echo "Ошибка при добавлении заявки: " . $conn->error;
}

// Закрываем соединение
$conn->close();
?>