<!DOCTYPE html>
<html lang="ru">
<head>
  <? include("src/components/head.php") ?>
</head>
  <body>
    <a
      href="#"
      class="fixed bottom-2 right-2 z-40 bg-neutral-100 border border-sky-500 p-2 rounded-xl"
      ><svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-6 h-6 text-sky-600 m-auto"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75"
        />
      </svg>
    </a>

  <? include("src/components/header.php") ?>

    <div class="bg-neutral-100 pt-16 pb-8 px-2">
      <div
        class="max-w-5xl m-auto bg-white shadow-md p-5 rounded-xl grid grid-cols-1 sm:grid-cols-2 gap-5"
      >
        <fieldset class="border border-neutral-500 rounded p-1">
          <legend class="px-1 text-sm -mb-1">Страна</legend>
          <select class="outline-none w-full py-0.5" id="list-country">
            <option value="Все страны">Все страны</option>
            <option value="Египет">Египет</option>
            <option value="Индонезия">Индонезия</option>
            <option value="Кипр">Кипр</option>
            <option value="Мальдивы">Мальдивы</option>
            <option value="Мексика">Мексика</option>
            <option value="Танзания">Танзания</option>
            <option value="Тайланд">Таиланд</option>
          </select>
        </fieldset>
        <fieldset class="border border-neutral-500 rounded p-1">
          <legend class="px-1 text-sm -mb-1">Сортировка</legend>
          <select class="outline-none w-full h-full py-0.5" id="sort-tours">
            <option value="Все туры">Без фильтров</option>
            <option value="Возрастание рейтинга">
              По возрастанию длительности
            </option>
            <option value="Убывание рейтинга">По убыванию длительности</option>
            <option value="Возрастание цены">По возрастанию цены</option>
            <option value="Убывание цены">По убыванию цены</option>
          </select>
        </fieldset>
      </div>
    </div>

    <div class="bg-neutral-100 pb-10 min-h-screen">
      <div
        class="max-w-5xl m-auto gap-5 py-8 grid grid-cols-1 px-2 relative"
        id="list-tours"
      >
        <div
          class="flex flex-col sm:flex-row items-center justify-between rounded-2xl overflow-hidden shadow-md sm:h-64 bg-white sm:gap-5 sm:pr-5"
          id="tour-container"
        >
          <img
            src="/images/tours.jpeg"
            class="h-64 sm:h-full w-full sm:w-72 object-cover object-center"
          />
          <div
            class="flex flex-col w-full h-fit sm:h-full justify-between px-3 sm:px-0"
          >
            <div
              class="flex flex-col sm:flex-row justify-between items-start py-5 h-full"
            >
              <div>
                <p class="font-bold text-lg md:text-xl text-neutral-800">
                  Lorem Ipsum
                </p>
                <div class="flex items-center text-sm md:text-base">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    class="w-5 h-5 pr-1"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  <span>Египет</span>
                  <span class="px-1" aria-hidden="true">&middot;</span>
                  <span>lorem</span>
                </div>
                <p class="pt-2 text-sm md:text-base">
                  Продолжительность тура
                  <span class="font-semibold">от 14 ночей</span>
                </p>
              </div>
              <p
                class="sm:text-lg md:text-xl text-end font-semibold text-rose-400 pt-3 sm:pt-0 pl-3 sm:pl-5 w-full sm:w-fit"
              >
                от 65000 ₽
              </p>
            </div>

            <div
              class="flex itemss-center justify-between py-3 md:py-5 border-t border-neutral-300"
            >
              <div class="flex gap-3" id="button-container">
                <button
                  class="bg-cyan-500 hover:bg-cyan-600 px-5 h-10 font-medium rounded-xl w-fit text-sm md:text-base"
                  id="book-tour-${
                  tour.id
                }"
                >
                  Забронировать
                </button>
              </div>
              <p
                class="flex justify-center items-center border border-cyan-500 h-10 w-10 rounded-xl font-semibold text-sm md:text-base"
              >
                8.1
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="modal">
      <div
        class="bg-white p-5 w-4/5 xl:w-3/5 rounded-2xl max-h-full overflow-auto grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10"
        id="add-modal"
      >
        <div>
          <p class="text-xl md:text-2xl font-bold">Бронирование тура</p>
          <div
            class="rounded-2xl overflow-hidden relative md:hidden h-60 mt-2"
            id="modal-image-mobile"
          ></div>
          <div id="modal-content"></div>
          <form class="flex flex-col gap-3">
            <fieldset class="fieldset">
              <legend class="legend">ФИО*</legend>
              <input
                class="input"
                placeholder="Имя и фамилия"
                required
                id="customerName"
              />
            </fieldset>
            <fieldset class="fieldset">
              <legend class="legend">Телефон*</legend>
              <input
                class="input"
                placeholder="8-999-999-99-99"
                required
                id="phone"
              />
            </fieldset>
            <fieldset class="fieldset">
              <legend class="legend">Email*</legend>
              <input
                class="input"
                placeholder="qwerty@gmail.com"
                required
                id="email"
              />
            </fieldset>
            <fieldset class="fieldset">
              <legend class="legend">Комментарий</legend>
              <textarea
                class="textarea"
                placeholder="Комментарий к бронированию"
                id="description"
              ></textarea>
            </fieldset>
          </form>
          <p
            class="text-center pt-2 pb-2 font-medium hidden md:text-base text-xs"
            id="error-text"
          >
            Заполните обязательные поля*, чтобы отправить заявку на
            бронирование.
          </p>
          <div
            class="grid grid-cols-1 lg:grid-cols-2 pt-5 gap-2 md:gap-5 -mb-2 md:mb-0"
          >
            <button class="button" id="button-close-modal">Закрыть</button>
            <div id="buttons"></div>
          </div>
        </div>
        <div
          class="rounded-2xl overflow-hidden relative hidden md:block"
          id="modal-image"
        ></div>
      </div>
    </div>

    <div class="modal" id="modal-ok">
      <div
        class="bg-white px-5 py-16 w-4/5 xl:w-1/2 rounded-2xl max-h-full overflow-auto"
      >
        <div class="flex flex-col items-center">
          <p
            class="text-xl sm:text-2xl text-center font-semibold pb-6 text-neutral-900"
          >
            Ваша заявка успешно отправлена!
          </p>
          <button
            class="bg-cyan-500 hover:bg-cyan-600 px-5 h-10 font-medium rounded-xl text-lg w-3/5 sm:w-1/2"
            id="button-modal-ok"
          >
            Ок
          </button>
        </div>
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
