<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/home', function () {
    return view('landing'); 
})->name('landing')->middleware('auth');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile.index');
    Route::post('/profile', [App\Http\Controllers\HomeController::class, 'update'])->name('profile.update');
});
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/manageActivity/{id}/edit', [App\Http\Controllers\activityController::class, 'edit'])->name('manageActivity/edit');
Route::get('/manageActivity', [App\Http\Controllers\activityController::class, 'index'])->name('manageActivity');
Route::get('/manageActivity/create', [App\Http\Controllers\activityController::class, 'create'])->name('manageActivity/create');
Route::post('/manageActivity/store', [App\Http\Controllers\activityController::class,'store'])->name('manageActivity/store');
Route::delete('/manageActivity/{id}', [App\Http\Controllers\activityController::class, 'delete'])->name('manageActivity/delete');
Route::put('/manageActivity/{id}', [App\Http\Controllers\ActivityController::class, 'update'])->name('manageActivity/update');
