<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\bloodTypeCollection;
use App\models\bloodType;
use Illuminate\Http\Request;

class BloodTypeController extends Controller
{
    public function index()
    {
        $bloodTypes = bloodType::all();
        return new  BloodTypeCollection($bloodTypes);
    }
}
