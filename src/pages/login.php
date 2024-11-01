
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php include("src/components/head.php"); ?>
</head>
<body>
<?php include("./src/components/header.php"); ?>

<?php
if (isset($_SESSION['uid'])) {
    header("Location: /profile");
    exit();
}

$error = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email)) {                     
        $error .='<p class="text-center text-red-600">Введите почту</p>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .='<p  class="text-center text-red-600">Неверный формат почты</p>';
    }

    if (empty($error)) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $temp_user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$temp_user) {
            $error .='<p  class="text-center text-red-600">вас нет в базе</p>';
        } elseif (empty($password)) {
            $error .='<p  class="text-center text-red-600">введите пароль</p>';
        } elseif (!password_verify($password, $temp_user['password_hash'])) {
            $error .='<p class="text-center text-red-600">неверный пароль</p>';
        } else {
            $_SESSION['uid'] = $temp_user['id'];
            header("Location: /profile");
            exit();
        }
    }
}
?>
<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Вход в систему</h2>
        
        <form name="signin" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Электронная почта</label>
                <input value="<?= htmlspecialchars($email) ?>" type="email" id="email" name="email" required class="w-full mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                <input type="password" id="password" name="password" required class="w-full mt-1 p-2 border border-gray-300 rounded">
            </div>
            <button name="signin" type="submit" class="w-full bg-black text-white py-2 rounded mt-4">Войти</button>
        </form>

        <p class="mt-4 text-sm text-center text-gray-600">
            Нет аккаунта? <a href="/register" class="text-blue-600 hover:underline">Зарегистрироваться</a>
        </p>

        <?= $error ?>
    </div>
</div>
</body>
</html>
