<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserSignup;
use App\Http\Controllers\UserLogin;
use App\Http\Controllers\HandlePasswordSubmit;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\SpaController;
use App\Http\Controllers\EventController;

Route::get('/', function(){
    return Inertia::render('home');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/user/register', function () {
    return Inertia::render('auth/register');
});

Route::post('/user/register',[UserSignup::class,'userSignup'])->middleware('throttle:6,1');

Route::get('user/login',function(){
    return Inertia::render('auth/login');
});

Route::post('/user/login', [UserLogin::class,'authenticate'])->middleware('throttle:6,1');

Route::get('/email/verify', function () {
    return Inertia::render('auth/verify-email');
})->middleware(['auth', 'throttle:6,1'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/forgot-password', function () {
    return Inertia::render('auth/forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password',[HandlePasswordSubmit::class, 'HandlePasswordSubmit'])->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return Inertia::render('auth/reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password',[ResetPassword::class, 'HandleResetPassword'])->middleware('guest')->name('password.update');

Route::get('/checkout', function(){
    return Inertia::render('checkout');
});

Route::get('/rooms', [RoomController::class, 'getRoom']);

Route::get('/rooms/{id}/{room}', [RoomController::class, 'getRoomQuery']);

Route::get('/spa', [SpaController::class,'SpaPage']);

Route::get('/event',[EventController::class,'getEventDetails']);

Route::get('/event/{id}/{room}',[EventController::class, 'getEventSpace']);
  



require __DIR__.'/settings.php';
