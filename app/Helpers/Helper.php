<?php
namespace App\Helpers;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function getKeysFromModelCollection($array)
    {
        $firstElement = current($array);
        $keys = array_keys($firstElement);

       return $keys;
    }

    public static function getModels()
    {
        $models = collect(File::allFiles(app_path() . '/models'))
            ->map(function ($item) {
                $path = $item->getRelativePathName();

                $class = sprintf('%s\%s',
                    Container::getInstance()->getNamespace() .'models',
                    strtr(substr($path, 0, strrpos($path, '.')), '/', '\\'));

                return $class;
            })
            ->filter(function ($class) {

                $valid = false;
                if (class_exists($class)) {

                    $reflection = new \ReflectionClass($class);
                    $valid = $reflection->isSubclassOf(Model::class) &&
                        !$reflection->isAbstract();
                }

                return $valid;
            });
        return $models->values();
    }

    public static function getFilePath($folder_name="", $file_name="") {
        return storage_path("app/public/$folder_name" . ($file_name ? "/$file_name" : ""));
    }

    public static function getFileUrl($folder_name="", $file_name="") {
        return url("storage/$folder_name" . ($file_name ? "/$file_name" : ""));
    }

    public static function uploadFileTo($file,$path)
    {

        $file_path = Storage::disk('public_images')->put($path, $file);

        return [
            'media_path' => $file_path,
            'media_url' => self::getMediaUrl($file_path)
        ];


    }

    public static function deleteFile($file_path)
    {
        return Storage::disk('public_images')->delete($file_path);
    }


    public static function getMediaUrl($path)
    {
        return url('/uploads/'.$path);
    }

    public static function getMediaPath($path)
    {
        return '/uploads/'.$path;
    }
}
