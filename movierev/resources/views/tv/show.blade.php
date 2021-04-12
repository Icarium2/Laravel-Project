@extends('layouts.main')

@section('content')

    <div>
        <p>{{ $tv['name'] }}</p>
        <p>{{ $tv['overview'] }}</p>
        <p>{{ $tv['vote_average']}}</p>
    </div>
    <div>
        <h2>Post a review</h2>
        <form action="/review" method="POST">
            @csrf
            <div>
                <input type="hidden" name="tv_id" id="tv_id" value="{{ $tv['id'] }}">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="50" rows="10" class="text-black"></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
    <div>
        <ul>
            @isset($reviews)
                @foreach ($reviews as $review)
                <li>
                    <p>{{ $review->content }}</p>
                </li>
                @endforeach
            @endisset
        </ul>
    </div>

@endsection
