<?php

declare(strict_types=1);

namespace App\Domain\Leave\Actions;

use App\Domain\Leave\Data\CreateLeavePolicyData;
use App\Domain\Leave\Models\Policy;

final class CreateLeavePolicyAction
{
    public function handle(CreateLeavePolicyData $data): Policy
    {
        /** @var array<string, mixed> $atttibites */
        $atttibites = $data->toArray();

        return Policy::query()->create($atttibites);
    }
}
