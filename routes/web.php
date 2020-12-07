<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlatformController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('gamehub.index');

Route::get('games/{id}', [GameController::class, 'show'])->name('game.show');

Route::get('platforms/', [PlatformController::class, 'index'])->name('platforms.index');
Route::get('platforms/{id}', [PlatformController::class, 'show'])->name('platforms.show');

Route::get('login', [AuthController::class, 'showLogin'])->name('auth.showLogin');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');

Route::get('register', [AuthController::class, 'showRegister'])->name('auth.showRegister');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');

Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback.index')->middleware('admin');
Route::get('feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store');
