<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FriendController;

Route::get('/', [FriendController::class, 'viewHomePage'])->name('home');

Route::get('/login', [FriendController::class, 'viewLoginPage'])->name('login.form');

Route::post('/login', [FriendController::class, 'login'])->name('login.submit');

Route::get('/register', [FriendController::class, 'viewRegisterPage'])->name('register.form');

Route::post('/register', [FriendController::class, 'register'])->name('register.create');

Route::get('/payment', [FriendController::class, 'viewPaymentPage'])->name('payment');
