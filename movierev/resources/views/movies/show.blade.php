@extends('layouts.main')

@section('content')

    <div class="container flex flex-col sm:flex-row p-10">
        <div>
            <img src="https://image.tmdb.org/t/p/w780/{{ $movie['poster_path'] }}" alt="Movie Poster" class="rounded-md">
        </div>
        <div class="ml-6">
            <p class="text-4xl mb-2">{{ $movie['title'] }}</p>
            <p class="mb-2">{{ $movie['overview'] }}</p>
            <p>Score: {{ $movie['vote_average']}}</p>
        </div>
    </div>
    <div class="container mx-auto flex flex-col p-10">
        <form action="/review" method="POST">
            @csrf
            <div class="flex flex-col">
                <input type="hidden" name="movie_id" id="movie_id" value="{{ $movie['id'] }}">
                <label for="content">Review this movie</label>
                <textarea class="rounded-md text-black p-2 h-48" name="content" id="content"></textarea>
            </div>
            <div class="inline-block mr-2 mt-2">
                <button type="submit" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">Submit</button>
             </div>
        </form>
    </div>
    <div class="container mx-auto">
        <h2 class="px-10 text-lg">Recent Reviews</h2>
        <ul class="w-full flex flex-col items-center p-10 ">
            @isset($reviews)
                @foreach ($reviews as $review)
                <li class="m-10 border border-solid border-gray-500 w-full rounded-md">
                    <p class="py-2 px-4">{{ $review->name }}</p>
                    @if ($review->user_id === Auth::id())
                        <div class="border border-solid border-gray-500 rounded-md p-2 mx-2 mb-2 overflow-auto relative">
                            <form action="{{ route('review.update', ['id' => $review->id]) }}" method="post" >
                                @csrf
                                @method('patch')
                                <textarea class="rounded-md text-black p-2 w-full" name="content" id="content">{{ $review->content }}</textarea>
                                <button type="submit" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">Update</button>
                            </form>
                            <form action="{{ route('review.delete', ['id' => $review->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-lg absolute bottom-2 right-2">Delete</button>
                            </form>
                        </div>
                    @else
                        <div class="border border-solid border-gray-500 rounded-md p-2 mx-2 mb-2 overflow-auto">
                            <p>{{ $review->content }}</p>
                        </div>
                    @endif
                </li>
                @endforeach
            @endisset
        </ul>
    </div>

@endsection
