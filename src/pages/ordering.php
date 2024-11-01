<!DOCTYPE html>
<html lang="ru">
<head>
  <? include("src/components/head.php") ?>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto py-10 px-6">
        <div class="bg-white max-w-lg mx-auto p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Оформление тура - Горы Кавказа</h2>

            <form action="/ordering" method="POST" class="space-y-5">
                <div>
                    <label for="persons" class="block text-sm font-medium text-gray-700">Количество человек</label>
                    <input type="number" id="persons" name="persons" required min="1" max="20" placeholder="1"
                           class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Дата начала</label>
                    <input type="date" id="start_date" name="start_date" required
                           class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition duration-300 mt-4">
                    Оплатить тур
                </button>
            </form>
        </div>
    </div>
</body>
</html>

</html>
