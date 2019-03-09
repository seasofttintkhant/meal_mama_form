<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    public function getCitiesbyPrefecture($prefecture_id)
    {
        $ciities = City::where('prefecture_id',$prefecture_id)->get();

        return response(['cities'=>$ciities],200);
    }

    public function getTownbyZipCode($zipCode)
    {
        $town = City::where('postal_code',$zipCode)->first();

        return response(['town'=>$town],200);
    }
}
