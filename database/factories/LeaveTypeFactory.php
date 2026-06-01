<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Leave\Models\LeaveType;
use App\Domain\Shared\Enums\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

use function sprintf;

/**
 * @extends Factory<LeaveType>
 */
#[UseModel(LeaveType::class)]
final class LeaveTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'en' => fake()->lexify(),
                'ar' => fake('ar')->lexify(),
            ],
            'reference_type_id' => ReferenceType::LEAVE_TYPE,
            'code' => sprintf('LT-%s', (string) fake()->unique()->bothify('###############')),
        ];
    }
}
