@extends('layouts.master')
@section('content')
@include('partials.navbar')
<div class="py-20 container mx-auto">
    <div class="container m-auto text-center px-6 opacity-100">
        <h2 class="text-4xl font-bold mb-2 text-gray-800">{{ $vacancy->title }}</h2>
        <h3 class="text-2xl mb-8 text-gray-800">{{ $vacancy->short_text }}</h3>
        <p class="text-gray-800 p-8 uppercase tracking-wider">
            {{ $vacancy->description }}
        </p>
        <button
                class="py-2 px-5 bg-blue-500 hover:bg-blue-300 text-white rounded transition duration-300"
                onclick="toggleModal('modal-application')">Оставить отклик
            </button>
    </div>
</div>

<div id="modal-application" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="application-modal relative p-4 w-full max-w-md h-full mx-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 mt-20">
            <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    onclick="toggleModal('modal-application')">
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
                <form class="space-y-6" action="{{ route('vacancies.apply', ['id' => $vacancy->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Имя</label>
                        <input type="text" name="first_name" id="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        @error('first_name')
                            <span class="text-red-600 mt-2 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Фамилия</label>
                        <input type="text" name="last_name" id="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        @error('last_name')
                            <span class="text-red-600 mt-2 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">E-mail</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        @error('email')
                            <span class="text-red-600 mt-2 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Номер
                            телефона</label>
                        <input type="text" name="phone" id="phone" placeholder="+998990000000"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        @error('phone')
                            <span class="text-red-600 mt-2 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">О себе</label>
                        <textarea type="text" cols="30" rows="10" name="description" id="description" placeholder="о себе"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                        @error('description')
                            <span class="text-red-600 mt-2 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="resume" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Резюме</label>
                        <input type="file" name="resume" id="resume"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        @error('resume')
                            <span class="text-red-600 mt-2 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Оставить отклик
                    </button>
                </form>
                
            </div>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-application-backdrop"></div>

<script type="text/javascript">
    function toggleModal(modalApplication) {
        document.getElementById(modalApplication).classList.toggle('hidden')
        document.getElementById(modalApplication + '-backdrop').classList.toggle('hidden')
        document.getElementById(modalApplication).classList.toggle('flex')
        document.getElementById(modalApplication + '-backdrop').classList.toggle('flex')
    }
</script>
@endsection