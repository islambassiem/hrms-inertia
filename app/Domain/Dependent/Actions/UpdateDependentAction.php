<?php

declare(strict_types=1);

namespace App\Domain\Dependent\Actions;

use App\Domain\Dependent\Data\UpdateDependentData;
use App\Domain\Dependent\Models\Dependent;

final class UpdateDependentAction
{
    public function handle(UpdateDependentData $data, Dependent $dependent): Dependent
    {
        /** @var array<string, mixed> */
        $attributes = $data->toArray();
        $dependent->update($attributes);

        return $dependent;
    }
}
