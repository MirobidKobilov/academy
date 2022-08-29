<div class="container md:px-24 lg:px-8 lg:py-20 mr-auto ml-auto pt-16 pr-4 pb-16 pl-4"
     id="courses">
    <div class="gap-6 row-gap-10 lg:grid-cols-2 grid">
        <div class="lg:py-6 lg:pr-16">
            @forelse($courses as $course)
                <div class="flex">
                    <div class="flex flex-col items-center mr-4">
                        <div class="">
                            <div class="border flex w-10 h-10 justify-center items-center rounded-full">
                                <p class="inline-block w-4 text-gray-600">
                                    <svg classname="w-4 text-gray-600"
                                         stroke="currentColor" strokewidth="2" strokelinecap="round"
                                         strokelinejoin="round" viewBox="0 0 24 24">
                                        <line fill="none" strokemiterlimit="10" x1="12" y1="2"
                                              x2="12" y2="22"></line>
                                        <polyline fill="none" strokemiterlimit="10" points="19,15 12,22 5,15">
                                        </polyline>
                                    </svg>
                                </p>
                            </div>
                        </div>
                        <div class="bg-gray-300 w-px h-full"></div>
                    </div>

                    <div class="pt-1 pb-8">
                        <p class="font-bold text-lg mb-2"></p>
                        <p class="text-gray-700"></p>
                    </div>

                    <div class="pt-1 pb-8">
                        <p class="font-bold text-lg mb-2">{{$course->course_title}}</p>
                        <p class="text-gray-700">{{$course->course_desc}}</p>
                    </div>
                </div>
            @empty

            @endforelse
        </div>

        <div class="relative"><img
                src="https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;w=500"
                class="h-96 w-full rounded inset-0 object-cover object-bottom lg:absolute lg:h-full shadow-lg"
                alt=""></div>
    </div>
</div>
