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

Route::get('login', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('auth.showLogin');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');

Route::get('register', [\App\Http\Controllers\AuthController::class, 'showRegister'])->name('auth.showRegister');
Route::post('register', [\App\Http\Controllers\AuthController::class, 'register'])->name('auth.register');

Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
