<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OrderPlaced;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $req)
    {
        $order = Order::create([
            'user_id' => $req->user_id,
            'total_amount' => $req->total_amount,
            'status' => 'pending',
        ]);

        foreach ($req->order_items as $item) {
            $order->items()->create([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        event(new OrderPlaced($order));

        return response()->json(['status' => true, 'message' => 'Order placed successfully']);
    }
}
