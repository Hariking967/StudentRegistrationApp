@extends('layout')

@section('title','Welcome')

@section('content')
@if (session('message'))
    <div class="bg-red-500 text-white px-4 py-2 rounded mb-4 text-sm">
        {{ session('message') }}
    </div>
@endif
<div class="flex flex-col items-center justify-center min-h-screen text-center">
    <h1 class="text-5xl">
        Welcome to Student Registration!!!
    </h1><br/>
    <h2 class="text-4xl">
        <a href='/login' class="cursor-pointer underline">Sign IN</a> OR 
        <a href='/register' class="cursor-pointer underline">Sign UP</a> to continue!
    </h2>
</div>
@endsection