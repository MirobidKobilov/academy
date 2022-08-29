<nav class="bg-gray-50 shadow-2xl fixed z-50 w-full">
    <div class="mx-auto px-4 ">
        <div class="flex justify-between">

            <div class="flex space-x-4">
                <!-- logo -->
                <div>
                    <a href="#" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                        <img src="{{asset('images/logo.png')}}" alt="Logo" class="h-10 w-30 mr-1 text-blue-400">
                    </a>
                </div>

                <!-- primary nav -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#about" class="py-5 px-3 text-gray-700 hover:text-blue-400">О нас</a>
                    <a href="#courses" class="py-5 px-3 text-gray-700 hover:text-blue-400">Курсы</a>
                    <a href="#price" class="py-5 px-3 text-gray-700 hover:text-blue-400">Цены</a>
                    <a href="#mentors" class="py-5 px-3 text-gray-700 hover:text-blue-400">Менторы</a>
                    <a href="#vacancies" class="py-5 px-3 text-gray-700 hover:text-blue-400">Вакансии</a>
                </div>
            </div>

            <!-- secondary nav -->
            <div class="hidden md:flex gap-5 items-center space-x-1">
                @auth
                    <a
                        href="{{ route('filament.pages.dashboard') }}"
                        class="py-2 px-5 bg-green-500 hover:bg-green-300 text-white rounded transition duration-300"
                    >
                        Панель управления
                    </a>
                @endauth
                @guest
                    <button
                        class="py-2 px-3 bg-blue-500 hover:bg-blue-300 text-white rounded transition duration-300"
                        onclick="toggleModal('modal-id')"
                    >
                        Поступить
                    </button>
                @endguest
            </div>

            <!-- mobile button goes here -->
            <div class="md:hidden flex items-center">
                <button class="mobile-menu-button">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- mobile menu -->
    <div class="mobile-menu hidden md:hidden">
        <a href="#about" class="block py-4 px-4 text-sm hover:bg-gray-200">О нас</a>
        <a href="#courses" class="block py-4 px-4 text-sm hover:bg-gray-200">Курсы</a>
        <a href="#price" class="block py-4 px-4 text-sm hover:bg-gray-200">Цены</a>
        <a href="#mentors" class="block py-4 px-4 text-sm hover:bg-gray-200">Менторы</a>
        <a href="#vacancies" class="block py-4 px-4 text-sm hover:bg-gray-200">Вакансии</a>

        <div class="flex items-center p-4 justify-between">
            @auth
                <a href="{{ route('filament.pages.dashboard') }}"
                   class="py-2 px-5 bg-green-500 hover:bg-green-300 text-white rounded transition duration-300"
                >
                    Панель управления
                </a>
            @endauth
            <button
                class="py-2 px-5 bg-blue-500 hover:bg-blue-300 text-white rounded transition duration-300"
                onclick="toggleModal('modal-id')">Поступить
            </button>
        </div>
    </div>
</nav>

<div id="modal-id" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full"
     class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full flex">
    <div class="application-modal relative p-4 w-full max-w-md h-full mx-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 mt-20">
            <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    onclick="toggleModal('modal-id')">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="py-6 px-6 lg:px-8">

                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Заполните Форму</h3>
                @livewire('admission-form')
            </div>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>

<script type="text/javascript">
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle('hidden')
        document.getElementById(modalID + '-backdrop').classList.toggle('hidden')
        document.getElementById(modalID).classList.toggle('flex')
        document.getElementById(modalID + '-backdrop').classList.toggle('flex')
    }
</script>
