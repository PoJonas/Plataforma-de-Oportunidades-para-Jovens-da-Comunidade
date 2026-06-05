<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

Route::get('/', function(){
    return view('pages.home');
})->name('principal');


Route::get('/login', function(){
    return view('login.login');
})->name('login');