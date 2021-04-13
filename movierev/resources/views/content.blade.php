@extends('layouts.main')

@section('content')

<div class="container mx-auto px-4 pt-10 flex lg:justify-center items-center lg:flex-row flex-col">
    <div class="container lg:w-2/5 w-3/4 border border-black bg-white m-10 md:flex-shrink-0 p-4 rounded-md">
        <h2 class="text-black font-bold text-lg">Trending Movies</h2>
        @foreach ($popularMovies as $movie)

            @if ($loop->index < 4)
                <x-movie-card :movie="$movie" />
            @endif

        @endforeach

    </div>

    <div class="container lg:w-2/5 w-3/4 border border-black bg-white m-10 md:flex-shrink-0 p-4 rounded-md">
        <h2 class="text-black font-bold text-lg">Trending TV Shows</h2>
        @foreach ($popularTvShows as $tv)

            @if ($loop->index < 4)
                <x-tv-card :tv="$tv" />
            @endif

        @endforeach

    </div>
    {{-- <div class="trending lg:w-1/4 w-3/4 border border-black bg-white m-10 md:flex-shrink-0">
        <h2 class="text-black">Newest Reviewed Movies</h2>
        @foreach ($newestReviewed as $item)
            @if ($loop->index < 4)
                <x-newest-card :item="item" />
            @endif
        @endforeach
    </div> --}}

</div>

@endsection
