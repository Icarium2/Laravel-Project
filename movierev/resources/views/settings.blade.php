@extends('layouts.main')

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<div class="flex justify-center items-center mt-10 flex-col">
    <h1 class="mb-10">Account Settings</h1>
    <form action="/user/update" class="flex justify-center items-center flex-col max-w-sm" method="post">
     @csrf
        <label for="currentPassword">Password</label>
        <input class="text-black" type="password" name="currentPassword">
        <label for="newPassword">New Password</label>
        <input class="text-black" type="password" name="newPassword">
        <label for="confirmPassword">Confirm New Password</label>
        <input class="text-black" type="password" name="confirmPassword">
        
        <label for="email">Update Email</label>
        <input class="text-black" type="email" name="email">
            
        <button type="submit">Update Password</button>
    </form>

    <form action="/user/delete" class="mt-10 mb-10">
        @csrf
        @method('delete')
        <button type="submit">Delete account</button>
    </form>

</div>

@endsection