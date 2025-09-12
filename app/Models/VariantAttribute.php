<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariantAttribute extends Model
{
    protected $fillable = ['attribute_value_id', 'product_variant_id'];

    public function attributeValue()
    {
        return $this->belongsTo(AttributeValue::class, 'attribute_value_id');
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
}
