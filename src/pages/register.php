<!DOCTYPE html>
<html lang="ru">
  <head>
    <? include("src/components/head.php") ?>
  </head>
  <body>
    <? include("./src/components/header.php") ?>

    <?php
        $error = '';
        if(isset($_POST['signup'])){
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $sql = "SELECT count(*) FROM users WHERE email = '$email'";
            $user_count = $conn->query($sql)->fetchColumn();
            if($user_count == 1){
                $error.='<div class="text-center mt-2 text-red-600">Вы уже зарегистрированы</div>';
            }

            if(empty($error)){

                $hash_password = password_hash($pass, PASSWORD_DEFAULT);

                $stmt = $conn->prepare("INSERT INTO users (email, password_hash) VALUES (?, ?)");
                if ($stmt->execute([$email, $hash_password])) {
                  header("Location: /login");
                  exit();
              } else {
                  die("Ошибка регистрации.");
              }
            }
        }
    ?>

    <div  class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">
      <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Регистрация</h2>
        <form method="POST" name="signup" class="space-y-4">
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700"
              >Электронная почта</label
            >
            <input
              type="email"
              id="email"
              name="email"
              required
              class="w-full mt-1 p-2 border border-gray-300 rounded"
              placeholder="example@mail.com"
            />
          </div>
          <div>
            <label for="pass" class="block text-sm font-medium text-gray-700"
              >Пароль</label
            >
            <input
              type="password"
              id="pass"
              name="pass"
              required
              minlenght="6"
              class="w-full mt-1 p-2 border border-gray-300 rounded"
            />
          </div>
          <div>
            <label
              for="password_confirmation"
              class="block text-sm font-medium text-gray-700"
              >Повторите пароль</label
            >
            <input
              type="password"
              id="password_confirmation"
              name="password_confirmation"
              class="w-full mt-1 p-2 border border-gray-300 rounded"
            />
          </div>
          <button
            type="submit"
            name="signup"
            class="w-full bg-black text-white py-2 rounded mt-4"
          >
            Зарегистрироваться
          </button>
        </form>
        <p class="mt-4 text-sm text-center text-gray-600">
          Уже зарегистрированы?
          <a href="/login" class="text-blue-600 hover:underline">Войти</a>
        </p>
        <?=$error?>
      </div>
    </div>
  </body>
</html>
