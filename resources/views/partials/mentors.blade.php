<div class="sm:max-w-xl md:max-w-full md:px-24 lg:px-8 lg:py-20 w-full mr-auto ml-auto pt-16 pr-4 pb-16 pl-4"
     id="mentors">
    <div class="max-w-xl md:mx-auto sm:text-center lg:max-w-2xl md:mb-12 mr-auto mb-10 ml-auto">

        <div
            class="max-w-lg font-sans tracking-tight sm:text-4xl md:mx-auto text-gray-900 mr-auto mb-6 ml-auto">
            <div class="relative inline-block">
                <svg viewBox="0 0 52 24" fill="currentColor"
                     class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20
                text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                    <defs>
                        <pattern id="247432cb-6e6c-4bec-9766-564ed7c230dc" x="0" y="0"
                                 width=".135" height=".30">
                            <circle cx="1" cy="1" r=".7"></circle>
                        </pattern>
                    </defs>
                    <rect fill="url(#247432cb-6e6c-4bec-9766-564ed7c230dc)" width="52" height="24">
                    </rect>
                </svg>
                <p
                    class="relative inline max-w-lg font-sans tracking-tight sm:text-4xl md:mx-auto font-bold text-3xl
                leading-none text-gray-900">
                    Наша команда - наши менторы</p>
            </div>
            <p class="inline"></p>
        </div>
        <p class="md:text-lg text-base text-gray-700">Наши менторы профессионалы своего дела , уже много лет
            работают и
            участвуют в крутых проектах и у них есть чему научится</p>
    </div>
    <div
        class="gap-10 row-gap-8 sm:row-gap-10 lg:max-w-screen-lg sm:grid-cols-2 lg:grid-cols-3 grid mr-auto ml-auto">

@forelse($mentors as $mentor)

            <div class="max-w-2xl mx-4 sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-sm sm:mx-auto md:mx-auto lg:mx-auto xl:mx-auto mt-16 bg-white shadow-xl rounded-lg text-gray-900">
                <div class="rounded-t-lg h-32 overflow-hidden">
                    <img class="object-cover object-top w-full" src='{{ Storage::url($mentor->mentor_subject_image) }}' alt='Mentor subject photo'>
                </div>
                <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                    <img class="object-cover object-center h-32" src='{{ Storage::url( $mentor->mentor_image) }}' alt='Mentor photo'>
                </div>
                <div class="text-center mt-2">
                    <h2 class="font-semibold">{{$mentor->user->name}}</h2>
                    <p class="text-gray-500">{{$mentor->mentor_desc}}</p>
                </div>

                <div class="p-4 border-t mx-8 mt-2">
                    <button class="w-1/2 block mx-auto rounded-full bg-gray-900 hover:shadow-lg font-semibold text-white px-6 py-2">Follow</button>
                </div>
            </div>



        @empty
            <div class="max-w-2xl mx-4 sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-sm sm:mx-auto md:mx-auto lg:mx-auto xl:mx-auto mt-16 bg-white shadow-xl rounded-lg text-gray-900">
                <div class="rounded-t-lg h-32 overflow-hidden">
                    <img class="object-cover object-top w-full" src='https://images.unsplash.com/photo-1549880338-65ddcdfd017b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt='Mountain'>
                </div>
                <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                    <img class="object-cover object-center h-32" src='https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt='Woman looking front'>
                </div>
                <div class="text-center mt-2">
                    <h2 class="font-semibold">УПС :)</h2>
                    <p class="text-gray-500">Скоро появится ментор.....</p>
                </div>

                <ul class="py-4 mt-2 text-gray-700 flex items-center justify-around">
                    <li class="flex flex-col items-center justify-around">
                        <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                        <div>2k</div>
                    </li>
                    <li class="flex flex-col items-center justify-between">
                        <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z"/>
                        </svg>
                        <div>10k</div>
                    </li>
                    <li class="flex flex-col items-center justify-around">
                        <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z"/>
                        </svg>
                        <div>15</div>
                    </li>
                </ul>
                <div class="p-4 border-t mx-8 mt-2">
                    <button class="w-1/2 block mx-auto rounded-full bg-gray-900 hover:shadow-lg font-semibold text-white px-6 py-2">Follow</button>
                </div>
            </div>
        @endforelse

    </div>
</div>
</div>
</div>

