<?php
session_start();

// Удаляем все переменные сессии
session_unset();

// Уничтожаем текущую сессию
session_destroy();

// Очищаем localStorage
echo "<script>";
echo "localStorage.clear();"; // Этот код удалит все данные из localStorage
echo "</script>";

// Ждем 5 секунд
header("Refresh: 5; url=index.php"); // Перенаправляем через 5 секунд
echo "Выход произойдет через 5 секунд. <a href='index.php'>Нажмите сюда, если не хотите ждать</a>";
exit;
?>