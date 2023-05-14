<?php

namespace App\models;

use App\Traits\Componantable;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use Componantable, Translatable;

    protected $guarded = ['id','created_at','updated_at'];
    protected static $componantable = ['name','name_en','active','city'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
