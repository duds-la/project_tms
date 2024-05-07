<?php 

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ApiCarrier extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'api-carrier';
    }
}