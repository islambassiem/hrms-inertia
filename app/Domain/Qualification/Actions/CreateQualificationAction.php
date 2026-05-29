<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Actions;

use App\Domain\Qualification\Data\CreateQualificationData;
use App\Domain\Qualification\Models\Qualification;

final class CreateQualificationAction
{
    public function handle(CreateQualificationData $data): Qualification
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Qualification::query()->create($attributes);
    }
}
