@extends('layouts.main')

@section('content')
    <h1 class="px-10 pt-10 font-bold text-lg">Popular Movies</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 p-10">
        @foreach ($popularMovies as $movie)
            <div>
                <a href="/movies/{{ $movie['id'] }}">
                    <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="Movie Poster" class="rounded-md hover:opacity-70">
                </a>
                <a href="/movies/{{ $movie['id'] }}" class="hover:opacity-70 lg:text-base xl:text-xl sm:text-xl font-bold">{{ $movie['title'] }}</a>
            </div>
        @endforeach
    </div>
@endsection
