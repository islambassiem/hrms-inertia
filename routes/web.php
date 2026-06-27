<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login')->name('home');

Route::post('/language/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['en', 'ar']), 400);

    session()->put('locale', $locale);

    return back();
})->name('language.change');

Route::middleware(['auth', 'verified'])->group(function (): void {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
