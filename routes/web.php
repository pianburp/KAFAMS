<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController; // Added HomeController
use App\Http\Controllers\ActivityController; // Corrected ActivityController

Route::get('/', function () {
    return view('welcome');
});

// Registration routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Define the student, staff, and admin dashboard routes
Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->name('student.dashboard')->middleware('auth');

Route::get('/staff/dashboard', function () {
    return view('staff.dashboard');
})->name('staff.dashboard')->middleware('auth');

// Admin routes
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin-home', [HomeController::class, 'adminHome'])->name('admin.home');
});

// Login route
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Resourceful route for users
Route::resource('users', UserController::class);

// Auth routes (Laravel default authentication routes)
Auth::routes();

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Activity management routes
Route::get('/manageActivity/{id}/edit', [ActivityController::class, 'edit'])->name('manageActivity.edit'); // Changed to dot notation
Route::get('/manageActivity', [ActivityController::class, 'index'])->name('manageActivity.index'); // Changed to dot notation
Route::get('/manageActivity/create', [ActivityController::class, 'create'])->name('manageActivity.create'); // Changed to dot notation
Route::post('/manageActivity/store', [ActivityController::class, 'store'])->name('manageActivity.store'); // Changed to dot notation
Route::delete('/manageActivity/{id}', [ActivityController::class, 'delete'])->name('manageActivity.delete');
Route::put('/manageActivity/{id}', [ActivityController::class, 'update'])->name('manageActivity.update');

