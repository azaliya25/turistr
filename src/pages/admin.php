<!DOCTYPE html>
<html lang="ru">
  <head>
    <? include("src/components/head.php") ?>
  </head>
  <body class="bg-gray-100">
    <div class="container mx-auto py-10 px-6">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Управление турами</h1>
        <button
          onclick="openModal('addTourModal')"
          class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300"
        >
          Добавить тур
        </button>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img
            src="/images/tours.jpeg"
            alt="Tour cover"
            class="w-full h-48 object-cover"
          />
          <div class="p-4">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">
              Горы Кавказа
            </h2>
            <p class="text-gray-500 mb-4">
              Длительность: 7 дней, Цена: 45,000 ₽
            </p>
            <div class="flex justify-between">
              <button
                onclick="openEditModal({name: 'Горы Кавказа', price: 45000, duration: 7, location: 'Сочи', description: 'Описание тура'})"
                class="bg-yellow-500 text-white py-1 px-4 rounded hover:bg-yellow-600"
              >
                Изменить
              </button>
              <button
                onclick="openModal('deleteConfirmModal')"
                class="bg-red-600 text-white py-1 px-4 rounded hover:bg-red-700"
              >
                Удалить
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      id="editTourModal"
      class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden"
    >
      <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Изменить тур</h2>
        <form
          action="/admin/tours/edit"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-4"
        >
          <div>
            <label
              for="editTourCover"
              class="block text-sm font-medium text-gray-700"
              >Обложка тура</label
            >
            <input
              type="file"
              id="editTourCover"
              name="cover"
              accept=".jpg,.jpeg,.png,.webp"
              class="w-full mt-2 p-2 border border-gray-300 rounded"
            />
          </div>
          <div>
            <label
              for="editTourName"
              class="block text-sm font-medium text-gray-700"
              >Наименование</label
            >
            <input
              type="text"
              id="editTourName"
              name="name"
              required
              minlength="2"
              maxlength="100"
              class="w-full mt-2 p-2 border border-gray-300 rounded"
            />
          </div>
          <div>
            <label
              for="editTourPrice"
              class="block text-sm font-medium text-gray-700"
              >Цена</label
            >
            <input
              type="number"
              id="editTourPrice"
              name="price"
              required
              min="0"
              max="1000000"
              class="w-full mt-2 p-2 border border-gray-300 rounded"
            />
          </div>
          <div>
            <label
              for="editTourDuration"
              class="block text-sm font-medium text-gray-700"
              >Длительность в сутках</label
            >
            <input
              type="number"
              id="editTourDuration"
              name="duration"
              required
              min="1"
              max="100"
              class="w-full mt-2 p-2 border border-gray-300 rounded"
            />
          </div>
          <div>
            <label
              for="editTourLocation"
              class="block text-sm font-medium text-gray-700"
              >Локация</label
            >
            <input
              type="text"
              id="editTourLocation"
              name="location"
              required
              class="w-full mt-2 p-2 border border-gray-300 rounded"
            />
          </div>
          <div>
            <label
              for="editTourDescription"
              class="block text-sm font-medium text-gray-700"
              >Описание</label
            >
            <textarea
              id="editTourDescription"
              name="description"
              maxlength="1000"
              class="w-full mt-2 p-2 border border-gray-300 rounded"
            ></textarea>
          </div>

          <div class="flex justify-end space-x-4">
            <button
              type="button"
              onclick="closeModal('editTourModal')"
              class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400"
            >
              Закрыть
            </button>
            <button
              type="submit"
              class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
            >
              Изменить
            </button>
          </div>
        </form>
      </div>
    </div>

    <div
      id="deleteConfirmModal"
      class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden"
    >
      <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Удалить тур?</h3>
        <p class="text-gray-600 mb-6">
          Вы уверены, что хотите удалить этот тур? Это действие необратимо.
        </p>
        <div class="flex justify-end space-x-4">
          <button
            onclick="closeModal('deleteConfirmModal')"
            class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400"
          >
            Отмена
          </button>
          <button
            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
          >
            Удалить
          </button>
        </div>
      </div>
    </div>

    <div
      id="addTourModal"
      class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden"
    >
      <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">
          Добавить новый тур
        </h2>
        <form
          action="/admin/tours/create"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-4"
        >
          <div>
            <label for="cover" class="block text-sm font-medium text-gray-700"
              >Обложка тура</label
            >
            <input
              type="file"
              id="cover"
              name="cover"
              accept=".jpg,.jpeg,.png,.webp"
              required
              class="w-full mt-2 p-2 border border-gray-300 rounded"
            />
          </div>
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700"
              >Наименование</label
            >
            <input
              type="text"
              id="name"
              name="name"
              required
              minlength="2"
              maxlength="100"
              class="w-full mt-2 p-2 border border-gray-300 rounded"
            />
          </div>
          <div>
            <label for="price" class="block text-sm font-medium text-gray-700"
              >Цена</label
            >
            <input
              type="number"
              id="price"
              name="price"
              required
              min="0"
              max="1000000"
              class="w-full mt-2 p-2 border border-gray-300 rounded"
            />
          </div>
          <div>
            <label
              for="duration"
              class="block text-sm font-medium text-gray-700"
              >Длительность в сутках</label
            >
            <input
              type="number"
              id="duration"
              name="duration"
              required
              min="1"
              max="100"
              class="w-full mt-2 p-2 border border-gray-300 rounded"
            />
          </div>
          <div>
            <label
              for="location"
              class="block text-sm font-medium text-gray-700"
              >Локация</label
            >
            <input
              type="text"
              id="location"
              name="location"
              required
              class="w-full mt-2 p-2 border border-gray-300 rounded"
            />
          </div>
          <div>
            <label
              for="description"
              class="block text-sm font-medium text-gray-700"
              >Описание</label
            >
            <textarea
              id="description"
              name="description"
              maxlength="1000"
              class="w-full mt-2 p-2 border border-gray-300 rounded"
            ></textarea>
          </div>

          <div class="flex justify-end space-x-4">
            <button
              type="button"
              onclick="closeModal('addTourModal')"
              class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400"
            >
              Отмена
            </button>
            <button
              type="submit"
              class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
            >
              Добавить тур
            </button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
