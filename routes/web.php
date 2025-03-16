<?php

use App\Http\Controllers\ProjetController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController; // Ajout du contrôleur Dashboard
use Illuminate\Support\Facades\Route;

// Route par défaut (page d'accueil)
Route::get('/', function () {
    return view('welcome');
});

// Routes d'authentification (générées par Breeze)
require __DIR__.'/auth.php';

// Routes protégées par authentification
Route::middleware('auth')->group(function () {
    // Route du tableau de bord (dashboard)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Routes pour les projets
    Route::resource('projets', ProjetController::class);

    // Routes pour les tâches
    Route::resource('taches', TacheController::class)->only(['index', 'store', 'destroy']);
    Route::delete('/projets/{projet}/taches/{tache}', [TacheController::class, 'destroy'])->name('projets.taches.destroy');

    // Route du tableau de bord (home) - Optionnel (vous pouvez la supprimer si vous utilisez /dashboard)
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});