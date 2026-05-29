<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Actions;

use App\Domain\Qualification\Data\UpdateQualificationData;
use App\Domain\Qualification\Models\Qualification;

final class UpdateQualificationAction
{
    public function handle(UpdateQualificationData $data, Qualification $qualification): Qualification
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $qualification->update($attributes);

        return $qualification;
    }
}
