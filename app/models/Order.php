<?php

namespace App\models;

use App\Traits\Componantable;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Componantable;
    protected $guarded = ['id','created_at','updated_at'];
    protected static $componantable = ['id','status','user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

}
