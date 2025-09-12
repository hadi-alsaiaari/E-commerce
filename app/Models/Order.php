<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_name', 'user_phone', 'user_email', 'price', 'shapping_price', 'total_price', 'note', 'status', 'country', 'governorate', 'city', 'street', 'coupon', 'coupon_discount', 'user_id'];

    protected function casts(): array
    {
        return [
            'status' => OrderStatus::class,
        ];
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
