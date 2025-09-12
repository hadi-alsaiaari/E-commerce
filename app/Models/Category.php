<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;

    protected $translatable = ['name'];

    protected $fillable = ['name', 'slug', 'parent', 'status', 'icon'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
