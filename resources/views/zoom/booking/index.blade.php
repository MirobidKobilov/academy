<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Webparadox</title>
</head>
<body class="bg-gray-50 h-screen">
<script type="module" src="https://unpkg.com/@deckdeckgo/highlight-code@latest/dist/deckdeckgo-highlight-code/deckdeckgo-highlight-code.esm.js"></script>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-20">
    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-white uppercase bg-gray-700 w-full">
        <tr>
            <th scope="col" class="px-6 py-3">
                Слот
            </th>
            <th scope="col" class="px-6 py-3">
                Начало
            </th>
            <th scope="col" class="px-6 py-3">
                Длительность
            </th>
            <th scope="col" class="px-6 py-3">
                Выбрать
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($bookings as $booking)
            <form action="{{ 'create-meeting' }}" method="POST">
                @csrf
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        <div class="mb-5">
                            <label class="block mb-2 font-bold text-gray-600">Доступно</label>
                            <input type="hidden" id="topic" name="topic" value="Интервью" class="border border-gray-300 shadow p-3 w-full rounded">
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="mb-5">
                            <label class="block mb-2 font-bold text-gray-600">{{ $booking->free_to_zoom }}</label>
                            <input type="hidden" id="start_time" name="start_time" value="{{ $booking->free_to_zoom }}"  class="border border-gray-300 shadow p-3 w-full rounded">
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="mb-5">
                            <label class="block mb-2 font-bold text-gray-600">20</label>
                            <input type="hidden" id="duration" name="duration" value="20" class="border border-gray-300 shadow p-3 w-full rounded mb-">
                        </div>
                    </td>
                    <td class="px-2 py-4 text-center flex">
                        <button type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">Выбрать</button>
                    </td>
                </tr>
            </form>
        @empty
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    Здесь пусто
                </td>
                <td class="px-6 py-4">
                    Здесь пусто тоже э
                </td>
                <td class="px-6 py-4">
                    Здесь пусто ээээээ
                </td>
                <td class="px-6 py-4">
                    Здесь пусто РРРРррррр
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>


</body>
</html>


