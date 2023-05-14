<?php
namespace App\Helpers;

use Illuminate\Support\Arr;
class apiHelper
{
    public static function okResponse($data = null)
    {
        $status_code = isset($data) ? 200 : 205;
        return response()->json(['status'=> 'success','data' => $data],$status_code);
    }

    public static function failResponse($message)
    {
        if(!is_array($message))
            $message = (array)$message;
        return response()->json(['status'=> 'fail','errors' => self::formatValidationMessages($message)],422);
    }

    public static function formatValidationMessages($errors)
    {

        return Arr::flatten($errors);
    }
}
