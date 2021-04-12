@extends('layouts.main')

@section('content')


<div class="flex justify-center align-center">
    <div class="flex justify-center flex-col text-center">
        <span>Image goes here</span>
        <h1 class="text-4xl"> {{$user->name}} </h1>
    </div>
    
</div>
<nav class="flex flex-col">
    <ul>
   <li> *MY REVIEWS </li>
   <li> *SETTINGS</li>
   <li> *WHATEVER</li>
    </ul>
</nav>






@endsection