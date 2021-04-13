@extends('layouts.main')

@section('content')


    @isset($searchResults)
        <h1 class="px-10 pt-10 font-bold text-lg">Search results for {{ $query }}</h1>
        <div class="bg-gray-900 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 p-10">
            @foreach ($searchResults as $result)
                @if($loop->index < 20)
                    @if ($result['media_type'] === 'movie')
                        <div>
                            <a href="/movies/{{ $result['id'] }}">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $result['poster_path'] }}" alt="Movie Poster" class="rounded-md hover:opacity-70">
                            </a>
                            <a href="/movies/{{ $result['id'] }}" class="hover:opacity-70 lg:text-base xl:text-xl sm:text-xl font-bold">{{ $result['title'] }}</a>
                        </div>
                    @elseif($result['media_type'] === 'tv')
                        <div>
                            <a href="/tv/{{ $result['id'] }}">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $result['poster_path'] }}" alt="Movie Poster" class="rounded-md hover:opacity-70">
                            </a>
                            <a href="/tv/{{ $result['id'] }}" class="hover:opacity-70 lg:text-base xl:text-xl sm:text-xl font-bold">{{ $result['name'] }}</a>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
    @endisset

@endsection
