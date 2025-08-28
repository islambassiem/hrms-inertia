<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'IsHead'],
    'prefix' => 'head',
    'as' => 'head.',
], function () {
    Route::get('/dashboard', function () {
        return inertia('Head/Dashboard');
    })->name('dashboard');
});
