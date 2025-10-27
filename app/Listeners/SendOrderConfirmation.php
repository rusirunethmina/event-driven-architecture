<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Jobs\SendEmailJob;

class SendOrderConfirmation
{
    public function handle(OrderPlaced $event)
    {
        $order = $event->order;
        dispatch(new SendEmailJob($order->user->email ?? env('MAIL_FROM_ADDRESS'), 'emails.order_confirmation', ['order' => $order]));
    }
}
