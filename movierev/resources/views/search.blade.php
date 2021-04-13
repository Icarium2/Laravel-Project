@extends('layouts.main')

@section('content')


    @isset($searchResults)
    <div class="bg-gray-900">
        @foreach ($searchResults as $result)
        @if($loop->index < 4)
            <div>
                @if ($result['media_type'] === 'movie')
                    <a href="/movies/{{ $result['id'] }}">{{ $result['title'] }}</a>
                @else
                    </td><a href="/tv/{{ $result['id'] }}">{{ $result['name'] }}</a>
                @endif
            </div>
        @endif
        @endforeach
    </div>
    @endisset

@endsection
