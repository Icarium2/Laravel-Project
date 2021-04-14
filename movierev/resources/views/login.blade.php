@extends('layouts.main')

@section('content')

@include('errors')

@if (\Session::has('status'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('status') !!}</li>
        </ul>
    </div>
@endif
<div class="flex my-10 mx-auto justify-center items-center w-32">
    <form action="login" method="post">
        @csrf
        <h2 class="my-3 text-2xl">Login</h2>
        <div>
            <label for="email">Email</label>
            <input name="email" id="email" type="email" class="text-black border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent ..." />
        </div>
        <div>
            <label for="password">Password</label>
            <input name="password" id="password" type="password" class="text-black border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent ..." />
        </div>
        <button type="submit" class="my-2 bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-opacity-50 px-2 ...">Login</button>
    </form>
</div>

<div class="flex items-center my-10 mx-auto justify-center w-32">
    <form action="register" method="post">
        @csrf
        <h2 class="my-3 text-2xl">Register</h2>
        <div>
            <label for="name">Username</label>
            <input type="text" name="name" id="name" class="text-black border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent ...">
        </div>
        <div>
            <label for="email">Email</label>
            <input name="email" id="email" type="email" class="text-black border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent ..." />
        </div>
        <div>
            <label for="password">Password</label>
            <input name="password" id="password" type="password" class="text-black border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent ..." />
        </div>
        <div>
            <label for="password-confirm">Confirm password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="text-black border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent ..." />
        </div>
        <button type="submit" class="my-2 bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-opacity-50 px-2 ...">Register</button>
    </form>

</div>

@endsection
