<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class FileDeliveryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
        $this->app->bind('file-delivery', function () {
            return function ($path) {
                
                $filePath = storage_path($path);
                
                if (!file_exists($filePath)) {
                    throw new Exception("O arquivo não foi encontrado.");
                }

                $jsonData = file_get_contents($filePath);

                $dataArray = json_decode($jsonData, true);

                if ($dataArray === null) {
                    throw new Exception("Erro ao decodificar o Arquivo.");
                }

                return $dataArray;
            };
        });
    }
}
