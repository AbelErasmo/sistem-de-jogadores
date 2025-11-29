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

Route::middleware(['auth:sanctum', 'admin'])->prefix('admin')->name('api.admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/jogadores', [AdminController::class, 'index']);
    Route::get('/jogadores/{id}', [AdminController::class, 'show']);
    Route::put('/jogadores/{id}', [AdminController::class, 'update']);
    Route::delete('/jogadores/{id}', [AdminController::class, 'destroy']);
    Route::put('/perfil', [AdminController::class, 'perfilUpdate']);
});