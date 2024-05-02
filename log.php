<?php
session_start();

// Проверяем, авторизован ли пользователь
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
    // Пользователь уже авторизован, перенаправляем его на главную страницу
    header("Location: index.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sova";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phone = $_POST['phone'];

$sql = "SELECT * FROM users WHERE firstName='$firstName' AND lastName='$lastName' AND phone='$phone'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userId = $row['id']; // предполагая, что у пользователя есть поле 'id' в таблице
    $userName = $row['lastName'] . ' ' . $row['firstName'];
    
    // Сохраняем информацию об авторизованном пользователе в сессии
    $_SESSION['loggedIn'] = true;
    $_SESSION['userId'] = $userId;

    // Добавляем JavaScript код для сохранения userId в localStorage и редиректа через 5 секунд
    echo "<script>";
    echo "localStorage.setItem('userId', '$userId');";
    echo "setTimeout(function() { window.location.href = 'index.php'; }, 5000);";
    echo "</script>";
    
    echo "Авторизация успешна! Добро пожаловать, $userName! Вы будете перенаправлены на главную страницу через 5 секунд.";
} else {
    echo "Ошибка: Неверные данные для авторизации.";
}

$conn->close();
?>