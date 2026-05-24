<?php

declare(strict_types=1);

use App\Domain\Shared\Data\TranslatedNameData;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function (): void {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

Route::get('test', function (): TranslatedNameData {
    $name = [
        // 'ar' => 'name in Arabic',
        'en' => 'name in English',
    ];

    return TranslatedNameData::validateAndCreate($name);
});
