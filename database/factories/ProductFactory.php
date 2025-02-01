<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'product_name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'category_id' => Category::factory(),
            'purchase_price' => $this->faker->randomFloat(2, 10, 500),
            'retail_price' => null,
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}

