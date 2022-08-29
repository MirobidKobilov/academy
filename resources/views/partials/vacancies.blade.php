<div id="vacancies" class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <div class="text-center">
        <p
            class="relative font-sans sm:text-4xl sm:leading-none inline font-bold text-3xl tracking-tight mr-0
                  text-gray-900">
            Вакансии</p>
        <p class="my-5 md:text-lg text-base text-gray-700">Если ты профессиональный и уверенный в себе
            Middle/Senior Laravel , vueJS developer то добро пожаловать в нашу команду</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">
        @foreach ($vacancies as $vacancy)
        <div class="rounded overflow-hidden shadow-lg">
            <a href="{{ route('vacancies.show', ['id' => $vacancy->id]) }}">
                <div class="relative">
                    <img class="w-full h-52" src="{{ Storage::url($vacancy->image) }}" alt="vacancy">
                    <div
                        class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                    </div>

                </div>
            </a>
            <div class="px-6 py-4">
                <a href="{{ route('vacancies.show', ['id' => $vacancy->id]) }}"
                    class="font-semibold text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out">{{ $vacancy->title }}</a>
                <p class="text-gray-500 text-sm">{{ $vacancy->short_text }}</p>
            </div>
            <div class="px-6 py-4 flex flex-row items-center">
                <span href="#" class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row items-center">

                    <span class="ml-1">{{ $vacancy->created_at }}</span></span>
            </div>
        </div>
        @endforeach
    </div>
</div>
