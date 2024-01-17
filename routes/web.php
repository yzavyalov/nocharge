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

        Route::get('/cabinet/about',[\App\Http\Controllers\Cabinet\PageController::class, 'about'])->name('cabinet-about');
        Route::get('/cabinet/membership',[\App\Http\Controllers\Cabinet\PageController::class, 'membership'])->name('cabinet-membership');
        Route::get('/cabinet/black-list',[\App\Http\Controllers\Cabinet\PageController::class, 'blackList'])->name('cabinet-blacklist');

        Route::post('/submit-email',[\App\Http\Controllers\Cabinet\EmployeeController::class, 'emailForm'])->name('submit-email');
        Route::post('send/claim',[\App\Http\Controllers\Cabinet\EmployeeController::class,'claim'])->name('send-claim');

        Route::get('partner-form',[\App\Http\Controllers\Cabinet\IndexController::class, 'companyForm'])->name('partner-form');
        Route::post('claim-succsess/{id}',[\App\Http\Controllers\Cabinet\ClaimController::class, 'claimSuccsess'])->name('claim-succsess');
        Route::get('claim-delete/{id}',[\App\Http\Controllers\Cabinet\ClaimController::class, 'claimDel'])->name('del-claim');

        Route::get('user/{id}/partners',[\App\Http\Controllers\Cabinet\PartnerController::class,'index'])->name('user-companies');
        Route::get('partner/{id}',[\App\Http\Controllers\Cabinet\PartnerController::class, 'show'])->name('page-partner')->middleware('checkroute');
        Route::get('partner/{id}/delete',[\App\Http\Controllers\Cabinet\PartnerController::class, 'delete'])->name('del-partner')->middleware('checkroute');
        Route::post('create-partner',[\App\Http\Controllers\Cabinet\PartnerController::class, 'create'])->name('create-partner');
        Route::post('update-partner/{id}',[\App\Http\Controllers\Cabinet\PartnerController::class, 'update'])->name('update-partner')->middleware('checkroute');


        Route::get('packet-page',[\App\Http\Controllers\Cabinet\IndexController::class,'packetPage'])->name('packet-page');
        Route::get('payment/{count}',[\App\Http\Controllers\Cabinet\PaymentController::class,'createPayment'])->name('payment-create');
        Route::get('/payment/save/{count}',[\App\Http\Controllers\Cabinet\PaymentController::class, 'savePayment'])->name('save-payment');
        Route::get('/payment/{id}/oncheck',[\App\Http\Controllers\Cabinet\PaymentController::class,'oncheck'])->name('oncheck-payment');

        Route::get('token/{id}/update',[\App\Http\Controllers\TokenController::class,'update'])->name('token-update');

    Route::middleware('activeToken')->group(function () {
            Route::post('check', [\App\Http\Controllers\Cabinet\CodeController::class, 'checkCode'])->name('check');
            Route::post('add-check-user',[\App\Http\Controllers\Cabinet\CodeController::class, 'addCheckUsers'])->name('addCheckUsers');

            Route::get('review/all',[\App\Http\Controllers\Cabinet\ReviewController::class, 'index'])->name('index-review');
            Route::get('review/search',[\App\Http\Controllers\Cabinet\ReviewController::class,'select'])->name('search-review');
            Route::get('review/{id}',[\App\Http\Controllers\Cabinet\ReviewController::class, 'show'])->name('show-review');
            Route::post('review/create',[\App\Http\Controllers\Cabinet\ReviewController::class, 'create'])->name('save-review');

            Route::post('review/{id}/comment/create',[\App\Http\Controllers\Cabinet\CommentController::class,'create'])->name('save-comment');
            Route::get('review/comment/{id}/show',[\App\Http\Controllers\Cabinet\CommentController::class,'show'])->name('show-comment');
            Route::post('review/comment/{id}/update',[\App\Http\Controllers\Cabinet\CommentController::class,'update'])->name('update-comment');
            Route::get('review/comment/{id}/delete',[\App\Http\Controllers\Cabinet\CommentController::class,'delete'])->name('delete-comment');

        });



    Route::middleware('superadmin')->group(function () {
        Route::get('my-cabinet',[\App\Http\Controllers\Cabinet\IndexController::class, 'cabinetIndex'])->name('my-cabinet')->middleware('superadmin');
        Route::get('token',[\App\Http\Controllers\SanctumTockenController::class,'generateToken']);

        Route::get('office',[\App\Http\Controllers\Cabinet\IndexController::class,'index'])->name('office');
        Route::get('payment/{id}/delete',[\App\Http\Controllers\Cabinet\PaymentController::class,'delete'])->name('del-payment');
        Route::get('payment/{id}/paid',[\App\Http\Controllers\Cabinet\PaymentController::class,'paidPayment'])->name('paid-payment');
        Route::get('payment/{id}/unpaid',[\App\Http\Controllers\Cabinet\PaymentController::class,'unpaidPayments'])->name('unpaid-payment');
    });

});
