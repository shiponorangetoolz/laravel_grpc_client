<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth/sign-up', [\App\Http\Controllers\AuthController::class, 'signUp']);
Route::post('/auth/sign-in', [\App\Http\Controllers\AuthController::class, 'signIn']);
Route::post('/shakil', [\App\Http\Controllers\AuthController::class, 'shakil']);
