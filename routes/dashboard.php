<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\Password\ForgetPasswordController;
use App\Http\Controllers\Dashboard\Auth\Password\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::fallback(function () {
            return response()->view('errors.404');
        });

        Route::get('/', function () {
            return view('dashboard.index');
        })->name('index')->middleware('auth:admin');

        Route::get('/home', function () {
            return view('dashboard.index');
        })->name('home')->middleware('auth:admin');

        ################################ Auth #######################################
        Route::get('login', [AuthController::class, 'loginForm'])->name('login');
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        ################################ Reset Password #############################
        Route::group(['prefix' => 'password', 'as' => 'password.'], function () {
            Route::controller(ForgetPasswordController::class)->prefix('email')->group(function () {
                Route::get('',          'showEmailForm')->name('email');
                Route::post('',         'sendOtp');
            });
            Route::controller(ResetPasswordController::class)->prefix('reset')->group(function () {
                Route::get('/{email}',  'showResetForm')->name('verify');
                Route::post('',         'resetPassword')->name('reset');
            });
        });
    }
);
