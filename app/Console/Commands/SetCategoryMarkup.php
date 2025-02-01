<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Category;
use App\Models\MarkupHistory;

class SetCategoryMarkup extends Command
{
    protected $signature = 'markup:set-category {rate} {category}';
    protected $description = 'Set markup percentage for a specific category';

    public function handle()
    {
        $rate = (float) $this->argument('rate');
        $categoryName = $this->argument('category');

        $category = Category::where('category_name', $categoryName)->first();

        if (!$category) {
            $this->error("Category not found.");
            return;
        }

        $category->products()->each(function ($product) use ($rate) {
            $product->retail_price = $product->purchase_price * (1 + $rate);
            $product->save();
        });

        MarkupHistory::create(['date' => now(), 'mark_up_rate' => $rate]);

        $this->info("Markup of {$rate} applied to category: {$categoryName}.");
    }
}

