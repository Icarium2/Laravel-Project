@extends('layouts.main')

@section('content')

    <div>
        <p>{{ $movie['title'] }}</p>
        <p>{{ $movie['overview'] }}</p>
        <p>{{ $movie['vote_average']}}</p>
    </div>
    <div>
        <h2>Post a review</h2>
        <form action="/review" method="POST">
            @csrf
            <div>
                <input type="hidden" name="movie_id" id="movie_id" value="{{ $movie['id'] }}">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="50" rows="10" class="text-black"></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
    <div>
        <ul>
            @foreach ($reviews as $review)
                <li>
                    <p>{{ $review->content }}</p>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
