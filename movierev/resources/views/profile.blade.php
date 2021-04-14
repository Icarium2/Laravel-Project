@extends('layouts.main')

@section('content')
<div class="flex justify-center items-center m-10 p-10">
    <div class="flex justify-center flex-col text-center">
        <h1 class="text-4xl"> {{$user->name}} </h1>
        @if($user->avatar !== null)
            <img src="{{ asset($user->avatar) }}" alt="Profile picture" class="m-20 rounded-full w-32 h-32">
        @endif
        <ul class="flex flex-col p-1">
            <li>
                <a class="text-4xl text-blue-500 hover:text-blue-800" href="/settings">Account Settings</a>
            </li>
            <li>
                <a class="text-4xl text-blue-500 hover:text-blue-800" href="/user-reviews">My Reviews</a>
            </li>
        </ul>
    </div>
</div>

@endsection
