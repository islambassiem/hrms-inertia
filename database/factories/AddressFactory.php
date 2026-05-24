<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Address\Models\Address;
use App\Domain\Employee\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Address>
 */
#[UseModel(Address::class)]
final class AddressFactory extends Factory
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
            'short_address' => mb_strtoupper(fake()->lexify()).fake()->numerify('####'),
            'building_number' => fake()->optional()->numerify('####'),
            'street' => fake()->optional()->streetAddress(),
            'secondary_number' => fake()->optional()->numerify('####'),
            'district' => fake()->optional()->streetName(),
            'postal_code' => fake()->optional()->numerify('####'),
            'city' => fake()->optional()->city(),
        ];
    }
}
