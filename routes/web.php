<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;

Route::namespace('\App\Http\Controllers\Auth')->group(function () {
    Route::post('/auth/login', LoginController::class);
    Route::post('/auth/logout', LogoutController::class);
    Route::get('/auth/user', UserController::class);
});
