<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\EnterpriceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get( '/' , [MainController::class, 'getMain'] )->name('home');

Route::get( '/signin' , [LoginController::class, 'getSignin'] )->name('signin');
Route::post( '/signin' , [LoginController::class, 'postSignin'] )->name('signin');

Route::get( '/signup' , [LoginController::class, 'getSignup'] )->name('signup');
Route::get( '/signup' , [LoginController::class, 'getSignup'] )->name('signup');


Route::get( '/logout' , [LoginController::class, 'logout'] )->name('logout');


Route::prefix('/enterprice')->group(function () {
    Route::get( '' , [EnterpriceController::class, 'show'] )->name('enterprice');
});

Route::prefix('/employees')->group(function () {
    Route::get( '' , [EmployeesController::class, 'show'] )->name('employees');
});
