<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class PublishProductWebhook implements ShouldQueue
{
    use Queueable;

    public function handle(ProductCreated $event)
    {
        $product = $event->product;
        Http::post('https://api.aldar.dev.pixelprodev.xyz/api/v1/webhook', $product->toArray());
        Log::info('PublishProductWebhook');
    }
}
