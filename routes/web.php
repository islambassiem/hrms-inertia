<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;

Route::post('/locale', [LocaleController::class, 'set'])->name('locale');

Route::get('/', function () {
    return inertia('Home');
})->name('home');

Route::get('/about', function () {
    return inertia('About');
})->name('about');
