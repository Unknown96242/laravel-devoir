<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;

Route::resource('articles', ArticleController::class)->names('articles');
Route::resource('categories', CategorieController::class)->names('categories');

