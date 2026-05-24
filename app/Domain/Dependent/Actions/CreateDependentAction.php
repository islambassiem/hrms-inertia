<?php

declare(strict_types=1);

namespace App\Domain\Dependent\Actions;

use App\Domain\Dependent\Data\CreateDependentData;
use App\Domain\Dependent\Models\Dependent;

final class CreateDependentAction
{
    public function handle(CreateDependentData $data): Dependent
    {
        /** @var array<string, mixed> */
        $attributes = $data->toArray();

        return Dependent::query()->create($attributes);
    }
}
