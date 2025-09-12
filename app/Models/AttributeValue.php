<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AttributeValue extends Model
{
    use HasTranslations;

    public $timestamps = false;

    public $translatable = ['value'];

    protected $fillable = ['value', 'attribute_id'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function variantAttributes()
    {
        return $this->hasMany(VariantAttribute::class, 'attribute_value_id');
    }
}
