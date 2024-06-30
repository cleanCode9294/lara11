<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::controller(Controllers\AuthController::class)->prefix('auth')->group(function () {
        Route::post('register', 'register');
    });
});




