<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Public Home Page
Route::get('/', function () {
    return view('welcome');
});

// Guest Routes (Login and Registration)
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/register', [AuthController::class, 'register']);

});

// Authenticated Routes
Route::middleware('auth')->group(function () {

    // Course Routes
    Route::resource('courses', CourseController::class);

    // Student Routes
    Route::resource('students', StudentController::class);

    // Logout Route (POST)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});
