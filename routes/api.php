<?php

use Illuminate\Support\Facades\Route;
use Tilscn\LaravelStarter\AuthController;

Route::group([

    'middleware' => 'api',
    'prefix' => 'api'

], function ($router) {

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('me', [AuthController::class, 'me'])->middleware('auth:api');

});