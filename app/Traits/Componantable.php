<?php

namespace App\Traits;

trait Componantable
{

    private static $prefix = 'admin';
    public static function getKeysForDataTable()
    {
        return self::$componantable;

    }

    public static  function getIndexString()
    {
        return self::$prefix . '.' . self::getTableName() . '.index';
    }

    public static  function getCreateString()
    {
        return self::$prefix . '.' . self::getTableName() . '.create';
    }

    public static  function getEditString()
    {
        return self::$prefix . '.' . self::getTableName() . '.edit';
    }


    public static  function getShowString()
    {
        return self::$prefix . '.' . self::getTableName() . '.show';
    }



    public static function getDataTableQueryRoute()
    {
        return  route(self::$prefix . '.' .self::getTableName() . '.dataTableQuery');
    }

    public static function getIndexRoute()
    {
        return route(self::getIndexString());
    }

    public static function getCreateRoute()
    {
        return route(self::getCreateString());
    }

    public function getEditRoute()
    {
        return route(self::getEditString(),$this->getKey());
    }

    public static function getStoreRoute()
    {
        return route(self::$prefix . '.' .self::getTableName() . '.store');
    }

    public function getUpdateRoute()
    {
        return route(self::$prefix . '.' .self::getTableName() . '.update',$this->getKey());
    }

    public function getDestroyRoute()
    {
        return route(self::$prefix . '.' .self::getTableName() . '.destroy',$this->getKey());
    }

    public static function getTableName()
    {
        return (new self())->getTable();
    }
}
