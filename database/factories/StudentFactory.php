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
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'religion' => fake()->name(),
            'place_of_birth' => fake()->name(),
            'date_of_birth' => fake()->date('Y-m-d'),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'address' => fake()->name(),
            'phone_number' => fake()->name(),
            'photo' => fake()->name()
        ];
    }
}
