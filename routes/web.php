<?php

use Illuminate\Support\Facades\Route;

// Redirect login and register routes
// Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/auth/slj/redirect', [\SLJ\SLJLaravelClient\Http\Controllers\AuthController::class, 'redirect'])->name('login');

Route::get('/auth/slj/callback', [\SLJ\SLJLaravelClient\Http\Controllers\AuthController::class, 'callback']);