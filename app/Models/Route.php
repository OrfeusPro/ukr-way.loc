<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Route extends Model
{
    use HasFactory;

    public function from_countries()
    {
        return $this->hasMany(Country::class, 'id', 'from_country');
    }

    public function to_countries()
    {
        return $this->hasMany(Country::class, 'id', 'to_country');
    }
}
