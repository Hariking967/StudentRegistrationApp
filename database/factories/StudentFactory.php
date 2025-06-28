<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'roll_no' => fake()->unique()->numberBetween(1, 500),
            'name' => fake()->name(),
            'dob' => fake()->unique()->date(),
            'email' => fake()->unique()->safeEmail(),
            'officialemail' => fake()->unique()->safeEmail(),
            'contact' => fake()->numberBetween(1000000000, 2147483647),
            'dept' => fake()->randomElement(['CSE', 'ECE', 'MECH', 'CIVIL', 'EEE', 'IT', 'CHE', 'AE', 'BT', 'ICE']),
            'passout' => fake()->year()
        ];
    }
}
