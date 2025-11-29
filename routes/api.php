<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JogadorController;
use App\Http\Controllers\AdminController;

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('jogadores', JogadorController::class)->except(['create', 'edit']);
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/jogadores', [AdminController::class, 'index'])->name('jogadores.index');
    Route::get('/jogador/{id}/editar', [AdminController::class, 'edit'])->name('jogador.edit');
    Route::post('/jogador/{id}/atualizar', [AdminController::class, 'update'])->name('jogador.update');
    Route::delete('/jogador/{id}', [AdminController::class, 'destroy'])->name('jogador.destroy');

    Route::get('/perfil', [AdminController::class, 'perfil'])->name('perfil');
    Route::post('/perfil/atualizar', [AdminController::class, 'perfilUpdate'])->name('perfil.update');
});