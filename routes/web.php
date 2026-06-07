<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

Route::get('/', function(){return view('pages.home');})->name('principal');
Route::get('/login', [LoginController::class, 'realizarLogin'])->name('login');
Route::post('/login', [LoginController::class, 'realizarLogin'])->name('login');