<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController; // Import your RegisterController

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
Route::get('/staff/dashboard', [StaffDashboardController::class, 'index'])->name('staff.dashboard');
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::resource('users', UserController::class);
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/manageActivity/{id}/edit', [App\Http\Controllers\activityController::class, 'edit'])->name('manageActivity/edit');
Route::get('/manageActivity', [App\Http\Controllers\activityController::class, 'index'])->name('manageActivity');
Route::get('/manageActivity/create', [App\Http\Controllers\activityController::class, 'create'])->name('manageActivity/create');
Route::post('/manageActivity/store', [App\Http\Controllers\activityController::class,'store'])->name('manageActivity/store');
Route::delete('/manageActivity/{id}', [App\Http\Controllers\activityController::class, 'delete'])->name('manageActivity/delete');
Route::put('/manageActivity/{id}', [App\Http\Controllers\ActivityController::class, 'update'])->name('manageActivity/update');
