<?php
session_start();
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    if ($password !== $password_confirmation) {
        die("Пароли не совпадают.");
    }

    $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        die("Пользователь с таким email уже зарегистрирован.");
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO users (email, password_hash) VALUES (?, ?)");
    if ($stmt->execute([$email, $password_hash])) {
        header("Location: /login");
        exit();
    } else {
        die("Ошибка регистрации.");
    }
}
?>
