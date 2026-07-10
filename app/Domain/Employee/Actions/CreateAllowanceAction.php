<?php

declare(strict_types=1);

namespace App\Domain\Employee\Actions;

use App\Domain\Employee\Data\AllowanceData;
use App\Domain\Employee\Models\Allowance;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

final class CreateAllowanceAction
{
    public function handle(AllowanceData $data): Allowance
    {
        $currentAllowance = $data->employee->currentAllowanceAmount($data->type);

        if (
            $currentAllowance &&
            // @phpstan-ignore-next-line
            $data->effective_from->lte($currentAllowance->effective_from)
        ) {
            throw ValidationException::withMessages([
                'effective_from' => 'The effective date must be after the current salary start date.',
            ]);
        }

        return DB::transaction(function () use ($data, $currentAllowance) {

            if ($currentAllowance instanceof Allowance) {
                $currentAllowance->update([
                    'effective_to' => $data->effective_from->copy()->subDay()->toDateString(),
                ]);
            }

            return $data->employee->currentAllowances()->create([
                'amount' => $data->amount,
                'allowance_type_id' => $data->type->id,
                'effective_from' => $data->effective_from->toDateString(),
                'effective_to' => null,
            ]);
        });
    }
}
