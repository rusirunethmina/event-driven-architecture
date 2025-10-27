<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Jobs\AdjustInventoryJob;

class UpdateProductStock
{
    public function handle(OrderPlaced $event)
    {
        foreach ($event->order->items as $item) {
            dispatch(new AdjustInventoryJob($item->product_id, -$item->quantity));
        }
    }
}
