<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsTypeController;
use App\Http\Controllers\NewsController;

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
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/me', [AuthController::class, 'me']);


    Route::prefix('type')->group(function () {
        Route::get('me', [NewsTypeController::class, 'index']);
        Route::post('create', [NewsTypeController::class, 'store']);
        Route::post('update/{type_id}', [NewsTypeController::class, 'update']);
        Route::post('delete/{type_id}', [NewsTypeController::class, 'destroy']);
    });

    Route::prefix('news')->group(function () {
        Route::get('me', [NewsController::class, 'index']);
        Route::get('type/{type_id}', [NewsController::class, 'listByType']);
        Route::post('create', [NewsController::class, 'store']);
        Route::post('update/{news_id}', [NewsController::class, 'update']);
        Route::post('delete/{news_id}', [NewsController::class, 'destroy']);
    });


});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);