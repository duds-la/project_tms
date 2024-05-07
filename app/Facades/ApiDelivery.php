<?php 

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ApiDelivery extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'api-delivery';
    }
}