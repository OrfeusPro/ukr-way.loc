<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tel extends Model
{
	

    public function getPhoneFullAttribute($value)
    {
		$value = str_replace("+","%2B",$value);
		$value = str_replace(" ","",$value);

        return ucfirst($value);
    }

}
