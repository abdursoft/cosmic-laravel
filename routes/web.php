<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\GifPackController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\Payment\StripeController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\UserGifController;
use App\Http\Controllers\UserSubscriptionController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/test', function(){
    return view('demo');
});

// page routes
Route::get('/', [App\Http\Controllers\PageController::class,'home'])->name('home');
Route::get('/pricing', [App\Http\Controllers\PageController::class,'service'])->name('service');

// auth routes
Route::get('/login', [App\Http\Controllers\PageController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [App\Http\Controllers\PageController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'register'])->name('auth.register');
Route::get('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('auth.logout');

// forgot password routes
Route::get('/forgot-password', [App\Http\Controllers\PageController::class, 'forgotPassword'])->name('password.forgot');
Route::get('/reset-password', [App\Http\Controllers\PageController::class, 'resetNewPassword'])->name('password.reset');
Route::post('/forgot-password', [App\Http\Controllers\PasswordController::class, 'sendPasswordOTP'])->name('password.forgot.submit');
Route::post('/reset-password', [App\Http\Controllers\PasswordController::class, 'resetPassword'])->name('password.reset.submit');

// dashboard route
Route::middleware((AuthMiddleware::class))->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\PageController::class, 'dashboard'])->name('auth.dashboard');
});

// user authenticated routes
Route::middleware(UserMiddleware::class)->prefix('user')->group(function(){
    // user subscription routes
    Route::get('subscribe/{id}', [UserSubscriptionController::class,'subscribe'])->name('user.subscribe');
    Route::get('subscribe/cancel/{id}', [UserSubscriptionController::class,'subscribeCancel'])->name('user.subscribe.cancel');
    Route::get('subscribe/resume/{id}', [UserSubscriptionController::class,'resumeSubscribe'])->name('user.subscribe.resume');
    Route::get('subscribe/download/{id}', [UserSubscriptionController::class,'resumeDownload'])->name('user.subscribe.download');

    // user purchase routes
    Route::get('purchase/gif/{id}', [UserGifController::class,'purchaseGifPack'])->name('user.purchase.gif');

    // user dashboard routes
    Route::get('subscriptions', [UserSubscriptionController::class,'userSubscriptions'])->name('user.subscriptions');
    Route::get('gif-packages', [UserGifController::class,'userGifPacks'])->name('user.gif-packs');
    Route::get('gif-packs/download/{id}', [UserGifController::class, 'downloadGifPacks'])->name('user.gif-pack.download');

    // magazine routes
    Route::get('magazines/{package_id}',[ IssueController::class, 'userMagazine'])->name('user.magazines');
    Route::get('read/magazine/{id}', [IssueController::class, 'readIssue'])->name('user.magazine.read');
});

// general routes
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submitContactForm'])->name('contact.submit');


// admin routes
Route::middleware(AdminMiddleware::class)->prefix('admin')->group(function(){
    Route::get('users', [AdminController::class,'users'])->name('admin.users');
    Route::get('issues', [AdminController::class,'issues'])->name('admin.issues');
    Route::get('contacts', [AdminController::class,'contacts'])->name('admin.contacts');
    Route::get('transactions', [AdminController::class,'transactions'])->name('admin.transactions');
    Route::post('contact-replay', [AdminController::class, 'replayContact'])->name('admin.contact.replay');

    Route::get('settings', [SiteSettingController::class,'index'])->name('admin.site-setting');
    Route::post('settings', [SiteSettingController::class,'store'])->name('admin.site-setting.submit');

    // subscriptions package routes
    Route::get('package',[PackageController::class, 'index'])->name('admin.package');
    Route::post('package',[PackageController::class, 'store'])->name('admin.package.submit');
    Route::get('package/edit/{id}',[PackageController::class, 'edit'])->name('admin.package.edit');
    Route::post('package/update/{id}',[PackageController::class, 'update'])->name('admin.package.update');
    Route::get('package/delete/{id}',[PackageController::class, 'destroy'])->name('admin.package.delete');

    // issues routes
    Route::get('issues', [IssueController::class,'index'])->name('admin.issues');
    Route::post('issues', [IssueController::class,'store'])->name('admin.issues.submit');
    Route::get('issue/edit/{id}', [IssueController::class,'edit'])->name('admin.issues.edit');
    Route::post('issue/update/{id}', [IssueController::class,'update'])->name('admin.issues.update');
    Route::get('issue/delete/{id}', [IssueController::class,'destroy'])->name('admin.issues.delete');
    Route::get('issue/read/{id}', [IssueController::class, 'adminReadIssue'])->name('admin.issues.read');

    // gif packs routes
    Route::get('gif-pack', [GifPackController::class,'index'])->name('admin.gif-packs');
    Route::post('gif-pack', [GifPackController::class,'store'])->name('admin.gif-packs.submit');
    Route::get('gif-pack/edit/{id}', [GifPackController::class,'edit'])->name('admin.gif-packs.edit');
    Route::post('gif-pack/update/{id}', [GifPackController::class,'update'])->name('admin.gif-packs.update');
    Route::get('gif-pack/delete/{id}', [GifPackController::class,'destroy'])->name('admin.gif-packs.delete');

    // page routes
    Route::get('pages/{id?}', [PageController::class,'index'])->name('admin.pages.index');
    Route::post('pages', [PageController::class,'store'])->name('admin.pages.store');
    Route::get('pages/edit/{id}', [PageController::class,'edit'])->name('admin.pages.edit');
    Route::post('pages/update/{id}', [PageController::class,'update'])->name('admin.pages.update');
    Route::get('pages/delete/{id}', [PageController::class,'destroy'])->name('admin.pages.destroy');
});


// payment routes
Route::prefix('payment')->group(function(){
    // stripe webhook
    Route::any('stripe/webhook', [StripeController::class, 'subscriptionEvents'])->name('payment.stripe.webhook');

    // stripe payment routes
    Route::any('stripe/callback/{trans_id}', [StripeController::class, 'callback'])->name('payment.stripe.callback');
});


// issues routes
Route::get('issue/scan/{id}/{type}', [IssueController::class, 'scan'])->name('issue.scan');

// page routes
Route::get('page/{id}/{slug}', [PageController::class, 'publicPage'])->name('public.page');
