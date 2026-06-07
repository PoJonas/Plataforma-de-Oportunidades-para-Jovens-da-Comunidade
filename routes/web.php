<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

Route::get('/', function () {
    return view('pages.home');
})->name('principal');
Route::get('/login', [LoginController::class, 'getLogin'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('auth');

// Rotas que apenas um usuário logado vai ter acesso
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return 'ola';
    })->name('dashboard');
    Route::get('/adicionarVaga', function () {
        return view('');
    })->name('adicionarVaga');
    Route::get('/adicionarCurso', function () {
        return view('');
    })->name('adicionarCurso');
    Route::get('/adicionarProjeto', function () {
        return view('');
    })->name('adicionarProjeto');
});

// Rotas de cadastro
Route::get('/cadastro', [CadastroController::class, 'Cadastrar'])->name('cadastro');
Route::post('/cadastro', [CadastroController::class, 'realizarCadastro'])->name('cadastro.Cadastrar');

// Rotas: vagas,curso, projetos
Route::get('/adicionarProjeto', function () {
    return view('');
})->name('adicionarProjeto');
Route::get('/adicionarProjeto', function () {
    return view('');
})->name('adicionarProjeto');
Route::get('/adicionarProjeto', function () {
    return view('');
})->name('adicionarProjeto');
