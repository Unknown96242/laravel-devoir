<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EnseignantController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/statistiques', [DashboardController::class, 'statistiques'])->name('statistiques');

Route::resource('enseignants', EnseignantController::class)->names('enseignants');
