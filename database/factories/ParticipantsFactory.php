<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Convention;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participants>
 */
class ParticipantsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

return [
    'convention_id' => Convention::factory(),
    'user_id' => User::factory(),
    'type' => $this->faker->randomElement(['Attendee', 'Organizer', 'Speaker']),
    'remarks' => $this->faker->sentence,
];
    }
}
