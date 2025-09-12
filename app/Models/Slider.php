<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use HasTranslations;

    protected $translatable = ['note'];

    protected $fillable = ['id', 'file_name', 'note'];
}
