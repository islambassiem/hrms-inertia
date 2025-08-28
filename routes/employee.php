<?php

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::get('/dashboard', function () {
        return inertia('Employee/Dashboard');
    })->name('dashboard');
});
