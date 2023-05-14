<?php

namespace App\models;

use App\Traits\Componantable;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use Componantable,Translatable;
    protected $guarded = ['id','created_at','updated_at'];
    protected static $componantable = ['caption','caption_en'];
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
