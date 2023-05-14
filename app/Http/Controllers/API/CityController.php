<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegionCollection;
use App\models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function regions($id)
    {
        $city = City::findOrFail($id);
        $regions = $city->regions;
        return new RegionCollection($regions);
    }
}

