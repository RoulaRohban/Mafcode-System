<?php

namespace App\models;

use App\Traits\Componantable;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use Componantable;
    protected $guarded = ['id','created_at','updated_at'];
    protected static $componantable = ['advertisement','user','reason','status'];

    public function advertisement(){
        return $this->belongsTo(Advertisement::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
