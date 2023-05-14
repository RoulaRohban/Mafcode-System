<?php

namespace App\Http\Controllers\API;

use App\Helpers\apiHelper;
use App\Http\Controllers\Controller;
use App\models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();

        return apiHelper::okResponse($sliders);
    }
}
