<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_code', 'name', 'sku', 'price', 'stock', 'slug', 'meta_title', 'meta_description'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
