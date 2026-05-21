<?php

declare(strict_types=1);

namespace App\Domain\Identity\Actions;

use App\Domain\Identity\Data\UpdateIdentityData;
use App\Domain\Identity\Models\Identity;

final class UpdateIdentityAction
{
    public function handle(UpdateIdentityData $data, Identity $identity): Identity
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $identity->update($attributes);

        return $identity;
    }
}
