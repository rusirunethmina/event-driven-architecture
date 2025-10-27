<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdjustInventoryJob implements ShouldQueue
{
    use Queueable;

    protected $productId, $change;

    public function __construct($productId, $change)
    {
        $this->productId = $productId;
        $this->change = $change;
    }

    public function handle()
    {
        $product = Product::find($this->productId);
        if ($product) {
            $product->stock += $this->change;
            $product->save();
        }
    }
}
