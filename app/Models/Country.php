<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function marshrut()
    {
        return $this->hasMany(Route::class, 'to_country');
        // return $this->belongsTo(Route::class, 'id', 'from_country');
    }
}
