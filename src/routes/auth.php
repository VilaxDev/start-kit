<?php

use Illuminate\Support\Facades\Route;
use VilaxDev\PaymentManager\controllers\AuthController;

// Grupo de rutas para autenticación
Route::group(['middleware' => ['web']], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return view('payment-manager::dashboard');
    })->middleware('auth')->name('dashboard');
});
