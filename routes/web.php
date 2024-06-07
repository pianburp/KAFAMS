<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');

Route::get('/manageActivity/edit', [App\Http\Controllers\activityController::class, 'edit'])->name('edit');
Route::get('/manageActivity', [App\Http\Controllers\activityController::class, 'index'])->name('manageActivity');
Route::get('/manageActivity/create', [App\Http\Controllers\activityController::class, 'create'])->name('create');
Route::post('/manageActivity/store', [App\Http\Controllers\activityController::class,'store'])->name('store');