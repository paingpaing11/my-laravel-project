<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;
use App\Models\Town;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'name',
    ];

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function towns()
    {
        return $this->belongsTo(Town::class);
    }
}
