<?php

declare(strict_types=1);

namespace App\Domain\Leave\Actions;

use App\Domain\Leave\Data\UpdateLeavePolicyData;
use App\Domain\Leave\Models\Policy;

final class UpdateLeavePolicyAction
{
    public function handle(UpdateLeavePolicyData $data, Policy $policy): Policy
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $policy->update($attributes);

        return $policy;
    }
}
