@extends('layouts.main')

@section('content')

@include('errors')
<div class="container flex my-10 mx-auto justify-center w-32">
    <form action="login" method="post">
        @csrf
        <h2>Login</h2>
        <div>
            <label for="email">Email</label>
            <input name="email" id="email" type="email" class="text-black" />
        </div>
        <div>
            <label for="password">Password</label>
            <input name="password" id="password" type="password" class="text-black" />
        </div>
        <button type="submit">Login</button>
    </form>
</div>

<div class="container flex my-10 mx-auto justify-center w-32">
    <form action="register" method="post" class="text-color-black">
        @csrf
        <h2>Register</h2>
        <div>
            <label for="email">Email</label>
            <input name="email" id="email" type="email" class="text-black" />
        </div>
        <div>
            <label for="password">Password</label>
            <input name="password" id="password" type="password" class="text-black" />
        </div>
        <div>
            <label for="password-confirm">Confirm password</label>
            <input type="password" id="password-confirm" name="password-confirm" class="text-black" />
        </div>
        <button type="submit">Register</button>
    </form>

</div>

@endsection
