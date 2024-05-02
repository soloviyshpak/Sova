<?php
session_start();

// Проверяем, авторизован ли пользователь
if(isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];

    // Подключение к базе данных
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sova";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Проверка соединения
    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $dateOfBirth = $_POST['dateOfBirth'];
      $phone = $_POST['phone'];
      $gender = $_POST['gender'];
      
  
    // Выполнение запроса на обновление информации о пользователе
    $sql = "UPDATE users SET firstName='$firstName', lastName='$lastName', dateOfBirth='$dateOfBirth', phone='$phone', gender='$gender' WHERE id={$_SESSION['userId']}";

    if ($conn->query($sql) === TRUE) {
        echo "Информация о пользователе успешно обновлена";
        header("Location: profile.php");
    } else {
        echo "Ошибка при обновлении информации о пользователе: " . $conn->error;
    }
}
}
?>