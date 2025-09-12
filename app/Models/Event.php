<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasTranslations;

    protected $translatable = ['title'];

    protected $fillable = ['title', 'start_date'];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
        ];
    }
}
