<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    public static function getAllCities()
    {
        $cities=\Cache::rememberForever('cities',function(){
            return self::all(); 
        });

        return $cities;

    }
}
