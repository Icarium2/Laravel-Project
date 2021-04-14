@extends('layouts.main')

@section('content')
@include('errors')
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<div class="flex justify-center items-center mt-10 flex-col">
    <h2 class="mb-0.5 text-4xl">Account Settings</h2>
    <form action="/user/update" class="flex justify-center items-center flex-col max-w-sm m-2 p-14" method="post">
     @csrf
        <div>
            <label for="currentPassword" class="p-1">Old Password</label>
            <input class="text-black border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent ..." type="password" name="currentPassword">
        </div>
        <div>
            <label for="newPassword" class="p-1">New Password</label>
            <input class="text-black border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent ..." type="password" name="password">
        </div>
        <div>
            <label for="confirmPassword" class="p-1">Confirm New Password</label>
            <input class="text-black border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent ..." type="password" name="confirm_password">
        </div>
        <div>
            <label for="email" class="p-1">Update Email</label>
            <input class="text-black border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent ..." type="email" name="email">
        </div>
        <button type="submit" class="m-3 bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-opacity-50 px-2 ...">Update Settings</button>
    </form>
    <h2 class="mb-2 text-xl">Upload Avatar</h2>
    <form action="" method="POST" enctype="multipart/form-data" class="flex flex-col">
        @csrf
        @method('patch')
        <input type="file" name="avatar" class="border border-2 border-white w-52">
        <input type="submit" value="upload" class="m-10 bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-opacity-50 px-2 ...">
    </form>
    <h2 class="mb-5 text-xl">Delete Account</h2>
    <form action="/user/delete" class="mt-10 mb-10">
        @csrf
        @method('delete')
        <button class="bg-red-800 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-opacity-50 px-2 ..." type="submit">Delete Account</button>
    </form>
</div>
@endsection