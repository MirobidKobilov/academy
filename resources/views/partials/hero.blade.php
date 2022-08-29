<section class="container mx-auto px-6 p-10">
    <div class="flex items-center flex-wrap my-20">
        <div class="w-full md:w-1/2">
            <img class="rounded-lg" src="{{ $content->hero_image ? Storage::url($content->hero_image) : asset('images/empty.jpg') }}" alt="hero-image"/>
        </div>
        <div class="w-full md:w-1/2 pl-10">
            <h4 class="text-3xl text-gray-800 font-bold mb-3">{{$content->title}}</h4>
            <p class="text-gray-600 mb-8">{{$content->content}}</p>
        </div>
    </div>

    <div class="flex items-center flex-wrap mb-20">
        <div class="w-full md:w-1/2 pr-10">
            <h4 class="text-3xl text-gray-800 font-bold mb-3">{{$content->title_2}}</h4>
            <p class="text-gray-600 mb-8">{{$content->content}} </p>
        </div>
        <div class="w-full md:w-1/2">
            <img class="rounded-lg" src="{{ $content->hero_image_2 ? Storage::url($content->hero_image_2) : asset('images/empty.jpg') }}" alt="hero-image"/>
        </div>
    </div>
</section>
