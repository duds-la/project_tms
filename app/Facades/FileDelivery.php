<?php 

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class FileDelivery extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'file-delivery';
    }

    public static function loadFile($path)
    {
        return static::getFacadeRoot()($path);
    }
}