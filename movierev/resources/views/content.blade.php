@extends('layouts.main')

{{-- @section('search')

    @isset($searchResults)
    <div class="absolute top-16 mr-14 border border-solid border-gray-800 p-2 rounded-md bg-gray-900">
        @foreach ($searchResults as $result)
        @if($loop->index < 4)
        <div>
            @if ($result['media_type'] === 'movie')
            <a href="/movies/{{ $result['id'] }}">{{ $result['title'] }}</a>
            @else
            <a href="/tv/{{ $result['id'] }}">{{ $result['name'] }}</a>
            @endif
        </div>
        @endif
        @endforeach
    </div>
    @endisset

@endsection --}}

@section('content')

<div class="container mx-auto px-4 pt-16 flex lg:justify-center items-center lg:flex-row flex-col">
    <div class="trending lg:w-1/4 w-3/4 border border-black bg-white m-10 md:flex-shrink-0">
        <h2 class="text-black">Trending Movies</h2>
        @foreach ($popularMovies as $movie)

            @if ($loop->index < 4)
                <x-movie-card :movie="$movie" />
            @endif

        @endforeach

    </div>

    <div class="trending lg:w-1/4 w-3/4 border border-black bg-white m-10 md:flex-shrink-0">
        <h2 class="text-black">Trending TV Shows</h2>
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
