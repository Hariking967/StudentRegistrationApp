<?php

use Illuminate\Support\Facades\Route;

use function Pest\Laravel\post;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/students/create', [StudentController::class, 'create'])->name('create');
    Route::post('/students', [StudentController::class, 'store'])->name('store');
    Route::get('/students', [StudentController::class, 'index'])->name('index');
    Route::get('/students/edit', [StudentController::class, 'layoutedit'])->name('layoutedit');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('show');
    Route::patch('/students/{student}', [StudentController::class, 'update'])->name('update');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('destroy');
});

Route::get('/register', [UserController::class, 'showRegisterForm'])->name('showRegisterForm');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('showForm');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::fallback(function () {
    return view('welcome')->with('message', 'Page not found!');
});
