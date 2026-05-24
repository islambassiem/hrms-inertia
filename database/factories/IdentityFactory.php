<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Employee\Models\Employee;
use App\Domain\Identity\Models\Identity;
use App\Domain\Identity\Models\IdentityType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Identity>
 */
#[UseModel(Identity::class)]
final class IdentityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => Employee::factory(),
            'identity_type_id' => IdentityType::factory(),
            'identity_number' => fake()->unique()->regexify('[12][0-9]{9}'),
            'place_of_issue' => fake()->city(),
            'issue_date' => $issueDate = fake()->date(),
            'expiry_date' => fake()->dateTimeBetween($issueDate, '+2 years')->format('Y-m-d'),
        ];
    }
}
