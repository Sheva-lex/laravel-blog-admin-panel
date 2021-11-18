<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('main');

Auth::routes();

Route::get('/auth/redirect', [HomeController::class, 'redirect'])->name('redirect');

Route::get('/cabinet', [HomeController::class, 'cabinet'])->name('cabinet')->middleware('user.or.manager.role');


