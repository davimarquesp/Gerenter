<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;

// Primeira tela: login
Route::get('/', fn () => redirect()->route('login'));

// Rotas protegidas (só logado)
Route::middleware(['auth'])->group(function () {

    // Dashboard com gráfico
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD de Projetos
    Route::resource('projects', ProjectController::class)->except(['show']);

    // Perfil (nome, email, cpf)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Rotas do Breeze (login/register/logout etc.)
require __DIR__.'/auth.php';