<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register()
    {
        $data = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed']
        ]);
        $exist = User::where('email', $data['email'])->first();
        if ($exist) {
            return redirect('/login')->with('message', 'User already exists login.');
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);
        return redirect('/students/create')->with('success', 'Registered successfully.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login()
    {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        $exist = User::where('email', $credentials['email'])->first();
        if (!$exist) {
            return redirect('/register')->with('message', 'No account found. Please register.');
        }
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect('/students/create')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')->with('success', 'Logged out successfully.');
    }
}
