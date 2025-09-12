<?php

namespace App\Models;

use App\Models\User;
use App\Models\Governorate;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;

    public $timestamps = false;

    public $translatable = ['name'];

    protected $fillable = ['name', 'phone_code', 'is_active', 'flag_code'];

    public function governorates()
    {
        return $this->hasMany(Governorate::class, 'country_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'country_id');
    }
}
