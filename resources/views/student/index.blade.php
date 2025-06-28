@extends('layout')

@section('title', 'Student List')

@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-800 p-6">
        <h1 class="text-5xl font-bold text-blue-600 mb-6">Student List</h1>
        <h2 class="text-3xl font-bold text-blue-600 mb-6">Total Students Registered: {{ $n }}</h2>
        @foreach ($students as $student)
            <div class="w-full max-w-xl bg-white text-blue-600 shadow-md rounded-lg p-4 mb-4">
                <div class="text-lg font-semibold">Roll No: {{ $student->rollno }}</div>
                <div>Name: {{ $student->name }}</div>
                <div>Personal Email: {{ $student->email }}</div>
                <div>Department: {{ $student->dept }}</div>
                <div>CGPA: {{ $student->cgpa }}</div>

                <div class="mt-4 flex justify-end space-x-4">
                    <a href="/students/{{ $student->id }}/edit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 transition">Edit</a>
                    <form action='/students/{{ $student->id }}' method='POST'>
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 " type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection