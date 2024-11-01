<!DOCTYPE html>
<html lang="ru">
  <head>
  <? include("src/components/head.php") ?>
  </head>

  <?
  $stmt = $conn->query("SELECT * FROM `tours` ORDER BY id DESC LIMIT 4");
  $tours = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <body>
    <div
      class="max-w-7xl my-0 lg:my-5 mx-auto h-[400px] sm:h-[500px] lg:rounded-3xl overflow-hidden relative"
    >
      <div
        class="h-full bg-[url('/images/6002638.jpg')] bg-center bg-no-repeat bg-cover relative shadow-md"
      >
        <div
          class="w-full absolute flex items-center justify-between text-white z-50 p-2 sm:p-5"
        >
          <a href="/catalog" class="flex items-center gap-1 cursor-pointer">
            <svg
              viewBox="0 0 24 20"
              fill="currentColor"
              xmlns="http://www.w3.org/2000/svg"
              class="w-6 h-6"
            >
              <path
                d="M8.74733 19.75H7.49952C7.37414 19.75 7.25077 19.7185 7.14069 19.6585C7.03062 19.5984 6.93735 19.5118 6.86941 19.4064C6.80147 19.301 6.76104 19.1803 6.7518 19.0552C6.74257 18.9302 6.76483 18.8048 6.81655 18.6906L9.83811 12.0227L5.30108 11.9219L3.64639 13.9267C3.33092 14.3233 3.07921 14.5 2.43702 14.5H1.59702C1.46402 14.5043 1.33195 14.4764 1.212 14.4188C1.09205 14.3612 0.987757 14.2755 0.907956 14.1691C0.796393 14.0186 0.686706 13.7636 0.793581 13.3998L1.72264 10.0717C1.72967 10.0469 1.73811 10.022 1.74749 9.99766C1.74795 9.99534 1.74795 9.99295 1.74749 9.99063C1.73781 9.96627 1.72951 9.94139 1.72264 9.91609L0.792643 6.56687C0.691862 6.21016 0.802018 5.96078 0.912643 5.81406C0.986929 5.71549 1.08331 5.63573 1.19403 5.58118C1.30475 5.52664 1.42672 5.49883 1.55014 5.5H2.43702C2.91655 5.5 3.38202 5.71516 3.65577 6.0625L5.27624 8.03359L9.83811 7.96609L6.81749 1.30984C6.7657 1.19568 6.74335 1.07036 6.75249 0.945327C6.76163 0.820298 6.80196 0.699555 6.8698 0.594135C6.93764 0.488715 7.03082 0.401982 7.14083 0.341864C7.25083 0.281747 7.37416 0.250163 7.49952 0.25H8.76092C8.9369 0.253536 9.10983 0.29667 9.26685 0.376197C9.42388 0.455724 9.56097 0.569602 9.66796 0.709375L15.5297 7.83438L18.2376 7.76312C18.4359 7.75234 18.9853 7.74859 19.1123 7.74859C21.7026 7.75 23.2495 8.59094 23.2495 10C23.2495 10.4434 23.0723 11.2656 21.8869 11.7887C21.187 12.0981 20.2533 12.2547 19.1114 12.2547C18.9858 12.2547 18.4378 12.2509 18.2367 12.2402L15.5292 12.168L9.65296 19.293C9.54588 19.4321 9.40891 19.5454 9.25216 19.6246C9.0954 19.7037 8.92288 19.7465 8.74733 19.75Z"
                fill="white"
              />
            </svg>
            <p class="text-lg font-semibold">Найти тур</p>
          </a>
          <a
            href="/"
            class="absolute top-40 sm:relative sm:top-0 w-full sm:w-fit"
            ><img src="/images/Logo.svg" alt="logo" class="m-auto"
          /></a>
          <div class="flex items-center gap-5 cursor-pointer">
            <div class="flex items-center gap-2">
              <? if(isset($_SESSION['uid'])) {
                  ?><a href="?do=exit">Выйти</a><?
                } else{
                  ?>
                    <a href="/login"> Вход </a>
                    /
                    <a href="/register"> регистрация </a>

                  <?
                }?>
            </div>
          </div>
        </div>
        <p
          class="absolute h-full w-full text-center font-bold text-3xl sm:text-5xl text-white z-50 top-1/2"
        >
          Выбирай. Бронируй. Путешествуй.
        </p>
      </div>
      <div
        class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b from-black/70 z-10"
      ></div>
    </div>

    <div class="max-w-7xl mx-auto my-20 px-8 lg:px-0">
      <p class="text-2xl sm:text-3xl font-bold">
        Спланируйте идеальное путешествие
      </p>
      <p>Поиск самых популярных туров</p>
      <div
        id="popular-tours"
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-4 gap-5 mb-10 mt-5"
      >
      <?php foreach ($tours as $tour): ?>
        <div class="antialiased text-gray-900">
          <div class="py-8 flex items-center">
    <div class="bg-white max-w-[300px] rounded-xl overflow-hidden shadow-2xl">
        <img
            class="h-48 w-full object-cover object-end"
            src="<?= htmlspecialchars($tour['cover_image']) ?>"
            alt="Обложка тура"
        />
        <div class="p-5">
            <h4 class="mt-2 font-semibold text-lg leading-tight text-ellipsis truncate line-clamp-2">
                <?= htmlspecialchars($tour['name']) ?>
            </h4>
            <p class="text-sm text-gray-500 mt-1 truncate">
                <?= htmlspecialchars($tour['description']) ?>
            </p>

            <div class="mt-2">
                <span><?= number_format($tour['price'], 0, '', ' ') ?> ₽</span>
                /
                <span class="font-semibold text-sm"><?= htmlspecialchars($tour['duration_days']) ?> дней</span>
            </div>
            
            <div class="mt-2 flex items-center justify-center">
                <a href="/ordering/<?= $tour['id'] ?>" class="w-full bg-black rounded-lg text-white p-2 text-center">
                    Оформить тур
                </a>
            </div>
        </div>
    </div>
    
  </div>
</div>
<?php endforeach; ?>

      </div>

      <div class="flex justify-center">
        <button class="bg-black px-6 py-2 flex gap-x-3 items-center rounded-md font-semibold text-white">
          Каталог <i class="fa-solid fa-arrow-right" style="color: #ffffff"></i>
        </button>
      </div>
    </div>

    <div class="mx-auto max-w-7xl px-8 lg:px-0 mb-12">
      <div
        class="relative isolate overflow-hidden bg-black px-6 py-24 shadow-2xl rounded-2xl sm:rounded-3xl sm:px-24 xl:py-32"
      >
        <h2
          class="mx-auto max-w-3xl text-center text-3xl font-bold tracking-tight text-white sm:text-4xl"
        >
          Подпишитесь на наши уведомления
        </h2>

        <form class="mx-auto mt-10 flex max-w-md gap-x-4">
          <label for="email-address" class="sr-only">Почта</label>
          <input
            id="email-address"
            name="email"
            type="email"
            autocomplete="email"
            required=""
            class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-white sm:text-sm sm:leading-6"
            placeholder="Введите почту"
          />

          <button
            type="submit"
            class="flex-none rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
          >
            Отправить
          </button>
        </form>
      </div>
    </div>

    <div class="bg-black py-5 px-2 lg:px-0">
      <div class="max-w-7xl m-auto h-full flex justify-between w-full">
        <div>
          <img src="/images/Logo.svg" />
        </div>
        <div class="flex flex-col text-white text-sm text-end gap-1">
          <a class="cursor-pointer hover:text-black">Правила и условия</a>
          <a class="cursor-pointer hover:text-black">Разрешение споров</a>
          <a class="cursor-pointer hover:text-black">Как мы работаем</a>
          <a class="cursor-pointer hover:text-black"
            >Положение о конфиденциальности и cookie</a
          >
          <a class="cursor-pointer hover:text-black">Служба поддержки</a>
        </div>
      </div>
    </div>
  </body>
</html>
