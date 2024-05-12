<?php 

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class FileCarrier extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'file-carrier';
    }

    public static function loadFile($path)
    {
        return static::getFacadeRoot()($path);
    }
}