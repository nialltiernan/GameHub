<?php

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

Route::get('', [\App\Http\Controllers\HomeController::class, 'index'])->name('gamehub.index');

Route::get('games/{id}', [\App\Http\Controllers\GameController::class, 'show'])->name('game.show');

Route::get('platforms/', [\App\Http\Controllers\PlatformController::class, 'index'])->name('platforms.index');
Route::get('platforms/{id}', [\App\Http\Controllers\PlatformController::class, 'show'])->name('platforms.show');
