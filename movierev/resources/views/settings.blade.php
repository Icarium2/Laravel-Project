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
    <h1 class="mb-10 text-4xl">Account Settings</h1>
    <form action="/user/update" class="flex justify-center items-center flex-col max-w-sm m-14 p-14" method="post">
     @csrf
        <label for="currentPassword" class="p-1">Password</label>
        <input class="text-black border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent ..." type="password" name="currentPassword">
        <label for="newPassword" class="p-1">New Password</label>
        <input class="text-black border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent ..." type="password" name="newPassword">
        <label for="confirmPassword" class="p-1">Confirm New Password</label>
        <input class="text-black border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent ..." type="password" name="confirmPassword">
        
        <label for="email" class="p-1">Update Email</label>
        <input class="text-black border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent ..." type="email" name="email">
            
        <button type="submit" class="m-10 bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-opacity-50 px-2 ...">Update Settings</button>
    </form>

    <form action="/user/delete" class="mt-10 mb-10">
        @csrf
        @method('delete')
        <button class="bg-red-800 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-opacity-50 px-2 ..." type="submit">Delete Account</button>
    </form>

</div>

@endsection