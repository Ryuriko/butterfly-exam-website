<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PendidikController;
use App\Http\Controllers\PelajarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [Controller::class, 'authenticate'])->middleware('guest');
Route::get('/registration', [Controller::class, 'registration'])->middleware('guest');
Route::post('/registration', [Controller::class, 'store'])->middleware('guest');
Route::get('/logout', [Controller::class, 'logout'])->middleware('auth');

Route::resource('/pendidik', PendidikController::class)->middleware('auth');
Route::resource('/pelajar', PelajarController::class)->middleware('auth');