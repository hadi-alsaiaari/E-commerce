<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['product_name', 'product_price', 'product_quantity', 'order_id', 'product_id', 'product_variant_id', 'attributes'];

    protected function casts(): array
    {
        return [
            'attributes' => 'array',
        ];
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
