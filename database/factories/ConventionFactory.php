<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Convention;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Convention>
 */
class ConventionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'start' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'end' => $this->faker->dateTimeBetween('+1 day', '+2 years'),
            'venue' => $this->faker->city,
            'fee' => $this->faker->randomFloat(2, 100, 5000),
            'remarks' => $this->faker->paragraph,
        ];

    }
}
