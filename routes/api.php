<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
<<<<<<< HEAD
=======

Route::middleware('apiToken')->group(function(){
    Route::post('/upload-users',[\App\Http\Controllers\Api\CheckUserController::class, 'uploadUser']);
    Route::post('/check-group-users',[\App\Http\Controllers\Api\CheckUserController::class, 'ckeckGroupUser']);
    Route::post('/check-user',[\App\Http\Controllers\Api\CheckUserController::class, 'checkOneUser']);
});




>>>>>>> 2c834df24b0f0b6f1633d56f1315cd3c697d6124
