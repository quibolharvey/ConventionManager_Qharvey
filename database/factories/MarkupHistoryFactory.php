<?php

namespace Database\Factories;

use App\Models\MarkupHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarkupHistoryFactory extends Factory
{
    protected $model = MarkupHistory::class;

    public function definition()
    {
        return [
            'date' => now(),
            'mark_up_rate' => $this->faker->randomFloat(2, 0.01, 0.10),
        ];
    }
}

