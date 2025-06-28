@extends('layout')
@section('title','Register Student')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-800">
    <div class="bg-gray-800 p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-3xl font-bold text-blue-600 mb-6 text-center">Student Registration Form</h1>

        {{-- Global Error Box --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method='POST' action='/students'>
            @csrf

            <label for='rollno' class="block text-blue-600 mb-1">Roll Number</label>
            <input id='rollno' name='rollno' value="{{ old('rollno') }}" class="w-full mb-1 p-2 border rounded bg-white text-black" required>
            @error('rollno')
                <p class="text-red-400 text-sm mb-2">{{ $message }}</p>
            @enderror

            <label for='name' class="block text-blue-600 mb-1">Name</label>
            <input id='name' name='name' value="{{ old('name') }}" class="w-full mb-1 p-2 border rounded bg-white text-black" required>
            @error('name')
                <p class="text-red-400 text-sm mb-2">{{ $message }}</p>
            @enderror

            <label for='dob' class="block text-blue-600 mb-1">D.O.B.</label>
            <input id='dob' name='dob' type="date" value="{{ old('dob') }}" class="w-full mb-1 p-2 border rounded bg-white text-black" required>
            @error('dob')
                <p class="text-red-400 text-sm mb-2">{{ $message }}</p>
            @enderror

            <label for='email' class="block text-blue-600 mb-1">Personal Email ID</label>
            <input id='email' name='email' type="email" value="{{ old('email') }}" class="w-full mb-1 p-2 border rounded bg-white text-black" required>
            @error('email')
                <p class="text-red-400 text-sm mb-2">{{ $message }}</p>
            @enderror

            <label for='contact' class="block text-blue-600 mb-1">Contact</label>
            <input id='contact' name='contact' value="{{ old('contact') }}" class="w-full mb-1 p-2 border rounded bg-white text-black" required>
            @error('contact')
                <p class="text-red-400 text-sm mb-2">{{ $message }}</p>
            @enderror

            <label for="dept" class="block text-blue-600 mb-1">Department</label>
            <select id="dept" name="dept" class="w-full mb-1 p-2 border rounded bg-white text-black" required>
                <option value="">-- Select Department --</option>
                <option value="CSE" {{ old('dept') == 'CSE' ? 'selected' : '' }}>CSE</option>
                <option value="ECE" {{ old('dept') == 'ECE' ? 'selected' : '' }}>ECE</option>
                <option value="MECH" {{ old('dept') == 'MECH' ? 'selected' : '' }}>MECH</option>
                <option value="CIVIL" {{ old('dept') == 'CIVIL' ? 'selected' : '' }}>CIVIL</option>
                <option value="EEE" {{ old('dept') == 'EEE' ? 'selected' : '' }}>EEE</option>
            </select>
            @error('dept')
                <p class="text-red-400 text-sm mb-2">{{ $message }}</p>
            @enderror

            <label for='passout' class="block text-blue-600 mb-1">Passout</label>
            <input id='passout' name='passout' type='number' step="1" value="{{ old('passout') }}" class="w-full mb-6 p-2 border rounded bg-white text-black" required>
            @error('passout')
                <p class="text-red-400 text-sm mb-4">{{ $message }}</p>
            @enderror

            <button type='submit' class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-500 transition duration-200">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection
