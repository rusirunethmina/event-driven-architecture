<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Events\ProductCreated;

class ProductController extends Controller
{
    public function store(Request $req)
    {
        $product = new Product();
        $product->name = $req->name;
        $product->sku = $req->sku;
        $product->price = $req->price;
        $product->stock = $req->stock;


        $product->save();

        event(new ProductCreated($product));

        return response()->json([
            'status' => true,
            'message' => 'product created sussfully.',
        ]);
    }
}
