<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Brand extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['name', 'logo', 'status', 'slug'];

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
}
