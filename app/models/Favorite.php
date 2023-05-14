<?php

namespace App\models;

use App\Helpers\Helper;
use App\Traits\Componantable;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use Componantable;
    public static $menuable = false;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected static $componantable = ['favoritable_id','favoritable_type','user_id'];

    public function favoritable()
    {
        return $this->morphTo();
    }
}
