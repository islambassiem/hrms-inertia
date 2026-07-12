<?php

declare(strict_types=1);

use App\Http\Controllers\Hr\EmployeeController;
use App\Http\Controllers\Hr\HomeController;
use App\Http\Controllers\Hr\PersonalInfoController;
use Illuminate\Support\Facades\Route;


Route::prefix('hr')
    ->middleware(['auth', 'verified', 'hr'])
    ->name('hr.')
    ->group(function (): void {
        Route::get('dashboard', [HomeController::class, 'index'])
            ->name('dashboard');

        Route::resource('employees', EmployeeController::class)
            ->only(['index', 'create', 'store', 'show', 'update'])
            ->names('employees');

        Route::get('employees/personal/{employee}', [PersonalInfoController::class, 'show'])
            ->name('employee.show.personal');
    });
