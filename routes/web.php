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

Route::get('/', [Controller::class, 'index']);
Route::post('/', [Controller::class, 'authenticate']);
Route::get('/registration', [Controller::class, 'registration']);
Route::post('/registration', [Controller::class, 'store']);

Route::resource('/pendidik', PendidikController::class);
Route::resource('/pelajar', PelajarController::class);