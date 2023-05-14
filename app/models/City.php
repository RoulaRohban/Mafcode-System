<?php

namespace App\models;

use App\Traits\Componantable;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
class City extends Model
{
    use Componantable,Translatable;

    protected $translatable = ['name'];
    protected $guarded = ['id','created_at','updated_at'];

    protected static $componantable = ['name','name_en','country','active'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
