<?php

namespace App\Http\Controllers\front_end;

use App\Http\Controllers\Controller;
use App\models\Advertisement;
use App\models\Setting;
use App\models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        if (app()->getLocale() !== 'ar') {
            config('app.content_language', app()->getLocale());
        }
    }

    public function index () {
        $slider = Slider::orderBy('created_at', 'desc')->first();
        $advertisements = Advertisement::orderBy('created_at', 'desc')->limit(8)->get();
        $about_us = Setting::where('key', 'about_us')->first()->value;
        $about_app = Setting::where('key', 'about_app')->first()->value;

        return view('frontend.home', compact('slider', 'advertisements', 'about_us', 'about_app'));
    }
}
