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
    Route::get('packet-page',[\App\Http\Controllers\Cabinet\IndexController::class,'packetPage'])->name('packet-page');
    Route::post('/submit-email',[\App\Http\Controllers\Cabinet\EmployeeController::class, 'emailForm'])->name('submit-email');
    Route::post('send/claim',[\App\Http\Controllers\Cabinet\EmployeeController::class,'claim'])->name('send-claim');

    Route::get('partner-form',[\App\Http\Controllers\Cabinet\IndexController::class, 'companyForm'])->name('partner-form');
    Route::post('claim-succsess/{id}',[\App\Http\Controllers\Cabinet\ClaimController::class, 'claimSuccsess'])->name('claim-succsess');
    Route::get('claim-delete/{id}',[\App\Http\Controllers\Cabinet\ClaimController::class, 'claimDel'])->name('del-claim');

    Route::get('user/{id}/partners',[\App\Http\Controllers\Cabinet\PartnerController::class,'index'])->name('user-companies');
    Route::get('partner/{id}',[\App\Http\Controllers\Cabinet\PartnerController::class, 'show'])->name('page-partner');
    Route::post('create-partner',[\App\Http\Controllers\Cabinet\PartnerController::class, 'create'])->name('create-partner');
    Route::post('update-partner/{id}',[\App\Http\Controllers\Cabinet\PartnerController::class, 'update'])->name('update-partner');
    Route::post('check/code',[\App\Http\Controllers\Cabinet\CodeController::class, 'checkCode'])->name('save-intermediary');

    Route::get('payment/{count}',[\App\Http\Controllers\Cabinet\PaymentController::class,'createPayment'])->name('payment-create');
    Route::get('/payment/save/{count}',[\App\Http\Controllers\Cabinet\PaymentController::class, 'savePayment'])->name('save-payment');
    Route::get('/payment/{id}/oncheck',[\App\Http\Controllers\Cabinet\PaymentController::class,'oncheck'])->name('oncheck-payment');


    Route::post('check',[\App\Http\Controllers\Cabinet\CodeController::class, 'checkCode'])->name('check');
    Route::post('add-check-user',[\App\Http\Controllers\Cabinet\CodeController::class, 'addCode'])->name('add-code');

    Route::prefix('cabinet')->group(function (){
        Route::get('my-cabinet',[\App\Http\Controllers\Cabinet\IndexController::class, 'cabinetIndex'])->name('my-cabinet')->middleware('superadmin');
        Route::get('token',[\App\Http\Controllers\SanctumTockenController::class,'generateToken']);
    });
    Route::group(['middleware' => ['role:super-admin']], function () {
        Route::get('office',[\App\Http\Controllers\Cabinet\IndexController::class,'index'])->name('office');
    });
});
