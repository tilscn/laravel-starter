<?php

use Illuminate\Support\Facades\Route;
use Tilscn\LaravelStarter\AuthController;

Route::group([

    'middleware' => 'api',
    'prefix' => 'api'

], function ($router) {

    Route::get('login', [AuthController::class, 'login']);
    Route::get('me', [AuthController::class, 'me'])->middleware('auth:api');
    Route::get('login2', [AuthController::class, 'login2'])->name('login');

});