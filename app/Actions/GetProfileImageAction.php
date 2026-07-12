<?php

declare(strict_types=1);

namespace App\Actions;

use App\Domain\Employee\Models\Employee;
use App\Domain\Shared\Enums\GenderEnum;

use function sprintf;

final class GetProfileImageAction
{
    public function handle(Employee $employee): string
    {
        // $image = $employee->image;

        $image = file_exists(public_path(sprintf('profile/%s.jpeg', $employee->employee_code)))
            ? sprintf('profile/%s.jpeg', $employee->employee_code)
            : null;

        if (! $image) {
            $image = $employee->gender_id === GenderEnum::MALE->value ? 'imgs/male.png' : 'imgs/female.png';
        }

        return asset($image);
    }
}
