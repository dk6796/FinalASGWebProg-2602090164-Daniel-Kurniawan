<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', [UserController::class, 'viewHomePage'])->name('home');

Route::get('/login', [LoginController::class, 'viewLoginPage'])->name('login.form');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'viewRegisterPage'])->name('register.form');

Route::post('/register', [RegisterController::class, 'register'])->name('register.create');

Route::get('/payment', [RegisterController::class, 'viewPaymentPage'])->name('payment.form');

Route::post('/payment', [RegisterController::class, 'payment'])->name('payment.submit');

Route::put('/paymentConfirmation', [RegisterController::class, 'paymentConfirmation'])->name('payment.confirmation');

Route::get('/myProfile', [UserController::class, 'viewProfilePage'])->name('profile');

Route::put('/topUp', [UserController::class, 'topUp'])->name('topup');

Route::post('/buyAvatar', [UserController::class, 'buyAvatar'])->name('buyAvatar');

Route::put('/applyAvatar', [UserController::class, 'applyAvatar'])->name('applyAvatar');
