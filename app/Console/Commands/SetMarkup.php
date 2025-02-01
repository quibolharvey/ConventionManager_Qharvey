<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\MarkupHistory;

class SetMarkup extends Command
{
    protected $signature = 'markup:set {rate}';
    protected $description = 'Set markup percentage for all products';

    public function handle()
    {
        $rate = (float) $this->argument('rate');
        Product::all()->each(function ($product) use ($rate) {
            $product->retail_price = $product->purchase_price * (1 + $rate);
            $product->save();
        });

        MarkupHistory::create(['date' => now(), 'mark_up_rate' => $rate]);

        $this->info("Markup of {$rate} applied to all products.");
    }
}

