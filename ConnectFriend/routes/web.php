<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FriendController;

Route::get('/', [FriendController::class, 'viewHomePage'])->name('home');

Route::get('/register', [FriendController::class, 'viewRegisterPage'])->name('register.form');

Route::post('/register', [FriendController::class, 'register'])->name('register.create');
