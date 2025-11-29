<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JogadorController;
use App\Http\Controllers\AdminController;

Route::get('/', );

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/inscricao', [JogadorController::class, 'create'])->name('jogador.create');
Route::post('/inscricao', [JogadorController::class, 'store'])->name('jogador.store');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [JogadorController::class, 'dashboard'])->name('jogador.dashboard');
    Route::get('/editar', [JogadorController::class, 'edit'])->name('jogador.editar');
    Route::put('/editar', [JogadorController::class, 'update'])->name('jogador.update');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('jogadores', AdminController::class)->except(['create', 'store', 'show']);
    Route::get('/perfil', [AdminController::class, 'perfil'])->name('perfil');
    Route::put('/perfil', [AdminController::class, 'perfilUpdate'])->name('perfil.update');
});

