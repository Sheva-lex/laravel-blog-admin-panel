<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::resource('/posts', PostController::class)->except(['show']);
Route::resource('/tags', TagController::class)->except(['index', 'create', 'update', 'show']);
