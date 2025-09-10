<?php

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
        });

        Route::get('/login', function () {
            return view('dashboard.auth.login');
        });
    }
);
