<?php

namespace App\Models;

use App\Traits\Componantable;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use Componantable;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected static $componantable = ['rating','user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
