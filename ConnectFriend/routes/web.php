<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FriendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', [FriendController::class, 'viewHomePage'])->name('home');

Route::get('/login', [LoginController::class, 'viewLoginPage'])->name('login.form');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'viewRegisterPage'])->name('register.form');

Route::post('/register', [RegisterController::class, 'register'])->name('register.create');

Route::get('/payment', [RegisterController::class, 'viewPaymentPage'])->name('payment.form');

Route::post('/payment', [RegisterController::class, 'payment'])->name('payment.submit');

Route::put('/paymentConfirmation', [RegisterController::class, 'paymentConfirmation'])->name('payment.confirmation');
