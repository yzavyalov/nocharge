<?php

use App\Http\Controllers\Cabinet\AnswerController;
use App\Http\Controllers\Cabinet\ClaimController;
use App\Http\Controllers\Cabinet\CodeController;
use App\Http\Controllers\Cabinet\CommentController;
use App\Http\Controllers\Cabinet\EmployeeController;
use App\Http\Controllers\Cabinet\IndexController;
use App\Http\Controllers\Cabinet\MessageController;
use App\Http\Controllers\Cabinet\PageController;
use App\Http\Controllers\Cabinet\PartnerController;
use App\Http\Controllers\Cabinet\PaymentController;
use App\Http\Controllers\Cabinet\ReviewController;
use App\Http\Controllers\Cabinet\SubscriptionController;
use App\Http\Controllers\Cabinet\UsefulLinksController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SanctumTockenController;
use App\Http\Controllers\SubscriptionFormController;
use App\Http\Controllers\TokenController;
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

Route::group(['middleware' => ['check.access']], function () {
    // Все ваши маршруты, к которым требуется проверка доступа

    Route::get('/', [FrontController::class, 'index'])->name('index');
    Route::get('/about', [FrontController::class, 'about'])->name('about');
    Route::get('/api',[FrontController::class, 'api'])->name('api');
    Route::get('/synergy',[FrontController::class,'synergy'])->name('synergy');
    Route::get('/membership',[FrontController::class,'membership'])->name('membership');
    Route::get('/participation',[FrontController::class,'ourMembers'])->name('list-membership');
    Route::get('/no-frod-system',[FrontController::class,'noFrodSystem'])->name('no-frod-system');
    Route::get('/rewiews-system',[FrontController::class,'rewiewsSystem'])->name('rewiews-system');
    Route::get('/ludo-system',[FrontController::class,'ludomanSystem'])->name('ludoman-system');
    Route::get('/cascad-system',[FrontController::class,'cascadSystem'])->name('cascad-system');
    Route::get('/catalog',[FrontController::class,'catalog'])->name('catalog');
    Route::get('/protection',[FrontController::class,'protectionData'])->name('protection');
    Route::get('/links',[FrontController::class,'links'])->name('links');

    Route::get('/policy',[FrontController::class,'policy'])->name('policy');
    Route::get('/contact',[FrontController::class,'contact'])->name('contact');

    Route::post('/subscription-form',[SubscriptionFormController::class,'subscriptionForm'])->name('subscription-form');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', [IndexController::class,'index'])->name('dashboard');

        Route::get('/cabinet/about',[PageController::class, 'about'])->name('cabinet-about');
        Route::get('/cabinet/membership',[PageController::class, 'membership'])->name('cabinet-membership');
        Route::get('/cabinet/black-list',[PageController::class, 'blackList'])->name('cabinet-blacklist');
        Route::get('/cabinet/api-documentation',[PageController::class, 'apiDocumantation'])->name('cabinet-api');
        Route::get('/cabinet/contact-form',[PageController::class, 'contact'])->name('cabinet-contact');
        Route::get('/cabinet/policy',[PageController::class, 'policy'])->name('cabinet-policy');

        Route::post('/submit-email',[EmployeeController::class, 'emailForm'])->name('submit-email');
        Route::post('send/claim',[EmployeeController::class,'claim'])->name('send-claim');

        Route::get('/re-verification',[MailController::class, 'reVerification'])->name('reVerification');

        Route::get('partner-form',[IndexController::class, 'companyForm'])->name('partner-form');
        Route::post('claim-succsess/{id}',[ClaimController::class, 'claimSuccsess'])->name('claim-succsess');
        Route::get('claim-delete/{id}',[ClaimController::class, 'claimDel'])->name('del-claim');

        Route::get('user/{id}/partners',[PartnerController::class,'index'])->name('user-companies');
        Route::get('partner/{id}',[PartnerController::class, 'show'])->name('page-partner')->middleware('checkroute');
        Route::get('partner/{id}/delete',[PartnerController::class, 'delete'])->name('del-partner')->middleware('checkroute');
        Route::post('create-partner',[PartnerController::class, 'create'])->name('create-partner');
        Route::post('update-partner/{id}',[PartnerController::class, 'update'])->name('update-partner')->middleware('checkroute');
        Route::post('/message/send',[MessageController::class,'create'])->name('send-message');


        Route::get('packet-page',[IndexController::class,'packetPage'])->name('packet-page');
        Route::get('payment/{count}',[PaymentController::class,'createPayment'])->name('payment-create');
        Route::get('/payment/save/{count}',[PaymentController::class, 'savePayment'])->name('save-payment');
        Route::get('/payment/{id}/oncheck',[PaymentController::class,'oncheck'])->name('oncheck-payment');

        Route::get('token/{id}/update',[TokenController::class,'update'])->name('token-update');

    Route::middleware('activeToken')->group(function () {
            Route::post('check', [CodeController::class, 'checkCode'])->name('check');
            Route::post('add-check-user',[CodeController::class, 'addCheckUsers'])->name('addCheckUsers');

            Route::get('review/all',[ReviewController::class, 'index'])->name('index-review');
            Route::get('review/search',[ReviewController::class,'select'])->name('search-review');
            Route::get('review/{id}',[ReviewController::class, 'show'])->name('show-review');
            Route::post('review/create',[ReviewController::class, 'create'])->name('save-review');

            Route::post('review/{id}/comment/create',[CommentController::class,'create'])->name('save-comment');
            Route::get('review/comment/{id}/show',[CommentController::class,'show'])->name('show-comment');
            Route::post('review/comment/{id}/update',[CommentController::class,'update'])->name('update-comment');
            Route::get('review/comment/{id}/delete',[CommentController::class,'delete'])->name('delete-comment');

        });



    Route::middleware('superadmin')->group(function () {
        Route::get('my-cabinet',[IndexController::class, 'cabinetIndex'])->name('my-cabinet')->middleware('superadmin');
        Route::get('token',[SanctumTockenController::class,'generateToken']);

        Route::get('office',[IndexController::class,'index'])->name('office');
        Route::get('payment/{id}/delete',[PaymentController::class,'delete'])->name('del-payment');
        Route::get('payment/{id}/paid',[PaymentController::class,'paidPayment'])->name('paid-payment');
        Route::get('payment/{id}/unpaid',[PaymentController::class,'unpaidPayments'])->name('unpaid-payment');

        Route::get('/message/read/{message_id}',[MessageController::class,'read'])->name('read-message');
        Route::get('/message/del/{message_id}',[MessageController::class, 'delete'])->name('del-message');
        Route::post('/answer/create',[AnswerController::class,'createAndSend'])->name('send-answer');

        Route::resource('cabinet-links', UsefulLinksController::class);
        Route::get('cabinet-subscriptions',[SubscriptionController::class,'index'])->name('cabinet-subscriptions');
        Route::get('delete-subscriptions/{id}',[SubscriptionController::class,'delete'])->name('delete-subscriptions');
    });

});
});

