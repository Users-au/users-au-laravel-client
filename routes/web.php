<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => config('slj.middleware', ['web'])
],
    function () {
        Route::get('/auth/slj/redirect', [
            \SLJ\SLJLaravelClient\Http\Controllers\AuthController::class,
            'redirect'
        ])->name('login');

        Route::get('/auth/slj/callback', [
            \SLJ\SLJLaravelClient\Http\Controllers\AuthController::class,
            'callback'
        ]);

        Route::get('/auth/slj/logout', [
            \SLJ\SLJLaravelClient\Http\Controllers\AuthController::class,
            'logout'
        ])->name('logout');

        Route::get('/auth/slj/account', [
            \SLJ\SLJLaravelClient\Http\Controllers\AuthController::class,
            'account'
        ])->name('account');
    }
);