<?php

namespace App\models;

use App\Traits\Componantable;
use Illuminate\Database\Eloquent\Model;

class bloodType extends Model
{
    use Componantable;

    protected $guarded = ['id','created_at','updated_at'];
    protected static $componantable = ['name','active'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
