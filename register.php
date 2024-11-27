<?php
include 'db.php'; // Подключаем файл для соединения с базой данных

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $login = htmlspecialchars($_POST['login']);
    $login2 = htmlspecialchars($_POST['login2']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $retpassword = $_POST['retpassword'];

    // Проверяем, совпадают ли пароли
    if ($password !== $retpassword) {
        echo "Пароли не совпадают!";
        exit;
    }

    // Хешируем пароль
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Вставляем данные в базу
    $sql = "INSERT INTO users (login, login2, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    try {
        $stmt->execute([$login, $login2, $email, $hashedPassword]);
        echo "Регистрация успешна!";
    } catch (PDOException $e) {
        echo "Ошибка регистрации: " . $e->getMessage();
    }
}
?>
