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

    public function handle(ProductCreated $event): void
    {
        $product = $event->product;
        Http::post(env('WEBHOOK_URL'), $product->toArray());
        Log::info('PublishProductWebhook');
    }
}
