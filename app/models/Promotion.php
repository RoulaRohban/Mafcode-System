<?php

namespace App\models;

use App\Traits\Componantable;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use Componantable;
    protected $guarded = ['id','created_at','updated_at'];
    protected static $componantable = ['plan','advertisement','user'];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
