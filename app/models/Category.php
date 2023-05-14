<?php

namespace App\models;

use App\Traits\Componantable;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Componantable, Translatable;
    protected $guarded = ['id','created_at','updated_at'];
    protected static $componantable = ['name','name_en','active','parent'];

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function parent(){
        return $this->belongsTo(Category::class);
    }
}
