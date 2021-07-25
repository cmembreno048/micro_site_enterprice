<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get( '/' , [MainController::class, 'getMain'] )->name('home');

Route::get( '/signin' , [LoginController::class, 'getSignin'] )->name('signin');

Route::get( '/signup' , [LoginController::class, 'getSignup'] )->name('signup');
