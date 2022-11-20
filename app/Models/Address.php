<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\Town;
// use App\Models\State;

class Address extends Model
{
    use HasFactory;
    protected $table='addresses';
    protected $fillable=[
      'address_id',
      // 'Tsp_name',
      'city_id',
      'township_id',
      // 'state_id',
      'hou_no',
      'street',
      'ward',
    ];

    public function cities()
    {
      return $this->belongsTo(City::class);
    }

    public function towns()
    {
      return $this->belongsTo(Town::class);
    }

    // public function state()
    // {
    //   return $this->belongsTo(State::class);
    // }

}
