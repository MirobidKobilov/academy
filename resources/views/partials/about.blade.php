<div class="py-20 bg-cover bg-no-repeat bg-fixed container mx-auto"
     style="background-image: url({{ $aboutContent->about_bg ? Storage::url($aboutContent->about_bg) : asset('images/empty.jpg') }})"
     id="about">
    <div class="container m-auto text-center px-6 opacity-100">
        <h2 class="text-4xl font-bold mb-2 text-gray-800">{{ $aboutContent->about_title }}</h2>
        <h3 class="text-2xl mb-8 text-gray-800">{{ $aboutContent->about_short }}</h3>
        <p class="font-bold text-gray-800 p-8 uppercase tracking-wider hover:border-transparent hover:text-blue-500 hover:bg-gray-800">
            {{ $aboutContent->about_desc }}
        </p>
    </div>
</div>
