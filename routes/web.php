<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;

Route::post('/locale', [LocaleController::class, 'set'])->name('locale');

Route::get('/', [AuthController::class, 'login'])->name('login');

Route::get('/home', function () {
    return inertia('Home');
})->name('home');
