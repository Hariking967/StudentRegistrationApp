@extends('layout')

@section('title','Register User')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-800">
        <div class="bg-gray-800 p-8 rounded shadow-md w-full max-w-md">
            <h1 class="text-3xl font-bold text-blue-600 mb-6 text-center">User Registration Form</h1>
            @if (session('message'))
                <div class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded mb-4 text-sm">
                    {{ session('message') }}
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="/register">
                @csrf

                <label for="name" class="block text-blue-600 mb-1">Name</label>
                <input id="name" name="name" value="{{ old('name') }}"
                       class="w-full mb-1 p-2 border rounded bg-white text-black" required>
                @error('name')
                    <p class="text-red-400 text-sm mb-2">{{ $message }}</p>
                @enderror

                <label for="email" class="block text-blue-600 mb-1">Official Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}"
                       class="w-full mb-1 p-2 border rounded bg-white text-black" required>
                @error('email')
                    <p class="text-red-400 text-sm mb-2">{{ $message }}</p>
                @enderror

                <label for="password" class="block text-blue-600 mb-1">Password</label>
                <input id="password" name="password" type="password"
                       class="w-full mb-1 p-2 border rounded bg-white text-black" required>
                @error('password')
                    <p class="text-red-400 text-sm mb-2">{{ $message }}</p>
                @enderror

                <label for="password_confirmation" class="block text-blue-600 mb-1">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                       class="w-full mb-6 p-2 border rounded bg-white text-black" required>

                <button type="submit"
                        class="w-full bg-blue-600 h-10 text-white py-2 rounded hover:bg-blue-500 transition duration-200">
                    Register
                </butt
