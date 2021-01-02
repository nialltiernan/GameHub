<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ListGameController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('gamehub.index');

Route::get('games/{id}', [GameController::class, 'show'])->name('game.show');

Route::get('platforms/', [PlatformController::class, 'index'])->name('platforms.index');
Route::get('platforms/{id}', [PlatformController::class, 'show'])->name('platforms.show');

Route::get('genres/', [GenreController::class, 'index'])->name('genres.index');
Route::get('genres/{id}', [GenreController::class, 'show'])->name('genres.show');

Route::get('login', [AuthController::class, 'showLogin'])->name('auth.showLogin');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('register', [AuthController::class, 'showRegister'])->name('auth.showRegister');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::middleware('auth')->group(function () {
    Route::get('account', [AccountController::class, 'index'])->name('account.index');
    Route::get('accountDelete', [AccountController::class, 'delete'])->name('account.delete');

    Route::get('changeEmail', [AuthController::class, 'showChangeEmail'])->name('auth.showChangeEmail');
    Route::post('changeEmail', [AuthController::class, 'changeEmail'])->name('auth.changeEmail');

    Route::get('changePassword', [AuthController::class, 'showChangePassword'])->name('auth.showChangePassword');
    Route::post('changePassword', [AuthController::class, 'changePassword'])->name('auth.changePassword');

    Route::get('users/{user}/lists/', [ListController::class, 'index'])->name('lists.index');
    Route::get('users/{user}/lists/{list}', [ListController::class, 'show'])->name('lists.show');
    Route::post('users/{user}/lists/', [ListController::class, 'store'])->name('lists.store');
    Route::delete('users/{user}/lists/{list}', [ListController::class, 'destroy'])->name('lists.destroy');

    Route::post('users/{user}/lists/{list}', [ListGameController::class, 'store'])->name('listGame.store');
    Route::delete('users/{user}/lists/{list}/{listGame}', [ListGameController::class, 'destroy'])->name('listGame.destroy');

});

Route::middleware('admin')->group(function () {
    Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback.index');
});
