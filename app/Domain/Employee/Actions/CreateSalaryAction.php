<?php

declare(strict_types=1);

namespace App\Domain\Employee\Actions;

use App\Domain\Employee\Data\SalaryData;
use App\Domain\Employee\Models\Salary;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

final class CreateSalaryAction
{
    public function handle(SalaryData $data): Salary
    {
        $currentSalary = $data->employee->currentSalary;

        if (
            $currentSalary &&
            // @phpstan-ignore-next-line
            $data->effective_from->lte($currentSalary->effective_from)
        ) {
            throw ValidationException::withMessages([
                'effective_from' => 'The effective date must be after the current salary start date.',
            ]);
        }

        return DB::transaction(function () use ($data, $currentSalary) {

            if ($currentSalary) {
                $currentSalary->update([
                    'effective_to' => $data->effective_from->copy()->subDay()->toDateString(),
                ]);
            }

            return $data->employee->salaries()->create([
                'basic' => $data->basic,
                'effective_from' => $data->effective_from->toDateString(),
                'effective_to' => null,
            ]);
        });
    }
}
