<?php

namespace App\models;

use App\Traits\Componantable;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use Componantable,Translatable;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected static $componantable = ['title','title_en','days_number','price'];

}
