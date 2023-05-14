<?php

namespace App\models;

use App\Traits\Componantable;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use Componantable,Translatable;

    protected $translatable = ['name'];

    protected $guarded = ['id','created_at','updated_at'];
    protected static $componantable = ['name','name_en'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

}
