<?php
session_start();

// Удаляем все переменные сессии
session_unset();

// Уничтожаем текущую сессию
session_destroy();

// Перенаправляем пользователя на главную страницу
header("Location: index.php");
exit;
?>