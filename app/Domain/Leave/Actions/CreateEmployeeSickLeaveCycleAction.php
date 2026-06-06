<?php

declare(strict_types=1);

namespace App\Domain\Leave\Actions;

use App\Domain\Leave\Data\CreateEmployeeSickLeaveCycleData;
use App\Domain\Leave\Models\SickLeaveCycle;
use Carbon\CarbonImmutable;

final class CreateEmployeeSickLeaveCycleAction
{
    public function handle(CreateEmployeeSickLeaveCycleData $data): SickLeaveCycle
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        /** @var string $startDate */
        $startDate = $attributes['start_date'];

        $attributes['end_date'] = CarbonImmutable::parse($startDate)->copy()->addYears(1)->subDay();
        $attributes['used_days'] = 0;

        return SickLeaveCycle::query()->create($attributes);
    }
}
