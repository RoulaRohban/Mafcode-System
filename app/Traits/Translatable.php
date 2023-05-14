<?php
namespace App\Traits;

use App\models\Translation;
trait Translatable
{
    protected $default_local = 'ar';
   public function __get($key)
    {
        if(request()->is('api/*') && isset($this->translatable) && in_array($key, $this->translatable) && app()->getLocale() != $this->default_local)
        {
            //translate and return
            $translatedValue = $this->getTranslation($key);
            if($translatedValue)
                return $translatedValue;

            return parent::__get($key);
        }
        else
        {

            //don't translate, call parent
            return parent::__get($key);
        }
    }

    public function __set($key, $value)
    {
        if(request()->is('api/*')  && isset($this->translatable) && in_array($key, $this->translatable) && app()->getLocale() != $this->default_local)
        {
            //translate and return
            $this->setTranslation($key,$value);
        }
        else
        {
            parent::__set($key, $value);
        }
    }
    public function trans($key,$locale)
    {
        return $this->getTranslation($key,$locale);
    }

    public function isTranslatable($key)
    {
        return isset($this->translatable) && in_array($key, $this->translatable);
    }

    public function getTranslation( $key, $locale = NULL )
    {
        if(!$locale)
        {
            $locale = app()->getLocale();
        }
        //model class, model id, locale code
        $translation = Translation::where("model_class",get_class($this))->where("model_id",$this->id)->where("key",$key)->where("locale",$locale)->first();
        if(!$translation)
        {
            return "";
        }
        else
        {
            return $translation->value;
        }
    }

    public function setTranslation($key,$value,$locale = NULL)
    {
        if(!$locale)
        {
            $locale = app()->getLocale();
        }
        $translation = Translation::where("model_class",get_class($this))->where("model_id",$this->id)->where("key",$key)->where("locale",$locale)->first();
        if(!$translation)
        {
            $translation = new Translation;
            $translation->model_class = get_class($this);
            $translation->model_id = $this->id;
            $translation->key = $key;
            $translation->locale = $locale;
            $translation->value = $value;
        }
        else
        {
            $translation->value = $value;
        }

        return $translation->save();
    }

    public function toJson($locale = NULL)
    {
        if(!$locale)
        {
            $locale = app()->getLocale();
        }
        $array = $this->toArray();
        if(isset($this->translatable))
        {
            foreach($this->translatable as $value)
            {
                $array[$value] = $this->getTranslation($value,$locale);
            }
        }
        return json_encode($array);
    }

    public function toArray()
    {
        $array = parent::toArray();
        $locale = app()->getLocale();

        if(isset($this->translatable) && $locale != $this->default_local && request()->is('api/*') )
        {
            foreach($this->translatable as $value)
            {
                $array[$value] = $this->getTranslation($value,$locale);
            }
        }
        return $array;

    }


}
