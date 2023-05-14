<?php

namespace App\models;

use App\Traits\Componantable;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Componantable,Translatable;
    protected $guarded = ['id','created_at','updated_at'];
    protected static $componantable = ['key','value','value_en'];

    public static function getSettingByKey($key)
    {
        return self::where('key',$key)->first();
    }

    public static function saveSettingByKey($key,$value)
    {
        $setting = self::getSettingByKey($key);
        if($setting)
        {
            $setting->update([
                'value' => $value
            ]);
        }
        else
        {
            $setting = self::create([
                'key' => $key,
                'value' => $value
            ]);
        }



        return $setting;
    }
}
