<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Auth;

// Registration routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Dashboard routes (assuming you want these protected)
Route::middleware('auth')->group(function () {
    Route::get('/student/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');

    Route::get('/staff/dashboard', function () {
        return view('staff.dashboard');
    })->name('staff.dashboard');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Other routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::resource('users', UserController::class);

// Auth routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Manage Results (now open to any authenticated user)

    Route::get('/manageResult', [ResultController::class, 'index'])->name('manageResult.index');
    Route::get('/manageResult/create', [ResultController::class, 'create'])->name('manageResult.create');
    Route::post('/manageResult/store', [ResultController::class, 'store'])->name('manageResult.store');
    Route::get('/manageResult/{id}/edit', [ResultController::class, 'edit'])->name('manageResult.edit');
    Route::put('/manageResult/{id}', [ResultController::class, 'update'])->name('manageResult.update');
    Route::delete('/manageResult/{id}', [ResultController::class, 'destroy'])->name('manageResult.delete');

    Route::get('/results/subject/{subjectId}', [ResultController::class, 'showBySubject'])->name('results.showBySubject');


// Activity management routes
Route::get('/manageActivity/{id}/edit', [ActivityController::class, 'edit'])->name('manageActivity/edit');
Route::get('/manageActivity', [ActivityController::class, 'index'])->name('manageActivity');
Route::get('/manageActivity/create', [ActivityController::class, 'create'])->name('manageActivity/create');
Route::post('/manageActivity/store', [ActivityController::class, 'store'])->name('manageActivity/store');
Route::delete('/manageActivity/{id}', [ActivityController::class, 'delete'])->name('manageActivity/delete');
Route::put('/manageActivity/{id}', [ActivityController::class, 'update'])->name('manageActivity/update');
