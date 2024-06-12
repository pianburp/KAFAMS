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

//admin
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin-home', [HomeController::class, 'adminHome'])->name('admin.home');
});




Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::resource('users', UserController::class);

// Auth routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<<<<<<< HEAD

// Manage Results

// Middleware
Route::middleware(['auth', 'isStaff'])->group(function () {
    Route::get('/manageResult', [App\Http\Controllers\ResultController::class, 'index'])->name('manageResult');
    Route::get('/manageResult/create', [App\Http\Controllers\ResultController::class, 'create'])->name('manageResult.create');
    Route::post('/manageResult/store', [App\Http\Controllers\ResultController::class, 'store'])->name('manageResult.store');
    Route::get('/manageResult/{id}/edit', [App\Http\Controllers\ResultController::class, 'edit'])->name('manageResult.edit');
    Route::put('/manageResult/{id}', [App\Http\Controllers\ResultController::class, 'update'])->name('manageResult.update');
    Route::delete('/manageResult/{id}', [App\Http\Controllers\ResultController::class, 'destroy'])->name('manageResult.delete');
});

Route::get('/results/subject/{subjectId}', [App\Http\Controllers\ResultController::class, 'showBySubject'])->middleware(['auth', 'isStudent'])->name('results.showBySubject');

Route::get('/manageResult', [App\Http\Controllers\ResultController::class, 'index'])->name('manageResult');

Route::get('/manageResult/create', [App\Http\Controllers\ResultController::class, 'create'])->name('manageResult.create');
Route::post('/manageResult/store', [App\Http\Controllers\ResultController::class,'store'])->name('manageResult.store');

Route::get('/manageResult/{id}/edit', [App\Http\Controllers\ResultController::class, 'edit'])->name('manageResult.edit');
Route::put('/manageResult/{id}', [App\Http\Controllers\ResultController::class, 'update'])->name('manageResult.update');

Route::delete('/manageResult/{id}', [App\Http\Controllers\ResultController::class, 'delete'])->name('manageResult.delete');


=======
>>>>>>> a8f6591bc11ea46b040eb1aff34f2d3daeaacc45
// Activity management routes
Route::get('/manageActivity/{id}/edit', [App\Http\Controllers\activityController::class, 'edit'])->name('manageActivity/edit');
Route::get('/manageActivity', [App\Http\Controllers\activityController::class, 'index'])->name('manageActivity');
Route::get('/manageActivity/create', [App\Http\Controllers\activityController::class, 'create'])->name('manageActivity/create');
Route::post('/manageActivity/store', [App\Http\Controllers\activityController::class,'store'])->name('manageActivity/store');
Route::delete('/manageActivity/{id}', [App\Http\Controllers\activityController::class, 'delete'])->name('manageActivity/delete');
Route::put('/manageActivity/{id}', [App\Http\Controllers\ActivityController::class, 'update'])->name('manageActivity/update');
