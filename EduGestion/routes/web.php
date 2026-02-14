<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantISController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/statistiques', [DashboardController::class, 'statistiques'])->name('statistiques');

Route::get('/etudiants/list', [EtudiantISController::class, 'list'])->name('etudiants.list');


Route::resource('etudiants', EtudiantISController::class);
