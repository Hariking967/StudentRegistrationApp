<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    public function create()
    {
        $student = Student::where('officialemail', Auth::user()->email)->first();
        if ($student) {
            return redirect("/students/{$student->rollno}")->with('success', 'Student exists!');
        }
        if (session('success')) {
            return view('student.create')->with('success', 'Logged in successfully');
        }
        return view('student.create');
    }
    public function store()
    {
        $data = request()->validate([
            'rollno' => ['required', 'unique:students,rollno'],
            'name' => ['required'],
            'dob' => ['required', 'date'],
            'email' => ['required', 'email'],
            'contact' => ['required', 'numeric', 'digits:10'],
            'dept' => ['required'],
            'passout' => ['required', 'numeric', 'digits:4']
        ]);

        $data['officialemail'] = Auth::user()->email;

        try {
            $student = Student::create($data);
            return redirect("/students/{$student->rollno}")->with('success', 'Student added successfully!');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return back()
                    ->withErrors(['contact' => 'Contact number or email already exists.'])
                    ->withInput();
            }

            Log::error($e); // Log other errors
            return back()
                ->withErrors(['error' => 'Something went wrong. Please try again.'])
                ->withInput();
        }
    }
    public function index()
    {
        if (Auth::user()->email != 'admin@gmail.com') {
            $student = Student::where('officialemail', Auth::user()->email)->first();
            if (!$student) {
                return redirect('/students/create');
            }
            return redirect("/students/{$student->rollno}");
        }
        $students = Student::latest()->get();
        $n = Student::count();
        return view('student.index', ['students' => $students, 'n' => $n]);
    }
    public function show(Student $student)
    {
        $n = Student::count();
        return view('student.show', ['student' => $student, 'n' => $n]);
    }
    public function edit(Student $student)
    {
        return view('student.edit', ['student' => $student]);
    }
    public function layoutedit()
    {
        $student = Student::where('officialemail', Auth::user()->email)->first();
        return view('student.edit', ['student' => $student]);
    }
    public function update(Student $student)
    {
        $predata = Student::where('officialemail', $student->officialemail)->first();

        $data = request()->validate([
            'rollno' => ['required', Rule::unique('students', 'rollno')->ignore($student->id)],
            'name' => ['required'],
            'dob' => ['required', 'date'],
            'email' => ['required', 'email', Rule::unique('students', 'email')->ignore($student->id)],
            'contact' => ['required', Rule::unique('students', 'contact')->ignore($student->id), 'numeric', 'digits:10'],
            'dept' => ['required'],
            'passout' => ['required', 'numeric', 'digits:4']
        ]);

        $data['officialemail'] = $predata->officialemail;

        try {
            $student->update($data);
            if (Auth::user()->email == 'admin@gmail.com') {
                return redirect("/students")->with('success', 'Student updated successfully!');
            }
            return redirect("/students/{$student->rollno}")->with('success', 'Student updated successfully!');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return back()
                    ->withErrors(['contact' => 'Contact number or email already exists.'])
                    ->withInput();
            }

            Log::error($e);
            return back()
                ->withErrors(['error' => 'An unexpected error occurred while updating.'])
                ->withInput();
        }
    }

    public function destroy(Student $student)
    {
        $student->delete();
        if (Auth::user()->email == 'admin@gmail.com') {
            return redirect("/students");
        }
        return redirect("/students/create")->with('success', 'Student deleted successfully!');
    }
}
