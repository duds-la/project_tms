<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class ApiDeliveryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('api-delivery', function(){
            return Http::withOptions([
                'base_uri'=>'https://run.mocky.io/v3/'
            ]);
        });
    }
}
