<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityCollection;
use App\Http\Resources\CountryCollection;
use App\models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();

        return new CountryCollection($countries);
    }

    public function cities($id)
    {
        $country = Country::findOrFail($id);
        $cities = $country->cities;

        return new CityCollection($cities);
    }
}
