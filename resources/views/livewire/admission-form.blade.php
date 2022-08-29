<form class="space-y-6" wire:submit.prevent="invite" method="POST">
    @csrf
    <div>
        <label for="email"
               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">E-mail</label>
        <input type="email"
               wire:model="email"
               id="email"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
        >
        @error('email')<span class="text-red-600 mt-2 block">{{ $message }}</span>@enderror
    </div>
    <div>
        <label for="phone"
               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Номер телефона</label>
        <input type="text"
               wire:model="phone"
               id="phone"
               placeholder="+998990000000"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
        >
        @error('phone')<span class="text-red-600 mt-2 block">{{ $message }}</span>@enderror
    </div>
    <div>
        <label for="name"
               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Имя и Фамилия</label>
        <input type="text"
               wire:model="name"
               id="name"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
        >
        @error('name')<span class="text-red-600 mt-2 block">{{ $message }}</span>@enderror
    </div>
    <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Поступить
    </button>
</form>
