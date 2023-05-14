<?php

namespace App\models;

use App\Helpers\Helper;
use App\Traits\Componantable;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Advertisement extends Model
{
    use Componantable, Translatable;
    protected $guarded = ['id','created_at','updated_at'];
    protected static $componantable = ['title','title_en','user','type','active','category','status'];
    protected $appends = ['imagesUrl'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categoryHierarchy()
    {
        //TODO get parents recursively
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getImagesUrlAttribute()
    {
        $result = [];
        $images = $this->images;
        foreach ($images as $image)
        {
            if($image->is_primary == "yes")
            {
                $result["primary"] = Helper::getMediaUrl($image->image_path) ?? '';
            }
            else
            {
                $result["images"] = Helper::getMediaUrl($image->image_path) ?? '';
            }
        }
    }

    public function primaryImage()
    {
        return $this->images()->where('is_primary', 'yes')->first() ?? '';
    }

    public function setPrimaryImage($request)
    {
        if($request->hasFile('image')) {
            $image_data = Helper::uploadFileTo($request->image, 'advertisements');
            $image = Image::create([
                'image_path' => $image_data["media_path"],
                'is_primary' => 'yes'
            ]);
            $this->images()->save($image);
        }
    }

    public function setLocation($request) {
        $validated_data = [];
        if ($request->has('region_id') && $request->region_id) {
            $validated_data['location_type'] = 'region';
            $validated_data['location_id'] = $request->region_id;
        } elseif ($request->has('city_id') && $request->city_id) {
            $validated_data['location_type'] = 'city';
            $validated_data['location_id'] = $request->city_id;
        } elseif ($request->has('country_id') && $request->country_id) {
            $validated_data['location_type'] = 'country';
            $validated_data['location_id'] = $request->country_id;
        }
        $this->update($validated_data);
        return true;
    }

    public function getLocation()
    {
        $country = null;
        $region = null;
        $city = null;
        $locationType = $this->location_type;
        switch ($locationType)
        {
            case 'country' :
                $country = Country::find($this->location_id);
                break;
            case 'city' :
                $city = City::find($this->location_id);
                $country = $city->country;
                break;
            case 'region' :
                $region = Region::find($this->location_id);
                $city = $region->city;
                $country = $city->country;
                break;

        }

        return [
            'country' => $country,
            'city' => $city,
            'region' => $region
        ];
    }

    public function favorite()
    {
        return $this->morphOne(Favorite::class, 'favoritable');
    }

//    public function translations(){
//        return $this->morphMany(Translation::class,'translatable');
//    }
}
