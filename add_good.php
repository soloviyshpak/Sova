<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sova";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Ошибка подключения: " . $conn->connect_error);
}

// Обработка POST-запроса
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $price = $_POST["price"];
  $material = $_POST["material"];
  $weight = $_POST["weight"];
  $inserts = $_POST["inserts"];
  $gender = $_POST["gender"];
  $brand = $_POST["brand"];

  // Путь к сохраняемому файлу
$targetDir = "img/resources/";
$targetFile = $targetDir . basename($_FILES["image"]["name"]);

// Загрузка файла на сервер
if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
  echo "Файл успешно загружен.";
} else {
  echo "Ошибка при загрузке файла.";
}

// Подготовленный запрос для вставки данных в базу
$sql = "INSERT INTO goods (name, image, price, material, weight, inserts, gender, brand) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $name, $targetFile, $price, $material, $weight, $inserts, $gender, $brand);

// Выполнение подготовленного запроса
if ($stmt->execute()) {
  header("Location: admin.php");
} else {
  echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

// Закрытие подготовленного запроса и соединения с базой данных
$stmt->close();
$conn->close();
}
?>