<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\UserSignup;;
use App\Http\Controllers\UserLogin;
use App\Http\Controllers\HandlePasswordSubmit;
use App\Http\Controllers\ResetPassword;

Route::inertia('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/user/register', function () {
    return Inertia::render('auth/register');
});

Route::post('/user/register',[UserSignup::class,'userSignup']);

Route::get('user/login',function(){
    return Inertia::render('auth/login');
});

Route::post('/user/login', [UserLogin::class,'authenticate']);

Route::get('/email/verify', function () {
    return Inertia::render('auth/verify-email');
})->middleware('auth')->name('verification.notice');

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



require __DIR__.'/settings.php';
