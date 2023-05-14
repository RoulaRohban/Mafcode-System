<?php

namespace App\models;

use App\Traits\Componantable;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use Componantable;
    public static $menuable = false;
    protected $guarded = ['id','created_at','updated_at'];
}
