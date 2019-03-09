<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    public $timestamps = false;
    
    public static function getAllPrefectures()
    {
        $prefectures=\Cache::rememberForever('prefectures',function(){
            return self::all(); 
        });

        return $prefectures;

    }
}
