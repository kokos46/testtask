<?php

use App\Http\Controllers\UrlController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);

Route::get('/register', [UserController::class, 'registerPage']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'loginPage']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

Route::middleware(['auth'])->group(function() {
    Route::post('/createurl', [UrlController::class, 'createShortURL']);
    Route::get('/statistics/{id}', [UrlController::class, 'getStatistics']);
    Route::get('/allclicks', [UrlController::class, 'getAllStatistics']);
    Route::get('/delete/{id}', [UrlController::class, 'deleteLink']);
});

Route::get('/{code}', [UrlController::class, 'redirect']);