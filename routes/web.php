<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [\App\Http\Controllers\FrontController::class, 'index'])->name('index');
Route::get('/page', [\App\Http\Controllers\FrontController::class, 'about'])->name('about');
Route::get('/api',[\App\Http\Controllers\FrontController::class, 'api'])->name('api');
Route::get('/synergy',[\App\Http\Controllers\FrontController::class,'synergy'])->name('synergy');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\Cabinet\IndexController::class,'index'])->name('dashboard');
    Route::prefix('cabinet')->group(function (){
        Route::get('token',[\App\Http\Controllers\SanctumTockenController::class,'generateToken']);
    });
    Route::group(['middleware' => ['role:super-admin']], function () {
        Route::get('office',[\App\Http\Controllers\Cabinet\IndexController::class,'index'])->name('office');
    });
});
