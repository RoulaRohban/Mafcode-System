<?php

namespace App\Http\Controllers\API;

use App\Helpers\apiHelper;
use App\Http\Controllers\Controller;
use App\models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    private function storeReportValidation()
    {
        return [
            'advertisement_id' => 'required|exists:advertisements,id',
            'user_id' => 'required|exists:users,id',
            'reason'  => 'required|min:3|max:1000',
            'status' => 'required|in:read,unread',
        ];
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->storeReportValidation());
        if ($validator->fails()) {
            Log::error($validator->errors());
            return apiHelper::failResponse($validator->errors()->getMessages());
        }
        $validated_data = $validator->validated();
        $report = Report::create($validated_data);
        return apiHelper::okResponse();
    }
}
