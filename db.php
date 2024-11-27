<?php
$servername = "localhost";
$username = "root"; // Ваше имя пользователя базы данных
$password = "";     // Ваш пароль
$dbname = "users_db"; // Имя вашей базы данных

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
    die();
}
?>
