<?php

namespace App\models;

use App\Traits\Componantable;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Componantable,Translatable;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected static $componantable = ['name','name_en','price','active','taxable'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function favorite()
    {
        return $this->morphOne(Favorite::class, 'favoritable');
    }
}
