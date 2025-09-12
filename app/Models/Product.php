<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'desc', 'small_desc'];
    public $fillable = ['name', 'desc', 'small_desc', 'slug', 'status', 'sku', 'available_for', 'views', 'has_variants', 'price', 'has_discount', 'discount', 'start_discount', 'end_discount', 'manage_stock', 'quantity', 'available_in_stock', 'category_id', 'brand_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function productPreviews()
    {
        return $this->hasMany(ProductPreview::class);
    }

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
