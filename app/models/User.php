<?php

namespace App\models;

use App\Helpers\Helper;
use App\Traits\Componantable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use Notifiable,Componantable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id','created_at','updated_at', 'country_id', 'city_id', 'region_id'];

    protected static $componantable = ['first_name','last_name','username','role','phone','email','active'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getImageUrl()
    {

        return Helper::getMediaUrl($this->image->image_path) ?? '';
    }

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
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

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function activateSession()
    {
        $this->session_expired = "no";
        return $this;
    }

    public function generatePasswordToken()
    {
        $email = $this->email;
        //send email here
        //and send message to mobile
        $token = rand ( 100000 , 999999 );
        $this->reset_token = $token;
        $this->reset_verified = 'no';
        return $this;
    }

    public function checkPasswordCode($token)
    {
        return $this->reset_token == $token;
    }

    public function changePassword($password)
    {
        if($this->reset_verified == "yes")
        {
            $this->password = Hash::make($password);
            $this->reset_token = null;
            $this->reset_verified = 'no';
            return $this->save();
        }

        return false;


    }

    public function blood_type(){
        return $this->belongsTo(bloodType::class);
    }
    public function getFavoriteProducts()
    {
        $productFavoriteIds =  $this->favorites()->where('favoritable_type','App\models\Product')->pluck('favoritable_id');

        return Product::whereIn('id',$productFavoriteIds)->get();
    }

    public function getFavoriteAdvertisements()
    {
        $advertisementFavoriteIds = $this->favorites()->where('favoritable_type','App\models\Advertisement')->pluck('favoritable_id');;
        return Advertisement::whereIn('id',$advertisementFavoriteIds)->get();
    }

    public function setFirebaseToken($token)
    {
        $this->firebase_token = $token;
        return $this;
    }

    public function generateActivationCode()
    {
        $activationCode = mt_rand(100000, 999999);
        $this->activation_code = $activationCode;
        //send email
        //send sms
        return $this;
    }

    public function checkActivationCode($code)
    {
        if($this->activation_code == $code)
            return true;

        return false;
    }

    public function acivate()
    {
        $this->activation_code = null;
        $this->active = "yes";
        return $this;
    }
}
