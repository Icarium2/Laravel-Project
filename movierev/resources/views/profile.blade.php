@extends('layouts.main')

@section('content')



<div class="flex justify-center align-center p-10">
    <div class="flex justify-center flex-col text-center">
        <span class="p-10">Image goes here</span>
        <h1 class="text-4xl"> {{$user->name}} </h1>
    </div>
</div>  
<div class="container bg-gray-700 w-40 h-40">
<ul class="flex flex-col p-1">
    <li class="mr-6">
      <a class="text-blue-500 hover:text-blue-800" href="/settings">Account Settings</a>
    </li>
    <li class="mr-6">
      <a class="text-blue-500 hover:text-blue-800" href="/user-reviews">My Reviews</a>
    </li>
    <li class="mr-6">
      <a class="text-blue-500 hover:text-blue-800" href="#">Link</a>
    </li>
    <li class="mr-6">
      <a class="text-gray-400 cursor-not-allowed" href="#">Link</a>
    </li>
  </ul>
</div>






@endsection