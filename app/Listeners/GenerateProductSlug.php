<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;

class GenerateProductSlug implements ShouldQueue
{
    use Queueable;

    public function handle(ProductCreated $event): void
    {
        $product = $event->product;
        $product->product_code = 'PRO_' . $product->id;
        $product->slug = Str::slug($product->name) . '-' . $product->id;
        $product->meta_title = $product->name;
        $product->meta_description = substr($product->name, 0, 150);
        $product->save();
    }
}
