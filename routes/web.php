<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;

Route::post('/locale', [LocaleController::class, 'set'])->name('locale');

require __DIR__.'/auth.php';
require __DIR__.'/hr.php';
require __DIR__.'/head.php';
require __DIR__.'/employee.php';
