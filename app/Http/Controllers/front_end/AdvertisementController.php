<?php

namespace App\Http\Controllers\front_end;

use App\Http\Controllers\Controller;
use App\models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index () {
        $advertisements = Advertisement::orderBy('created_at', 'desc')->paginate(16);
        return view('frontend.advertisement.added_advertisement', compact('advertisements'));
    }
}
