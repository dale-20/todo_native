<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;



Route::get('/', function () {return view('home');})->name('home');
Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth.check')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('showProfile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile');
});
Route::middleware('auth.check')->group(function () {
    Route::resource('tasks', TaskController::class);
});