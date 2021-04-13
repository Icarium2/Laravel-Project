<div class="w-full bg-gray-300 flex items-center my-3 rounded-md">
    <a href="/movies/{{ $movie['id'] }}" class="w-1/4 lg:w-1/5 m-2 bg-white hover:opacity-70">
        <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="Movie Poster" class="rounded-md">
    </a>
    <div class="w-3/4 p-2">
        <div class="flex flex-col">
            <span class="text-black hover:opacity-70 lg:text-base xl:text-xl sm:text-xl font-bold"><a href="/movies/{{ $movie['id'] }}">{{ $movie['title'] }}</a></span>
            <span class="text-black xl:text-sm sm:text-sm md:text-base">
                @php
                echo substr($movie['overview'], 0 , 100) . '...';
                @endphp
            </span>
        </div>
        <div class="mx-auto w-full flex justify-between">
            <span class="text-black">Score: {{ $movie['vote_average'] }}</span>
            <span class="text-black">Reviews</span>
        </div>
    </div>
</div>
