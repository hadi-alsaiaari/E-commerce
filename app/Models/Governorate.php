<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Governorate extends Model
{
    use HasTranslations;
    
    public $timestamps = false;

    public $translatable = ['name'];

    protected $fillable = ['name' , 'country_id' , 'is_active'];

    public function country()
    {
        return $this->belongsTo(Country::class , 'country_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class , 'governorate_id');
    }

    public function shippingPrice()
    {
        return $this->hasOne(ShippingGovernorate::class , 'governorate_id');
    }

    public function users()
    {
        return $this->hasMany(User::class , 'governorate_id');
    }
}
