<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;
use App\Models\City;

class Town extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'name',
        'city_id',
    ];

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function city()
    {
        return $this->hasMany(City::class);
    }

}
