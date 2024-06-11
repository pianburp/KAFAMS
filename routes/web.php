<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResultController;

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

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth');

// Other routes
Route::get('/', function () {
    return view('welcome'); // Assuming you have a Blade template named 'welcome.blade.php'
});

Route::get('/results', [ResultController::class, 'index'])->name('results.index');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::resource('users', UserController::class);

// Auth routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Activity management routes
Route::get('/manageActivity/{id}/edit', [App\Http\Controllers\activityController::class, 'edit'])->name('manageActivity/edit');
Route::get('/manageActivity', [App\Http\Controllers\activityController::class, 'index'])->name('manageActivity');
Route::get('/manageActivity/create', [App\Http\Controllers\activityController::class, 'create'])->name('manageActivity/create');
Route::post('/manageActivity/store', [App\Http\Controllers\activityController::class,'store'])->name('manageActivity/store');
Route::delete('/manageActivity/{id}', [App\Http\Controllers\activityController::class, 'delete'])->name('manageActivity/delete');
Route::put('/manageActivity/{id}', [App\Http\Controllers\ActivityController::class, 'update'])->name('manageActivity/update');
