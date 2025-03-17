<?php

use App\Http\Controllers\{ArticleController, PageController};
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homepage'])
    ->name('homepage');

Route::resource('/articles', ArticleController::class)->middleware('auth');
