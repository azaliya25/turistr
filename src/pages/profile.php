

<!DOCTYPE html>
<html lang="ru">
  <head>
    <? include("src/components/head.php") ?>
  </head>
  <?
    if (!isset($_SESSION['uid'])) {
      header("Location: /login");
      exit();
    }

?>
  <body class="bg-gray-100">
    <? include("./src/components/header.php") ?>
    <div class="container mx-auto py-10 px-6">
      <div class="bg-white max-w-2xl mx-auto p-8 rounded-lg shadow-lg">
        <a href="?do=exit" class="flex justify-end w-full font-semibold">Выйти</a>
        <div class="text-center mb-6">
          <img
            src="/images/tours.jpeg"
            alt="User Avatar"
            class="w-24 h-24 rounded-full mx-auto mb-4"
          />
          <h2 class="text-2xl font-bold text-gray-800"><?=$SIGNIN_USER['email']?></h2>
        </div>

        <h3 class="text-xl font-semibold text-gray-800 mb-4">Мои заказы</h3>
        <div class="space-y-4">
          <div
            class="bg-gray-50 border border-gray-200 rounded-lg p-4 shadow-sm"
          >
            <div class="flex justify-between items-center">
              <div>
                <h4 class="text-lg font-semibold text-gray-800">
                  Горы Кавказа
                </h4>
                <p class="text-sm text-gray-500">Дата начала: 15.11.2024</p>
                <p class="text-sm text-gray-500">Количество человек: 2</p>
              </div>
              <p class="text-lg font-semibold text-blue-600">45,000 ₽</p>
            </div>
          </div>

          <div
            class="bg-gray-50 border border-gray-200 rounded-lg p-4 shadow-sm"
          >
            <div class="flex justify-between items-center">
              <div>
                <h4 class="text-lg font-semibold text-gray-800">
                  Поездка на Байкал
                </h4>
                <p class="text-sm text-gray-500">Дата начала: 10.12.2024</p>
                <p class="text-sm text-gray-500">Количество человек: 3</p>
              </div>
              <p class="text-lg font-semibold text-blue-600">60,000 ₽</p>
            </div>
          </div>

          <!-- <p class="text-gray-500 text-center">У вас пока нет заказов</p> -->
        </div>
      </div>
    </div>
  </body>
</html>
